@extends('layouts.app')

@section('content')
<div class="container mt-4 py-2" style="background: rgb(230, 243, 255)">
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="product_code" class="fw-bold">Product Code</label>
                    <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Product Code" value="{{ old('product_code', $product->product_code) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="product_name" class="fw-bold">Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" value="{{ old('product_name', $product->product_name) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="product_category" class="fw-bold">Product Category</label>
                    <select class="form-select" id="product_category" name="product_category" aria-label="Default select example">
                        <option selected>Select product categories</option>
                        <option value="1" {{ $product->product_category == 1 ? 'selected' : '' }}>Item 1</option>
                        <option value="2" {{ $product->product_category == 2 ? 'selected' : '' }}>Item 2</option>
                        <option value="3" {{ $product->product_category == 3 ? 'selected' : '' }}>Item 3</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="product_subcategory" class="fw-bold">Product Subcategory</label>
                    <select class="form-select" id="product_subcategory" name="product_subcategory" aria-label="Default select example">
                        <option selected>Select product Sub categories</option>
                        <option value="1" {{ $product->product_subcategory == 1 ? 'selected' : '' }}>Item 1</option>
                        <option value="2" {{ $product->product_subcategory == 2 ? 'selected' : '' }}>Item 2</option>
                        <option value="3" {{ $product->product_subcategory == 3 ? 'selected' : '' }}>Item 3</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="description" class="fw-bold">Description</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="{{ old('description', $product->description) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="image" class="fw-bold">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" style="width: 50px; height: auto; margin-top: 10px;">
                    @else
                        <p class="mt-2">No image uploaded</p>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="brand" class="fw-bold">Brand</label>
                    <input type="text" class="form-control" name="brand" id="brand" placeholder="Brand" value="{{ old('brand', $product->brand) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="season" class="fw-bold">Season</label>
                    <input type="text" class="form-control" name="season" id="season" placeholder="Season" value="{{ old('season', $product->season) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="collection" class="fw-bold">Collection</label>
                    <input type="text" class="form-control" name="collection" id="collection" placeholder="Collection" value="{{ old('collection', $product->collection) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="barcode" class="fw-bold">Barcode</label>
                    <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" value="{{ old('barcode', $product->barcode) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="sku" class="fw-bold">SKU</label>
                    <input type="text" class="form-control" name="sku" id="sku" placeholder="SKU" value="{{ old('sku', $product->sku) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="size_range" class="fw-bold">Size Range</label>
                    <input type="text" class="form-control" name="size_range" id="size_range" placeholder="Size Range" value="{{ old('size_range', $product->size_range) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="fit_type" class="fw-bold">Fit Type</label>
                    <input type="text" class="form-control" name="fit_type" id="fit_type" placeholder="Fit Type" value="{{ old('fit_type', $product->fit_type) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="size_chart" class="fw-bold">Size Chart</label>
                    <input type="text" class="form-control" name="size_chart" id="size_chart" placeholder="Size Chart" value="{{ old('size_chart', $product->size_chart) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="material_composition" class="fw-bold">Material Composition</label>
                    <input type="text" class="form-control" name="material_composition" id="material_composition" placeholder="Material Composition" value="{{ old('material_composition', $product->material_composition) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="base_price" class="fw-bold">Base Price</label>
                    <input type="number" class="form-control" name="base_price" id="base_price" placeholder="Base Price" value="{{ old('base_price', $product->base_price) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="retails_price" class="fw-bold">Retails Price</label>
                    <input type="text" class="form-control" name="retails_price" id="retails_price" placeholder="Retails Price" value="{{ old('retails_price', $product->retails_price) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="wholesale_price" class="fw-bold">Wholesale Price</label>
                    <input type="text" class="form-control" name="wholesale_price" id="wholesale_price" placeholder="Wholesale Price" value="{{ old('wholesale_price', $product->wholesale_price) }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="cost_price" class="fw-bold">Cost Price</label>
                    <input type="text" class="form-control" name="cost_price" id="cost_price" placeholder="Cost Price" value="{{ old('cost_price', $product->cost_price) }}">
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="bg-success border-0 rounded px-4 py-1 mb-3 fw-bold text-white text-center"
                style="font-size: 20px">Save</button>
        </div>
    </form>
</div>
@endsection
