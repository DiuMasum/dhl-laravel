@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: white;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .form-section {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .form-section h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="number"] {
            text-align: right;
        }

        .readonly {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }

        .buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-save {
            background-color: #4CAF50;
            color: white;
        }

        .btn-cancel {
            background-color: #f44336;
            color: white;
        }

        .total-section {
            background-color: #e8f5e9;
            padding: 15px;
            border-radius: 6px;
            margin-top: 20px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="container mt-4 py-2" style="background: rgb(245, 245, 245)">

        <div>
            <span>Status: </span>
            <strong>Draft</strong>
        </div>

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

        <form action="{{ route('budget_costing.store') }}" method="POST">
            @csrf <!-- CSRF protection -->

            <div class="form-grid">
                <div class="form-section">
                    <h3>Basic Information</h3>
                    <div class="form-group">
                        <label for="style_no">Style No. *</label>
                        <input type="text" id="style_no" name="style_no" required>
                    </div>
                    <div class="form-group">
                        <label for="buyer">Buyer Name *</label>
                        <select class="form-select" id="buyer" name="buyer">
                            <option value="">Select Buyer</option>
                            @foreach($buyers as $buyer)
                                <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="season">Season</label>
                        <select id="season" name="season">
                            <option>Spring-24</option>
                            <option>Summer-24</option>
                            <option>Fall-24</option>
                            <option>Winter-24</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_type">Product Type</label>
                        <select id="product_type" name="product_type">
                            <option>T-Shirt</option>
                            <option>Pants</option>
                            <option>Jacket</option>
                            <option>Dress</option>
                        </select>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Quantity & Pricing</h3>
                    <div class="form-group">
                        <label for="target-price">Target Price (USD) *</label>
                        <input type="number" id="target_price" name="target_price" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="moq">MOQ (Pieces) *</label>
                        <input type="number" id="moq" name="moq" required>
                    </div>
                    <div class="form-group">
                        <label for="exchange-rate">Exchange Rate *</label>
                        <input type="number" id="exchange_rate" name="exchange_rate" step="0.01" value="1.00" required>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Material Costs</h3>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="fabric-cost">Fabric Cost/Yard *</label>
                        <input type="number" id="fabric_cost" name="fabric_cost" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="consumption">Consumption/Piece *</label>
                        <input type="number" id="consumption" name="consumption" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="trim-cost">Trim Cost/Piece *</label>
                        <input type="number" id="trim_cost" name="trim_cost" step="0.01" required>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Production Costs</h3>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="cm-cost">CM Cost/Piece *</label>
                        <input type="number" id="cm_cost" name="cm_cost" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="wash-cost">Wash Cost/Piece</label>
                        <input type="number" id="wash_cost" name="wash_cost" step="0.01" value="0.00">
                    </div>
                    <div class="form-group">
                        <label for="overhead">Overhead % *</label>
                        <input type="number" id="overhead" name="overhead" step="0.01" value="5.00" required>
                    </div>
                </div>
            </div>

            <div class="total-section">
                <div class="total-row">
                    <span>Total Material Cost:</span>
                    <strong>$0.00</strong>
                </div>
                <div class="total-row">
                    <span>Total Production Cost:</span>
                    <strong>$0.00</strong>
                </div>
                <div class="total-row">
                    <span>Total Cost/Piece:</span>
                    <strong>$0.00</strong>
                </div>
                <div class="total-row">
                    <span>Profit Margin (%):</span>
                    <strong>0.00%</strong>
                </div>
            </div>

            <div class="buttons">
                <button class="btn-cancel">Cancel</button>
                <button class="btn-save">Save</button>
            </div>

        </form>


        <div>
            <h4>Budget Costing</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>id</th>
                            <th>Style No</th>
                            <th>Buyer Name</th>
                            <th>Season</th>
                            <th>Product Type</th>
                            <th>Target Price (USD)</th>
                            <th>MOQ (Pieces)</th>
                            <th>Exchange Rate</th>
                            <th>Fabric Cost/Yard</th>
                            <th>Consumption/Piece</th>
                            <th>Trim Cost/Piece</th>
                            <th>CM Cost/Piece</th>
                            <th>Wash Cost/Piece</th>
                            <th>Overhead %</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($budget_constings as $budget_consting)
                        <tr>
                            <td>{{ $budget_consting->id }}</td>
                            <td>{{ $budget_consting->style_no }}</td>
                            <td>{{ $budget_consting->Buyerr->name ?? 'N/A' }}</td>
                            <td>{{ $budget_consting->season }}</td>
                            <td>{{ $budget_consting->product_type }}</td>
                            <td>{{ $budget_consting->target_price }}</td>
                            <td>{{ $budget_consting->moq }}</td>
                            <td>{{ $budget_consting->exchange_rate }}</td>
                            <td>{{ $budget_consting->fabric_cost }}</td>
                            <td>{{ $budget_consting->consumption }}</td>
                            <td>{{ $budget_consting->trim_cost }}</td>
                            <td>{{ $budget_consting->cm_cost }}</td>
                            <td>{{ $budget_consting->wash_cost }}</td>
                            <td>{{ $budget_consting->overhead }}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
