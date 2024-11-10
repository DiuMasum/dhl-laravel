@extends('layouts.app')

@section('content')
    <div class="container mt-4 py-2" style="background: rgb(245, 245, 245)">
        <form action="{{ route('dhl_orders.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="order_no" class="fw-bold">Order No</label>
                        <select class="form-select" id="order_no" name="order_no">
                            <option value="">Select Order No</option>
                            @foreach($purchaseOrders as $purchaseOrder)
                                <option value="{{ $purchaseOrder->id }}">{{ $purchaseOrder->po_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="buyer" class="fw-bold">Buyer</label>
                        <select class="form-select" id="buyer" name="buyer">
                            <option value="">Select Buyer</option>
                            @foreach($buyers as $buyer)
                                <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="po_name" class="fw-bold">PO Name/Ref.</label>
                        <input type="text" class="form-control" Required id="po_name" name="po_name" placeholder="PO Name/Ref.">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="contact_person" class="fw-bold">Contact Person</label>
                        <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact person">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="hs_code" class="fw-bold">HS Code</label>
                        <input type="text" class="form-control" id="hs_code" name="hs_code" placeholder="HS Code">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="product_name" class="fw-bold">Product Name</label>
                        <select class="form-select" id="product_name" name="product_name">
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- DHL Dimension Info -->
            <div class="mt-4">
                <h4>DHL Dimension Info</h4>
            </div>
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column">
                        <label for="price" class="fw-bold">Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column">
                        <label for="length" class="fw-bold">Dimension Length</label>
                        <input type="text" class="form-control" id="length" name="dimension_length" placeholder="Length">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column">
                        <label for="width" class="fw-bold">Dimension Width</label>
                        <input type="text" class="form-control" id="width" name="dimension_width" placeholder="Width">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column">
                        <label for="height" class="fw-bold">Dimension Height</label>
                        <input type="text" class="form-control" id="height" name="dimension_height" placeholder="Height">
                    </div>
                </div>
            </div>

            <!-- DHL Weight Info -->
            <div class="mt-4">
                <h4>DHL Weight Info</h4>
            </div>
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column">
                        <label for="weight_unit" class="fw-bold">Weight Unit</label>
                        <input type="text" class="form-control" id="weight_unit" name="weight_unit" placeholder="Weight Unit">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column">
                        <label for="net_weight" class="fw-bold">Net Weight</label>
                        <input type="text" class="form-control" id="net_weight" name="net_weight" placeholder="Net Weight">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column">
                        <label for="gross_weight" class="fw-bold">Gross Weight</label>
                        <input type="text" class="form-control" id="gross_weight" name="gross_weight" placeholder="Gross Weight">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column">
                        <label for="quantity" class="fw-bold">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                    </div>
                </div>
            </div>

            <!-- Order Type and Remarks -->
            <div class="row g-3 mt-5">
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column">
                        <label for="order_type" class="fw-bold">Order Type</label>
                        <select class="form-select" id="order_type" name="order_type">
                            <option value="normal">Normal</option>
                            <option value="urgent">Urgent</option>
                            <option value="bulk">Bulk</option>
                        </select>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column">
                        <label for="confirm_order" class="fw-bold">Confirm/Banking Order</label>
                        <input type="text" class="form-control" id="confirm_order" name="confirm_order" placeholder="Confirm Order">
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="d-flex flex-column">
                        <label for="remarks" class="fw-bold">Remarks</label>
                        <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks">
                    </div>
                </div>
            </div>

            <!-- Sample Type Checkboxes -->
            <div class="mt-3">
                <p class="fw-bold">Sample Type</p>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item1" name="sample_type[]" value="Item 1" class="form-check-input">
                        <label for="item1" class="form-check-label">Item 1</label>
                    </div>
                </div>
                <!-- Add more sample types as needed -->
            </div>

            <!-- Save Button -->
            <div class="text-center mt-5">
                <button type="submit" class="bg-warning border-0 rounded px-4 py-1 mb-3 fw-bold text-center" style="font-size: 20px">Save</button>
            </div>
        </form>
    </div>
@endsection
