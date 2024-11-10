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

        <form action="{{ route('fabric_process_flow.store') }}" method="POST">
            @csrf <!-- CSRF protection -->

            <!-- Basic Information Section -->
            <div class="form-section">
                <h2>Basic Information</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="orderNo">Order No</label>
                        <select class="form-select" id="orderNo" name="orderNo">
                            <option value="">Select Order No</option>
                            @foreach ($purchaseOrders as $purchaseOrder)
                                <option value="{{ $purchaseOrder->id }}">{{ $purchaseOrder->po_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="buyer">Buyer</label>
                        <select class="form-select" id="buyer" name="buyer">
                            <option value="">Select Buyer</option>
                            @foreach($buyers as $buyer)
                                <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Fabric Details Section -->
            <div class="form-section">
                <h2>Fabric Details</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="fabricType">Fabric Type</label>
                        <select id="fabricType" name="fabricType" required>
                            <option value="">Select Fabric Type</option>
                            <option value="cotton">Cotton</option>
                            <option value="polyester">Polyester</option>
                            <option value="blend">Cotton/Polyester Blend</option>
                            <option value="denim">Denim</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" id="color" name="color" required>
                    </div>
                    <div class="form-group">
                        <label for="gsm">GSM</label>
                        <input type="number" id="gsm" name="gsm" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="width">Width (inches)</label>
                        <input type="number" id="width" name="width" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity (yards)</label>
                        <input type="number" id="quantity" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="supplier">Supplier</label>
                        <input type="text" id="supplier" name="supplier" required>
                    </div>
                </div>
            </div>

            <!-- Quality Control Section -->
            <div class="form-section">
                <h2>Quality Control</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="shrinkage">Shrinkage (%)</label>
                        <input type="number" id="shrinkage" name="shrinkage" step="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="colorFastness">Color Fastness Rating</label>
                        <select id="colorFastness" name="colorFastness" required>
                            <option value="">Select Rating</option>
                            <option value="5">5 - Excellent</option>
                            <option value="4">4 - Good</option>
                            <option value="3">3 - Average</option>
                            <option value="2">2 - Poor</option>
                            <option value="1">1 - Very Poor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="defects">Defects</label>
                        <textarea id="defects" name="defects"></textarea>
                    </div>
                </div>
            </div>

            <!-- Process Status Table -->
            <table>
                <thead>
                    <tr>
                        <th>Process Step</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Fabric Inspection</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Relaxation</td>
                        <td><span class="status-badge">Not Started</span></td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Cutting</td>
                        <td><span class="status-badge">Not Started</span></td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>

            <!-- Button Group -->
            <div class="button-group">
                <button type="submit" class="btn-primary">Save</button>
                {{-- <button type="button" class="btn-success">Approve</button>
                <button type="button" class="btn-secondary">Cancel</button> --}}
            </div>

        </form>
    </div>
@endsection
