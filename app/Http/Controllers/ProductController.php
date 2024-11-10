<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'product_code' => 'required|string|max:100|unique:products,product_code',
            'product_name' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_subcategory' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Optional image upload with max size 2MB
            'brand' => 'nullable|string|max:100',
            'season' => 'nullable|string|max:100',
            'collection' => 'nullable|string|max:100',
            'barcode' => 'nullable|string|max:100',
            'sku' => 'nullable|string|max:100',
            'size_range' => 'nullable|string|max:100',
            'fit_type' => 'nullable|string|max:100',
            'size_chart' => 'nullable|string',
            'material_composition' => 'nullable|string|max:255',
            'base_price' => 'required|numeric|min:0',
            'retails_price' => 'required|numeric|min:0',
            'wholesale_price' => 'nullable|numeric|min:0',
            'cost_price' => 'nullable|numeric|min:0',
        ]);

        // If there's an image, upload it and store the path
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public'); // Save image to 'storage/app/public/product_images'
            $validated['image'] = $imagePath;
        }

        // Create a new product in the database with the validated data
        Product::create($validated);

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function show($id)
    {
        // Find the product by id
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        // Find the product by id
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Validate the incoming request data
        $validated = $request->validate([
            'product_code' => 'required|string|max:100|unique:products,product_code,' . $product->id,
            'product_name' => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_subcategory' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Optional image upload with max size 2MB
            'brand' => 'nullable|string|max:100',
            'season' => 'nullable|string|max:100',
            'collection' => 'nullable|string|max:100',
            'barcode' => 'nullable|string|max:100',
            'sku' => 'nullable|string|max:100',
            'size_range' => 'nullable|string|max:100',
            'fit_type' => 'nullable|string|max:100',
            'size_chart' => 'nullable|string',
            'material_composition' => 'nullable|string|max:255',
            'base_price' => 'required|numeric|min:0',
            'retails_price' => 'required|numeric|min:0',
            'wholesale_price' => 'nullable|numeric|min:0',
            'cost_price' => 'nullable|numeric|min:0',
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('product_images', 'public');
            $validated['image'] = $imagePath;
        }

        // Update the product with the validated data
        $product->update($validated);

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        // Find the product by id and delete
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
