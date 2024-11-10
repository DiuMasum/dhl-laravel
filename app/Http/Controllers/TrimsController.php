<?php

namespace App\Http\Controllers;

use App\Models\Trims;
use Illuminate\Http\Request;

class TrimsController extends Controller
{
    public function create(){
        return view('trims.create');
    }

    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'trimId' => 'required|unique:trims,trimId|max:255',
        'trimName' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'material' => 'nullable|string|max:255',
        'color' => 'nullable|string|max:255',
        'size' => 'nullable|string|max:255',
        'unitPrice' => 'required|numeric|min:0',
        'minStock' => 'required|integer|min:0',
        'currentStock' => 'required|integer|min:0',
        'supplier' => 'required|string|max:255',
        'leadTime' => 'required|integer|min:1',
        'moq' => 'required|integer|min:1',
        'notes' => 'nullable|string',
    ]);

    // Store the validated data in the trims table
    $trim = new Trims();
    $trim->trimId = $validatedData['trimId'];
    $trim->trimName = $validatedData['trimName'];
    $trim->category = $validatedData['category'];
    $trim->material = $validatedData['material'];
    $trim->color = $validatedData['color'];
    $trim->size = $validatedData['size'];
    $trim->unitPrice = $validatedData['unitPrice'];
    $trim->minStock = $validatedData['minStock'];
    $trim->currentStock = $validatedData['currentStock'];
    $trim->supplier = $validatedData['supplier'];
    $trim->leadTime = $validatedData['leadTime'];
    $trim->moq = $validatedData['moq'];
    $trim->notes = $validatedData['notes'];
    $trim->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Trim information saved successfully.');
}

}
