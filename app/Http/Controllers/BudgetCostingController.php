<?php

namespace App\Http\Controllers;

use App\Models\BudgetCosting;
use App\Models\Buyer;
use Illuminate\Http\Request;

class BudgetCostingController extends Controller
{
    public function create(){
        $buyers = Buyer::all();
        $budget_constings = BudgetCosting::with(['Buyerr'])->get();

        return view('budget_costing.create', compact('buyers', 'budget_constings'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'style_no' => 'required|string',
            'buyer' => 'required|string',
            'season' => 'nullable|string',
            'product_type' => 'nullable|string',
            'target_price' => 'required|numeric',
            'moq' => 'required|integer',
            'exchange_rate' => 'required|numeric',
            'fabric_cost' => 'required|numeric',
            'consumption' => 'required|numeric',
            'trim_cost' => 'required|numeric',
            'cm_cost' => 'required|numeric',
            'wash_cost' => 'nullable|numeric',
            'overhead' => 'required|numeric',
        ]);

        // Create a new BudgetCosting record
        BudgetCosting::create([
            'style_no' => $request->style_no,
            'buyer' => $request->buyer,
            'season' => $request->season,
            'product_type' => $request->product_type,
            'target_price' => $request->target_price,
            'moq' => $request->moq,
            'exchange_rate' => $request->exchange_rate,
            'fabric_cost' => $request->fabric_cost,
            'consumption' => $request->consumption,
            'trim_cost' => $request->trim_cost,
            'cm_cost' => $request->cm_cost,
            'wash_cost' => $request->wash_cost ?? 0.00,
            'overhead' => $request->overhead,
        ]);

        // Redirect or return response
        return redirect()->back()->with('success', 'Budget costing saved successfully.');
    }
}
