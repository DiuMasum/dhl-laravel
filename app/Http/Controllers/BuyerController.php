<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index()
    {
        // Fetch all buyers
        $buyers = Buyer::all();
        return view('buyers.index', compact('buyers'));
    }

    public function create()
    {
        return view('buyers.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:buyers,email',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'building' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'suburb' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'postcode' => 'required|string|max:10',
            'country' => 'required|string|max:255',
            'instructions' => 'nullable|string',
        ]);

        // Create a new buyer
        Buyer::create($request->all());

        return redirect()->route('buyers.index')->with('success', 'Buyer created successfully.');
    }

    public function show($id)
    {
        // Find the buyer by id
        $buyer = Buyer::findOrFail($id);
        return view('buyers.show', compact('buyer'));
    }

    public function edit($id)
    {
        // Find the buyer by id
        $buyer = Buyer::findOrFail($id);
        return view('buyers.edit', compact('buyer'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:buyers,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'building' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'suburb' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postcode' => 'nullable|string|max:10',
            'country' => 'nullable|string|max:255',
            'instructions' => 'nullable|string',
        ]);

        // Find the buyer and update their information
        $buyer = Buyer::findOrFail($id);
        $buyer->update($request->all());

        return redirect()->route('buyers.index')->with('success', 'Buyer updated successfully.');
    }

    public function destroy($id)
    {
        // Find the buyer by id and delete
        $buyer = Buyer::findOrFail($id);
        $buyer->delete();

        return redirect()->route('buyers.index')->with('success', 'Buyer deleted successfully.');
    }

}
