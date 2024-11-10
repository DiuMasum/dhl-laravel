<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\FabricInfo;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class FabricInfoController extends Controller
{
    public function create(){
        $purchaseOrders = PurchaseOrder::all();
        $buyers = Buyer::all();

        return view('fabric_info.create', compact('purchaseOrders', 'buyers'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'order_no' => 'nullable|string|max:255',
            'order_date' => 'required|date',
            'buyer_name' => 'required|string|max:255',
            'style_number' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'quantity' => 'required|integer',
            'target_price' => 'required|numeric|min:0',
            'delivery_date' => 'required|date',
            'fabric_type' => 'required|string|max:255',
            'color' => 'nullable|string|max:255',
            'material_composition' => 'nullable|string|max:255',
            'quality_standards' => 'nullable|string|max:255',
            'testing_requirements' => 'nullable|string|max:255',
        ]);

        // Create a new FabricInfo record with the validated data
        FabricInfo::create($validatedData);

        // Redirect or respond with success
        return redirect()->back()->with('success', 'Fabric information saved successfully.');
    }
}
