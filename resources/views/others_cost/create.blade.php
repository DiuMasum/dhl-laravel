@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: white;
            padding: 20px;
        }


        h1 {
            color: #2c3e50;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 500;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        .required::after {
            content: "*";
            color: #e74c3c;
            margin-left: 4px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-row .form-group {
            flex: 1;
            margin-bottom: 0;
        }

        .btn-container {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
        }

        .help-text {
            font-size: 12px;
            color: #7f8c8d;
            margin-top: 4px;
        }

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

        <form action="{{ route('others_cost.store') }}" method="POST">
            @csrf <!-- CSRF protection -->

            <div class="form-row">
                <div class="form-group">
                    <label class="required" for="costDate">Date</label>
                    <input type="date" id="costDate" name="costDate" required>
                </div>
                <div class="form-group">
                    <label class="required" for="costType">Cost Type</label>
                    <select id="costType" name="costType" required>
                        <option value="">Select Cost Type</option>
                        <option value="utility">Utility</option>
                        <option value="maintenance">Maintenance</option>
                        <option value="supplies">Supplies</option>
                        <option value="transportation">Transportation</option>
                        <option value="others">Others</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="required" for="amount">Amount</label>
                    <input type="number" id="amount" name="amount" step="0.01" min="0" required>
                    <span class="help-text">Enter amount in your local currency</span>
                </div>
                <div class="form-group">
                    <label class="required" for="currency">Currency</label>
                    <select id="currency" name="currency" required>
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                        <option value="BDT">BDT</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="required" for="department">Department</label>
                    <select id="department" name="department" required>
                        <option value="">Select Department</option>
                        <option value="production">Production</option>
                        <option value="cutting">Cutting</option>
                        <option value="sewing">Sewing</option>
                        <option value="finishing">Finishing</option>
                        <option value="quality">Quality</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="costCenter">Cost Center</label>
                    <input type="text" id="costCenter" name="costCenter" placeholder="Enter cost center code">
                </div>
            </div>

            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea id="description" name="description" rows="3" required
                    placeholder="Enter detailed description of the cost"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="invoiceNo">Invoice No.</label>
                    <input type="text" id="invoiceNo" name="invoiceNo" placeholder="Enter invoice number if available">
                </div>
                <div class="form-group">
                    <label for="vendorName">Vendor Name</label>
                    <input type="text" id="vendorName" name="vendorName" placeholder="Enter vendor name">
                </div>
            </div>

            <div class="btn-container">
                {{-- <button type="button" class="btn btn-secondary">Cancel</button> --}}
                <button type="submit" class="btn btn-primary">Save Cost</button>
            </div>

        </form>

        <div>
            <h4>Others Cost</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>id</th>
                            <th>Date</th>
                            <th>Cost Type</th>
                            <th>Amount</th>
                            <th>Currency</th>
                            <th>Department</th>
                            <th>Cost Center</th>
                            <th>Description</th>
                            <th>Invoice No</th>
                            <th>Vendor Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($other_costs as $other_cost)
                        <tr>
                            <td>{{ $other_cost->id }}</td>
                            <td>{{ $other_cost->costDate }}</td>
                            <td>{{ $other_cost->costType }}</td>
                            <td>{{ $other_cost->amount }}</td>
                            <td>{{ $other_cost->currency }}</td>
                            <td>{{ $other_cost->department }}</td>
                            <td>{{ $other_cost->costCenter }}</td>
                            <td>{{ $other_cost->description }}</td>
                            <td>{{ $other_cost->invoiceNo }}</td>
                            <td>{{ $other_cost->vendorName }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
