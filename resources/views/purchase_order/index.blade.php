@extends('layouts.app')
@section('title', 'Purchase Orders')
@section('header', 'Purchase Order List')

@section('content')
<style>
    .a-tag {
        text-decoration: none;
        color: white;
    }

    .a-tag:hover {
        color: white;
    }
</style>

<div class="container mt-4">
    <div class="row align-items-center">
        <div class="col-12 col-lg-8 text-center mb-2 mb-lg-0">
            <p class="bg-warning text-center rounded-pill d-inline-block px-3 py-1">
                Bulk Order Breakdown info entry form for order No #DHL/BKJS/2321
            </p>
        </div>
        <div class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end gap-2">
            <div class="d-flex align-items-center bg-primary text-white px-2 py-1 rounded">
                <a href="" class="a-tag">
                    <i class="bi bi-list-ul me-2"></i>
                    <span>PO List</span>
                </a>
            </div>
            <div class="d-flex align-items-center bg-success text-white px-2 py-1 rounded">
                <a href="{{ route('purchase_order.create') }}" class="a-tag">
                    <i class="bi bi-plus-lg me-2"></i>
                    <span>New PO</span>
                </a>
            </div>
            <div class="d-flex align-items-center text-white px-2 py-1 rounded" style="background: rgb(255, 174, 0)">
                <a href="" class="a-tag">
                    <i class="bi bi-printer-fill me-2"></i>
                    <span>Print</span>
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-2" style="background: rgb(247, 253, 255);">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>PO Number</th>
                        <th>Style Name/No</th>
                        <th>Unit Price</th>
                        <th>Order Receive Date</th>
                        <th>Shipment Date</th>
                        <th>Destination</th>
                        <th>Delivery At</th>
                        <th>Order Qty</th>
                        <th>Breakdown Type</th>
                        <th>Excess Cut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchaseOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->po_number }}</td>
                            <td>{{ $order->style_name_no }}</td>
                            <td>{{ $order->unit_price }}</td>
                            <td>{{ $order->order_receive_date }}</td>
                            <td>{{ $order->shipment_date }}</td>
                            <td>{{ $order->destination }}</td>
                            <td>{{ $order->delivery_at }}</td>
                            <td>{{ $order->order_qty }}</td>
                            <td>{{ $order->breakdown_type }}</td>
                            <td>{{ $order->excess_cut }}</td>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <a href="#">
                                        <i class="bi bi-pencil-square bg-success text-white px-2 py-1 rounded" title="Edit"></i>
                                    </a>
                                    <form action="#" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Nested table for Order Items -->
                        @if($order->orderItems->isNotEmpty())
                            <tr>
                                <td colspan="12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Color</th>
                                                <th>Item Name</th>
                                                <th>Style Article No</th>
                                                <th>Lab Dip No</th>
                                                <th>Approve Option</th>
                                                <th>Match Ref</th>
                                                <th>9-12 Qty</th>
                                                <th>9-12 Ratio</th>
                                                <th>9-12 Total</th>
                                                <th>12-18 Qty</th>
                                                <th>12-18 Ratio</th>
                                                <th>12-18 Total</th>
                                                <th>18-24 Qty</th>
                                                <th>18-24 Ratio</th>
                                                <th>18-24 Total</th>
                                                <th>2-3 Qty</th>
                                                <th>2-3 Ratio</th>
                                                <th>2-3 Total</th>
                                                <th>Order Qty</th>
                                                <th>Order Ratio</th>
                                                <th>Order Total</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order->orderItems as $item)
                                                <tr>
                                                    <td>{{ $item->sl_no }}</td>
                                                    <td>{{ $item->color }}</td>
                                                    <td>{{ $item->item_name }}</td>
                                                    <td>{{ $item->style_article_no }}</td>
                                                    <td>{{ $item->lab_dip_no }}</td>
                                                    <td>{{ $item->approve_option }}</td>
                                                    <td>{{ $item->match_ref }}</td>
                                                    <td>{{ $item->{'9_12_qty'} }}</td>
                                                    <td>{{ $item->{'9_12_ratio'} }}</td>
                                                    <td>{{ $item->{'9_12_total'} }}</td>
                                                    <td>{{ $item->{'12_18_qty'} }}</td>
                                                    <td>{{ $item->{'12_18_ratio'} }}</td>
                                                    <td>{{ $item->{'12_18_total'} }}</td>
                                                    <td>{{ $item->{'18_24_qty'} }}</td>
                                                    <td>{{ $item->{'18_24_ratio'} }}</td>
                                                    <td>{{ $item->{'18_24_total'} }}</td>
                                                    <td>{{ $item->{'2_3_qty'} }}</td>
                                                    <td>{{ $item->{'2_3_ratio'} }}</td>
                                                    <td>{{ $item->{'2_3_total'} }}</td>
                                                    <td>{{ $item->order_qty}}</td>
                                                    <td>{{ $item->order_ratio}}</td>
                                                    <td>{{ $item->order_total}}</td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="12" class="text-center text-muted">No Order Items Available</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $purchaseOrders->links() }}
    </div>
</div>
@endsection
