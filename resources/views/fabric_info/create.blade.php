@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: white;
            padding: 20px;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }

        .form-section {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-section h2 {
            color: #34495e;
            margin-bottom: 15px;
            font-size: 1.2em;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 15px;
        }

        .form-group {
            flex: 1;
            min-width: 250px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
            background-color: #e5e5e5;
        }

        .status-pending {
            background-color: #ffeeba;
            color: #856404;
        }

        .button-group {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }

        .btn-success {
            background-color: #2ecc71;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
    </style>

    <div class="container mt-4 py-2" style="background: rgb(245, 245, 245)">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Displaying all error messages -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form action="{{ route('fabric_info.store') }}" method="POST">
            @csrf <!-- CSRF protection -->

            <!-- Order Information Section -->
            <div class="mb-8 p-6 border border-gray-200 rounded">
                <h2 class="text-xl font-semibold mb-4">Order Information</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="order_number" class="form-label font-bold">Order Number <span
                                    class="text-red-600">*</span></label>
                            <select class="form-select" id="order_no" name="order_no">
                                <option value="">Select Order No</option>
                                @foreach ($purchaseOrders as $purchaseOrder)
                                    <option value="{{ $purchaseOrder->id }}">{{ $purchaseOrder->po_number }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="order_date" class="form-label font-bold">Order Date <span
                                    class="text-red-600">*</span></label>
                            <input type="date" id="order_date" name="order_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="buyer_name" class="form-label font-bold">Buyer Name <span
                                    class="text-red-600">*</span></label>
                                <select class="form-select" id="buyer_name" name="buyer_name">
                                    <option value="">Select Buyer</option>
                                    @foreach($buyers as $buyer)
                                        <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="mb-8 p-6 border border-gray-200 rounded">
                <h2 class="text-xl font-semibold mb-4">Product Details</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="style_number" class="form-label font-bold">Style Number <span
                                    class="text-red-600">*</span></label>
                            <input type="text" id="style_number" name="style_number" class="form-control"
                                placeholder="Enter style number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="product_category" class="form-label font-bold">Product Category <span
                                    class="text-red-600">*</span></label>
                            <select id="product_category" name="product_category" class="form-select">
                                <option value="">Select category</option>
                                <option value="shirts">Shirts</option>
                                <option value="pants">Pants</option>
                                <option value="dresses">Dresses</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="product_description" class="form-label font-bold">Product Description</label>
                    <textarea id="product_description" name="product_description" class="form-control" rows="3"
                        placeholder="Enter product description"></textarea>
                </div>
            </div>

            <!-- Production Details -->
            <div class="mb-8 p-6 border border-gray-200 rounded">
                <h2 class="text-xl font-semibold mb-4">Production Details</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="quantity" class="form-label font-bold">Quantity <span
                                    class="text-red-600">*</span></label>
                            <input type="number" id="quantity" name="quantity" class="form-control"
                                placeholder="Enter quantity">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="target_price" class="form-label font-bold">Target Price <span
                                    class="text-red-600">*</span></label>
                            <input type="number" id="target_price" name="target_price" class="form-control" step="0.01"
                                placeholder="Enter target price">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="delivery_date" class="form-label font-bold">Delivery Date <span
                                    class="text-red-600">*</span></label>
                            <input type="date" id="delivery_date" name="delivery_date" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Materials Section -->
            <div class="mb-8 p-6 border border-gray-200 rounded">
                <h2 class="text-xl font-semibold mb-4">Materials</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="fabric_type" class="form-label font-bold">Fabric Type <span
                                    class="text-red-600">*</span></label>
                            <input type="text" id="fabric_type" name="fabric_type" class="form-control"
                                placeholder="Enter fabric type">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="color" class="form-label font-bold">Color</label>
                            <input type="text" id="color" name="color" class="form-control"
                                placeholder="Enter color">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="material_composition" class="form-label font-bold">Material Composition</label>
                            <input type="text" id="material_composition" name="material_composition"
                                class="form-control" placeholder="Enter material composition">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quality Control -->
            <div class="mb-8 p-6 border border-gray-200 rounded">
                <h2 class="text-xl font-semibold mb-4">Quality Parameters</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="quality_standards" class="form-label font-bold">Quality Standards</label>
                            <select id="quality_standards" name="quality_standards" class="form-select">
                                <option value="">Select standard</option>
                                <option value="aql-2.5">AQL 2.5</option>
                                <option value="aql-4.0">AQL 4.0</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="testing_requirements" class="form-label font-bold">Testing Requirements</label>
                            <input type="text" id="testing_requirements" name="testing_requirements"
                                class="form-control" placeholder="Enter testing requirements">
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">Submit Order</button>
            </div>

        </form>
    </div>
@endsection
