<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DhlOrder;
use App\Models\Buyer;
use App\Models\PurchaseOrder;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DhlOrderController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        // Fetch all DHL orders from the database
        $dhlOrders = DhlOrder::select('dhl_orders.*', 'buyers.name as buyer_name')
        ->leftJoin('buyers', 'dhl_orders.buyer', '=', 'buyers.id') // Adjust the join condition based on your actual table structure
        ->get();
        // $buyers = Buyer::all();

        // Return the view with the fetched orders
        return view('dhl_orders.index', compact('dhlOrders'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        $purchaseOrders = PurchaseOrder::all();
        $buyers = Buyer::all();
        $products = Product::all();
        // Return the create view
        return view('dhl_orders.create', compact('purchaseOrders', 'buyers', 'products'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
{
    // Validate incoming request data
    $validatedData = $request->validate([
        'order_no' => 'required|exists:purchase_orders,id',
        'buyer' => 'required|exists:buyers,id',
        'po_name' => 'required|string|max:255',
        'contact_person' => 'nullable|string|max:255',
        'hs_code' => 'nullable|string|max:255',
        'product_name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'dimension_length' => 'nullable|numeric',
        'dimension_width' => 'nullable|numeric',
        'dimension_height' => 'nullable|numeric',
        'weight_unit' => 'nullable|string|max:50',
        'net_weight' => 'nullable|numeric',
        'gross_weight' => 'nullable|numeric',
        'quantity' => 'required|integer',
        'order_type' => 'required|string|max:50',
        'banking_order' => 'nullable|string|max:255',
        'remarks' => 'nullable|string|max:500',
        'sample_type' => 'nullable|array',
        'tracking_number' => 'nullable|string|max:255',
        'shipment_date' => 'nullable|date',
        'delivery_date' => 'nullable|date',
        'awb' => 'nullable|string|max:255',
        'label' => 'nullable|string|max:255',
        'invoice' => 'nullable|string|max:255',
    ]);
    // Get current date and time in required format
    $currentDateTime = Carbon::now()->format('Y-m-d\TH:i:s \G\M\TP');

    // Fetch buyer details from database
    $buyer = Buyer::find($validatedData['buyer']);
    $purchaseOrder = PurchaseOrder::find($validatedData['order_no']);
    $product = Product::find($validatedData['product_name']);

    // Construct payload with all required fields
    $payload = [
        "plannedShippingDateAndTime" => $currentDateTime,
        "pickup" => [
            "isRequested" => false,
        ],
        "productCode" => "P",
        "accounts" => [
            [
                "typeCode" => "shipper",
                "number" => "525005243",
            ],
        ],
        "outputImageProperties" => [
            "printerDPI" => 300,
            "encodingFormat" => "pdf",
            "imageOptions" => [
                [
                    "typeCode" => "invoice",
                    "templateName" => "COMMERCIAL_INVOICE_P_10",
                    "isRequested" => true,
                    "invoiceType" => "commercial",
                    "languageCode" => "eng",
                    "languageCountryCode" => "US"
                ],
                [
                    "typeCode" => "waybillDoc",
                    "templateName" => "ARCH_8x4",
                    "isRequested" => true,
                    "hideAccountNumber" => false,
                    "numberOfCopies" => 1
                ],
                [
                    "typeCode" => "label",
                    "templateName" => "ECOM26_84_001",
                    "renderDHLLogo" => true,
                    "fitLabelsToA4" => false
                ]
            ],
            "splitTransportAndWaybillDocLabels" => true,
            "allDocumentsInOneImage" => false,
            "splitDocumentsByPages" => false,
            "splitInvoiceAndReceipt" => true,
            "receiptAndLabelsInOneImage" => false
        ],
        "customerDetails" => [
            "shipperDetails" => [
                "postalAddress" => [
                    "postalCode" => "1229",
                    "cityName" => "Dhaka",
                    "countryCode" => "BD",
                    "addressLine1" => "Ka-96/8, Joar Shahara, Kuril",
                ],
                "contactInformation" => [
                    "email" => "moonzoor.cfit@gmail.com",
                    "phone" => "+8801713013007",
                    "companyName" => "Customer Retention through stickyness",
                    "fullName" => "KM. Moonzor Alam",
                ],
            ],
            "receiverDetails" => [
                "postalAddress" => [
                    "cityName" => $buyer->city,
                    "countryCode" => $buyer->country,
                    "postalCode" => $buyer->postcode,
                    "addressLine1" => $buyer->street,
                ],
                "contactInformation" => [
                    "email" => $buyer->email,
                    "phone" => $buyer->phone,
                    "companyName" => $buyer->company,
                    "fullName" => $buyer->name,
                ],
            ],
        ],
        "content" => [
            "packages" => [
                [
                    "weight" => (float) ($validatedData['gross_weight'] ?? 1.0),  // Ensure it's a float
                    "dimensions" => [
                        "length" => (float) ($validatedData['dimension_length'] ?? 1), // Ensure it's a float
                        "width" => (float) ($validatedData['dimension_width'] ?? 1), // Ensure it's a float
                        "height" => (float) ($validatedData['dimension_height'] ?? 1), // Ensure it's a float
                    ],
                    "description" => $validatedData['product_name']
                ]
            ],
            "isCustomsDeclarable" => true,
            "declaredValue" => (float) $validatedData['price'],
            "declaredValueCurrency" => "USD",
            "description" => "Shipment",
            "unitOfMeasurement" => "metric",
            "incoterm" => "DAP",
            "exportDeclaration" => [
                "lineItems" => [
                    [
                        "number" => 1,
                        "description" => $product->product_name,
                        "price" => (float) $validatedData['price'],
                        "quantity" => [
                            "value" => (int)$validatedData['quantity'],
                            "unitOfMeasurement" => "PCS"
                        ],
                        "manufacturerCountry" => "BD",
                        "weight" => [
                            "netValue" => (float)$validatedData['net_weight'] ?? 0.1,
                            "grossValue" => (float)$validatedData['gross_weight'] ?? 0.7
                        ]
                    ]
                ],
                "invoice" => [
                    "number" => $purchaseOrder->po_number,
                    "date" => $validatedData['shipment_date'] ?? now()->toDateString(),
                    "totalNetWeight" => (float) $validatedData['net_weight'] ?? 0.4,
                    "totalGrossWeight" => (float) $validatedData['gross_weight'] ?? 0.5
                ]
            ]
                ],
        "shipmentNotification" => [
        [
        "typeCode" => "email",
        "receiverId" => "moonzor.cfit@gmail.com",
        "languageCode" => "eng",
        "languageCountryCode" => "UK",
        "bespokeMessage" => "message to be included in the notification"
        ]   
        ]
    ];

    // Send request to the DHL API
    $apiResponse = Http::withHeaders([
        'Accept' => 'application/json',
        'Authorization' => 'Basic YXBGM3BHM3FHNnBCM2M6Ul41clReMXpMIzZyWl4zeQ==',
        'Content-Type' => 'application/json',
    ])->post('https://express.api.dhl.com/mydhlapi/shipments', $payload);

    Log::info('DHL API Response:', [
        'status' => $apiResponse->status(),
        'body' => $apiResponse->body(),
        'headers' => $apiResponse->headers(),
    ]);

    if ($apiResponse->successful()) {
        // Log::info($apiResponse);

        $responseData = $apiResponse->json();
        Log::info($responseData);
        // $shipmentTrackingNumber = $responseData['data']['shipmentTrackingNumber'] ?? null;
        // $documents = $responseData['data']['documents'] ?? [];
        // If API request is successful, save data to the database
        // DhlOrder::create($validatedData);
        $dhlOrderData = array_merge($validatedData, [
            'tracking_number' => $responseData['shipmentTrackingNumber'] ?? null,
            'awb' => isset($responseData['documents'][0]) ? $responseData['documents'][0]['content'] : null, // AWB document
            'label' => isset($responseData['documents'][1]) ? $responseData['documents'][1]['content'] : null, // Label document
            'invoice' => isset($responseData['documents'][2]) ? $responseData['documents'][2]['content'] : null, // Invoice document
        ]);
        DhlOrder::create($dhlOrderData);
        return redirect()->route('dhl_orders.index')->with('success', 'DHL Order created successfully!');
    } else {
        // Handle API errors
        return back()->withErrors(['api_error' => 'Failed to create order in external system.']);
    }
}


}
