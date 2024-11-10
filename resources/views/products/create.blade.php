@extends('layouts.app')

@section('content')
<div class="container mt-4 py-2" style="background: rgb(230, 243, 255)">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf  <!-- CSRF token for form security -->
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="product_code" class="fw-bold">Product Code</label>
                    <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Product Code" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="product_name" class="fw-bold">Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="product_category" class="fw-bold">Product Category</label>
                    <select class="form-select" id="product_category" name="product_category" aria-label="Default select example" required>
                        <option value="" disabled selected>Select product categories</option>
                        <option value="item1">1</option>
                        <option value="item2">2</option>
                        <option value="item3">3</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="product_subcategory" class="fw-bold">Product Subcategory</label>
                    <select class="form-select" id="product_subcategory" name="product_subcategory" aria-label="Default select example" required>
                        <option value="" disabled selected>Select product subcategories</option>
                        <option value="subitem1">1</option>
                        <option value="subitem2">2</option>
                        <option value="subitem3">3</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="description" class="fw-bold">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Description" rows="3" required></textarea>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="image" class="fw-bold">Image</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="brand" class="fw-bold">Brand</label>
                    <input type="text" class="form-control" name="brand" id="brand" placeholder="Brand" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="season" class="fw-bold">Season</label>
                    <input type="text" class="form-control" name="season" id="season" placeholder="Season" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="collection" class="fw-bold">Collection</label>
                    <input type="text" class="form-control" name="collection" id="collection" placeholder="Collection" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="barcode" class="fw-bold">Barcode</label>
                    <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="sku" class="fw-bold">SKU</label>
                    <input type="text" class="form-control" name="sku" id="sku" placeholder="SKU" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="size_range" class="fw-bold">Size Range</label>
                    <input type="text" class="form-control" name="size_range" id="size_range" placeholder="Size Range" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="fit_type" class="fw-bold">Fit Type</label>
                    <input type="text" class="form-control" name="fit_type" id="fit_type" placeholder="Fit Type" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="size_chart" class="fw-bold">Size Chart</label>
                    <input type="text" class="form-control" name="size_chart" id="size_chart" placeholder="Size Chart" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="material_composition" class="fw-bold">Material Composition</label>
                    <input type="text" class="form-control" name="material_composition" id="material_composition" placeholder="Material Composition" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="base_price" class="fw-bold">Base Price</label>
                    <input type="number" class="form-control" name="base_price" id="base_price" placeholder="Base Price" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="retails_price" class="fw-bold">Retails Price</label>
                    <input type="number" class="form-control" name="retails_price" id="retails_price" placeholder="Retails Price" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="wholesale_price" class="fw-bold">Wholesale Price</label>
                    <input type="number" class="form-control" name="wholesale_price" id="wholesale_price" placeholder="Wholesale Price" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="cost_price" class="fw-bold">Cost Price</label>
                    <input type="number" class="form-control" name="cost_price" id="cost_price" placeholder="Cost Price" required>
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
