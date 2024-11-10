@extends('layouts.app')

@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #f5f5f5;
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

        <div>
            <h4>Fabric Info</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>id</th>
                            <th>Order Number</th>
                            <th>Order Date</th>
                            <th>Buyer Name</th>
                            <th>Style Number</th>
                            <th>Product Category</th>
                            <th>Product Description</th>
                            <th>Quantity</th>
                            <th>Target Price</th>
                            <th>Delivery Date</th>
                            <th>Fabric Type</th>
                            <th>Color</th>
                            <th>Material Composition</th>
                            <th>Quality Standards</th>
                            <th>Testing Requirements</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fabric_infos as $fabric_info)
                        <tr>
                            <td>{{ $fabric_info->id }}</td>
                            <td>{{ $fabric_info->purchaseOrder->po_number ?? 'N/A' }}</td>
                            <td>{{ $fabric_info->order_date}}</td>
                            <td>{{ $fabric_info->buyer->name ?? 'N/A'  }}</td>
                            <td>{{ $fabric_info->style_number }}</td>
                            <td>{{ $fabric_info->product_category }}</td>
                            <td>{{ $fabric_info->product_description }}</td>
                            <td>{{ $fabric_info->quantity }}</td>
                            <td>{{ $fabric_info->target_price }}</td>
                            <td>{{ $fabric_info->delivery_date }}</td>
                            <td>{{ $fabric_info->fabric_type }}</td>
                            <td>{{ $fabric_info->color }}</td>
                            <td>{{ $fabric_info->material_composition }}</td>
                            <td>{{ $fabric_info->quality_standards }}</td>
                            <td>{{ $fabric_info->testing_requirements }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-5">
            <h4>Trims</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>id</th>
                            <th>Trim ID</th>
                            <th>Trim Name</th>
                            <th>Category</th>
                            <th>Material</th>
                            <th>Color</th>
                            <th>Size/Dimensions</th>
                            <th>Unit Price</th>
                            <th>Minimum Stock Level</th>
                            <th>Current Stock</th>
                            <th>Supplier</th>
                            <th>Lead Time (Days)</th>
                            <th>Minimum Order Quantity</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trims as $trim)
                        <tr>
                            <td>{{ $trim->id }}</td>
                            <td>{{ $trim->trimId  }}</td>
                            <td>{{ $trim->trimName }}</td>
                            <td>{{ $trim->category }}</td>
                            <td>{{ $trim->material }}</td>
                            <td>{{ $trim->color }}</td>
                            <td>{{ $trim->size }}</td>
                            <td>{{ $trim->unitPrice }}</td>
                            <td>{{ $trim->minStock }}</td>
                            <td>{{ $trim->currentStock }}</td>
                            <td>{{ $trim->supplier }}</td>
                            <td>{{ $trim->leadTime }}</td>
                            <td>{{ $trim->moq }}</td>
                            <td>{{ $trim->notes }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-5">
            <h4>Fabric Process Flow</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>id</th>
                            <th>Order No</th>
                            <th>Date</th>
                            <th>Buyer</th>
                            <th>Fabric Type</th>
                            <th>Color</th>
                            <th>GSM</th>
                            <th>Width (inches)</th>
                            <th>Quantity (yards)</th>
                            <th>Supplier</th>
                            <th>Shrinkage (%)</th>
                            <th>Color Fastness Rating</th>
                            <th>Defects</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fabric_process_flows as $fabric_process_flow)
                        <tr>
                            <td>{{ $fabric_process_flow->id }}</td>
                            <td>{{ $fabric_process_flow->purchaseOrder->po_number ?? 'N/A' }}</td>
                            <td>{{ $fabric_process_flow->date }}</td>
                            <td>{{ $fabric_process_flow->Buyers->name ?? 'N/A' }}</td>
                            <td>{{ $fabric_process_flow->fabricType }}</td>
                            <td>{{ $fabric_process_flow->color }}</td>
                            <td>{{ $fabric_process_flow->gsm }}</td>
                            <td>{{ $fabric_process_flow->width }}</td>
                            <td>{{ $fabric_process_flow->quantity }}</td>
                            <td>{{ $fabric_process_flow->supplier }}</td>
                            <td>{{ $fabric_process_flow->shrinkage }}</td>
                            <td>{{ $fabric_process_flow->colorFastness }}</td>
                            <td>{{ $fabric_process_flow->defects }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
