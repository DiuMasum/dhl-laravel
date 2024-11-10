@extends('layouts.app')

@section('content')
    <style>
        .custom-line {
            width: 100%;
            height: 3px;
            background-color: #3498db;
            margin-top: 5px;
        }

        .card {
            max-height: 400px;
            background: rgb(250, 250, 250);
        }

        .card-body {
            display: flex;
            flex-direction: column;
        }
    </style>
    <div class="d-flex justify-content-end align-items-center">
            <a href="{{ route('dhl_orders.create') }}" class="bg-success text-white px-3 py-2 rounded a-tag">
                <i class="bi bi-plus-lg"></i>
                <span>Add New DHL Order</span>
            </a>
        </div>

    <div class="container mt-4">
        @foreach($dhlOrders as $order)
            <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Date</h5>
                            <div class="custom-line"></div>
                            <div class="d-flex flex-column">
                                <span class="card-text mt-2">Shipping Date: {{ $order->created_at->format('d/m/Y') }}</span>
                                <span class="card-text">Expected Deliver: {{ \Carbon\Carbon::parse($order->shipment_date)->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Buyer Name</h5>
                            <div class="custom-line"></div>
                            <div class="d-flex flex-column">
                                <span class="card-text mt-2">{{ $order->buyer_name ?? 'N/A'}}</span> <!-- Adjust buyer_name field based on your table -->
                                <span class="card-text"> </span> <!-- Adjust reference_number field based on your table -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Tracking Number</h5>
                            <div class="custom-line"></div>
                            <div class="d-flex flex-column align-items-start">
                                <span class="card-text mt-2">{{ $order->tracking_number }}</span>
                                <a href="#" class="bg-warning px-3 py-1 rounded-pill text-decoration-none text-dark mt-2" style="width: fit-content;">
                                    Created
                                </a>
                                <!-- <a href="#" class="bg-danger px-3 py-1 rounded-pill text-decoration-none text-white mt-2" style="width: fit-content;">
                                    Book Pickup
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Documents</h5>
                            <div class="custom-line"></div>
                            <div class="d-flex flex-column align-items-start">
                                <h6 class="card-text mt-2 fw">AWB</h6>
                                <a href="data:application/pdf;base64,{{ $order->awb }}" class="bg-primary w-100 text-center py-1 rounded text-decoration-none text-white" download>
                                    <i class="bi bi-file-arrow-down"></i>
                                    Download AWB
                                </a>
                            </div>
                            <div class="d-flex flex-column align-items-start">
                                <h6 class="card-text mt-2 fw">LABEL</h6>
                                <a href="data:application/pdf;base64,{{ $order->label }}" class="bg-primary w-100 text-center py-1 rounded text-decoration-none text-white" download>
                                    <i class="bi bi-file-arrow-down"></i>
                                    Download LABEL
                                </a>
                            </div>
                            <div class="d-flex flex-column align-items-start">
                                <h6 class="card-text mt-2 fw">INVOICE</h6>
                                <a href="data:application/pdf;base64,{{ $order->invoice }}" class="bg-primary w-100 text-center py-1 rounded text-decoration-none text-white" download>
                                    <i class="bi bi-file-arrow-down"></i>
                                    Download INVOICE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
