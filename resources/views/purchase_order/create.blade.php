@extends('layouts.app')
@section('title', 'Purchase Orders')
@section('header', 'Purchase Order List')

@section('content')
<div class="mt-4">
    <!-- Purchase Order Form -->
    <form action="{{ route('purchase_order.store') }}" method="POST">
        @csrf
        <!-- Purchase Order Fields -->
        <div class="py-4" style="background: rgb(230, 243, 255)">
            <div class="row g-3 text-center px-2">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column">
                        <label for="po_number">P/O <span class="text-danger fw-bold">(Single P/O Only)</span></label>
                        <input type="text" class="form-control" name="po_number" id="po_number" placeholder="" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column">
                        <label for="style_name_no">Style Name/No</label>
                        <input type="text" class="form-control" name="style_name_no" id="style_name_no" placeholder="" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="d-flex flex-column">
                        <label for="unit_price">Unit Price($)</label>
                        <input type="number" step="0.01" class="form-control" name="unit_price" id="unit_price" placeholder="" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="d-flex flex-column">
                        <label for="order_receive_date">Order Rcv. Date</label>
                        <input type="date" class="form-control" name="order_receive_date" id="order_receive_date" placeholder="" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="d-flex flex-column">
                        <label for="shipment_date">Shipment Date</label>
                        <input type="date" class="form-control" name="shipment_date" id="shipment_date" placeholder="" required>
                    </div>
                </div>
            </div>

            <div class="row g-3 text-center mt-1 px-2">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column">
                        <label for="destination">Destination</label>
                        <input type="text" class="form-control" name="destination" id="destination" placeholder="" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex flex-column">
                        <label for="delivery_at">Delivery At</label>
                        <input type="text" class="form-control" name="delivery_at" id="delivery_at" placeholder="" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="d-flex flex-column">
                        <label for="order_qty">Order Qty</label>
                        <input type="number" class="form-control" name="order_qty" id="order_qty" placeholder="" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="d-flex flex-column">
                        <label for="breakdown_type">Breakdown Type</label>
                        <input type="text" class="form-control" name="breakdown_type" id="breakdown_type" placeholder="" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="d-flex flex-column">
                        <label for="excess_cut">Excess Cut(%)</label>
                        <input type="number" class="form-control" name="excess_cut" id="excess_cut" placeholder="" required>
                    </div>
                </div>
            </div>

            <!-- Order Items Section -->
            <div class="mt-4">
                <button type="button" id="add-order-item" class="btn btn-primary">Add Order Item</button>
                <div id="order-items-container" class="mt-3">
                    <!-- OrderItem fields will be added here dynamically -->
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-4">
                <button type="submit" class="bg-success text-white border-0 rounded px-2 py-1">Save</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('add-order-item').addEventListener('click', function() {
        const container = document.getElementById('order-items-container');
        const index = container.getElementsByClassName('order-item').length;

        const newItem = document.createElement('div');
        newItem.classList.add('order-item', 'border', 'p-3', 'mt-3');

        newItem.innerHTML = `
            <h4>Order Item ${index + 1}</h4>

            <label for="sl_no_${index}">SL No</label>
            <input type="text" name="order_items[${index}][sl_no]" id="sl_no_${index}" class="form-control" required>

            <label for="color_${index}">Color</label>
            <input type="text" name="order_items[${index}][color]" id="color_${index}" class="form-control" required>

            <label for="item_name_${index}">Item Name</label>
            <input type="text" name="order_items[${index}][item_name]" id="item_name_${index}" class="form-control" required>

            <label for="style_article_no_${index}">Style/Article No</label>
            <input type="text" name="order_items[${index}][style_article_no]" id="style_article_no_${index}" class="form-control" >

            <label for="lab_dip_no_${index}">Lab Dip No</label>
            <input type="text" name="order_items[${index}][lab_dip_no]" id="lab_dip_no_${index}" class="form-control" >

            <label for="approve_option_${index}">Approve Option</label>
            <input type="text" name="order_items[${index}][approve_option]" id="approve_option_${index}" class="form-control" >

            <label for="match_ref_${index}">Match Ref</label>
            <input type="text" name="order_items[${index}][match_ref]" id="match_ref_${index}" class="form-control" >

            <label for="9_12_qty_${index}">9-12 Qty</label>
            <input type="number" name="order_items[${index}][9_12_qty]" id="9_12_qty_${index}" class="form-control" >

            <label for="9_12_ratio_${index}">9-12 Ratio</label>
            <input type="number" name="order_items[${index}][9_12_ratio]" id="9_12_ratio_${index}" class="form-control" >

            <label for="9_12_total_${index}">9-12 Total</label>
            <input type="number" name="order_items[${index}][9_12_total]" id="9_12_total_${index}" class="form-control" >

            <label for="12_18_qty_${index}">12-18 Qty</label>
            <input type="number" name="order_items[${index}][12_18_qty]" id="12_18_qty_${index}" class="form-control" >

            <label for="12_18_ratio_${index}">12-18 Ratio</label>
            <input type="number" name="order_items[${index}][12_18_ratio]" id="12_18_ratio_${index}" class="form-control" >

            <label for="12_18_total_${index}">12-18 Total</label>
            <input type="number" name="order_items[${index}][12_18_total]" id="12_18_total_${index}" class="form-control" >

            <label for="18_24_qty_${index}">18-24 Qty</label>
            <input type="number" name="order_items[${index}][18_24_qty]" id="18_24_qty_${index}" class="form-control" >

            <label for="18_24_ratio_${index}">18-24 Ratio</label>
            <input type="number" name="order_items[${index}][18_24_ratio]" id="18_24_ratio_${index}" class="form-control" >

            <label for="18_24_total_${index}">18-24 Total</label>
            <input type="number" name="order_items[${index}][18_24_total]" id="18_24_total_${index}" class="form-control" >

            <label for="2_3_qty_${index}">2-3 Qty</label>
            <input type="number" name="order_items[${index}][2_3_qty]" id="2_3_qty_${index}" class="form-control" >

            <label for="2_3_ratio_${index}">2-3 Ratio</label>
            <input type="number" name="order_items[${index}][2_3_ratio]" id="2_3_ratio_${index}" class="form-control" >

            <label for="2_3_total_${index}">2-3 Total</label>
            <input type="number" name="order_items[${index}][2_3_total]" id="2_3_total_${index}" class="form-control" >

            <label for="order_qty_${index}">Order Qty</label>
            <input type="number" name="order_items[${index}][order_qty]" id="order_qty_${index}" class="form-control" >

            <label for="order_ratio_${index}">Order Ratio</label>
            <input type="number" name="order_items[${index}][order_ratio]" id="order_ratio_${index}" class="form-control" >

            <label for="order_total_${index}">Order Total</label>
            <input type="number" name="order_items[${index}][order_total]" id="order_total_${index}" class="form-control" >
        `;

        container.appendChild(newItem);
    });
</script>
@endsection
