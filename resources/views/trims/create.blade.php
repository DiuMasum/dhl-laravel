@extends('layouts.app')

@section('content')
    <style>

        body {
            background-color: white;
            padding: 20px;
        }


        h1 {
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
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
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        select {
            background-color: white;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-save {
            background-color: #4CAF50;
            color: white;
        }

        .btn-save:hover {
            background-color: #45a049;
        }

        .btn-clear {
            background-color: #f44336;
            color: white;
        }

        .btn-clear:hover {
            background-color: #da190b;
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

        <form action="{{ route('trims.store') }}" method="POST">
            @csrf <!-- CSRF protection -->

            <!-- Basic Information -->
            <div class="form-row">
                <div class="form-group">
                    <label for="trimId">Trim ID</label>
                    <input type="text" id="trimId" name="trimId" name="trimId" required>
                </div>
                <div class="form-group">
                    <label for="trimName">Trim Name</label>
                    <input type="text" id="trimName" name="trimName" name="trimName" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="button">Button</option>
                        <option value="zipper">Zipper</option>
                        <option value="label">Label</option>
                        <option value="thread">Thread</option>
                        <option value="elastic">Elastic</option>
                        <option value="tag">Tag</option>
                    </select>
                </div>
            </div>

            <!-- Specifications -->
            <div class="form-row">
                <div class="form-group">
                    <label for="material">Material</label>
                    <input type="text" id="material" name="material" name="material">
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" id="color" name="color" name="color">
                </div>
                <div class="form-group">
                    <label for="size">Size/Dimensions</label>
                    <input type="text" id="size" name="size" placeholder="e.g., 20mm">
                </div>
            </div>

            <!-- Inventory & Costing -->
            <div class="form-row">
                <div class="form-group">
                    <label for="unitPrice">Unit Price</label>
                    <input type="number" id="unitPrice" name="unitPrice" step="0.01" min="0" required>
                </div>
                <div class="form-group">
                    <label for="minStock">Minimum Stock Level</label>
                    <input type="number" id="minStock" name="minStock" min="0" required>
                </div>
                <div class="form-group">
                    <label for="currentStock">Current Stock</label>
                    <input type="number" id="currentStock" name="currentStock" min="0" required>
                </div>
            </div>

            <!-- Supplier Information -->
            <div class="form-row">
                <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <select id="supplier" name="supplier" required>
                        <option value="">Select Supplier</option>
                        <option value="supplier1">Supplier 1</option>
                        <option value="supplier2">Supplier 2</option>
                        <option value="supplier3">Supplier 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="leadTime">Lead Time (Days)</label>
                    <input type="number" id="leadTime" name="leadTime" min="1" required>
                </div>
                <div class="form-group">
                    <label for="moq">Minimum Order Quantity</label>
                    <input type="number" id="moq" name="moq" min="1" required>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="form-row">
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea id="notes" name="notes"></textarea>
                </div>
            </div>

            <div class="button-group">
                <button type="submit" class="btn-save">Save</button>
                {{-- <button type="reset" class="btn-clear">Clear</button> --}}
            </div>
        </form>

        <!-- Trims List Table -->
        {{-- <table>
            <thead>
                <tr>
                    <th>Trim ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Material</th>
                    <th>Current Stock</th>
                    <th>Unit Price</th>
                    <th>Supplier</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>TRM001</td>
                    <td>Metal Button</td>
                    <td>Button</td>
                    <td>Brass</td>
                    <td>1000</td>
                    <td>$0.05</td>
                    <td>Supplier 1</td>
                </tr>
                <tr>
                    <td>TRM002</td>
                    <td>YKK Zipper</td>
                    <td>Zipper</td>
                    <td>Metal</td>
                    <td>500</td>
                    <td>$0.25</td>
                    <td>Supplier 2</td>
                </tr>
            </tbody>
        </table> --}}

        </form>
    </div>
@endsection
