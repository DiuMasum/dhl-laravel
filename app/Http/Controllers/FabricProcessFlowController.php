<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\FabricProcessFlow;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class FabricProcessFlowController extends Controller
{
    public function create(){
        $purchaseOrders = PurchaseOrder::all();
        $buyers = Buyer::all();

        return view('fabric_process_flow.create', compact('purchaseOrders', 'buyers'));
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'orderNo' => 'required|string|unique:fabric_process_flows,orderNo',
            'date' => 'required|date',
            'buyer' => 'required|string',

            // Fabric Details Section
            'fabricType' => 'required|string',
            'color' => 'required|string',
            'gsm' => 'required|integer',
            'width' => 'required|numeric',
            'quantity' => 'required|integer',
            'supplier' => 'required|string',

            // Quality Control Section
            'shrinkage' => 'required|numeric',
            'colorFastness' => 'required|integer',
            'defects' => 'nullable|string',

            // Process Status Section (optional fields)
            'fabric_inspection_status' => 'nullable|string',
            'fabric_inspection_date' => 'nullable|date',
            'fabric_inspection_remarks' => 'nullable|string',

            'relaxation_status' => 'nullable|string',
            'relaxation_date' => 'nullable|date',
            'relaxation_remarks' => 'nullable|string',

            'cutting_status' => 'nullable|string',
            'cutting_date' => 'nullable|date',
            'cutting_remarks' => 'nullable|string',
        ]);

        // Create a new record in the fabric_process_flows table
        FabricProcessFlow::create($validatedData);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Fabric process flow record saved successfully!');
    }
}
