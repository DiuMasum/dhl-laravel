<?php

namespace App\Http\Controllers;

use App\Models\Otherscost;
use Illuminate\Http\Request;

class OthersCostController extends Controller
{
    public function create(){
        $other_costs = Otherscost::all();

        return view('others_cost.create', compact('other_costs'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'costDate' => 'required|date',
            'costType' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
            'department' => 'required|string',
            'costCenter' => 'nullable|string',
            'description' => 'required|string',
            'invoiceNo' => 'nullable|string',
            'vendorName' => 'nullable|string',
        ]);

        // Store the data in the otherscosts table
        Otherscost::create($validatedData);

        // Redirect or respond with success message
        return redirect()->back()->with('success', 'Cost information saved successfully.');
    }
}
