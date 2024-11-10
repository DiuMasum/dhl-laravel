@extends('layouts.app')

@section('content')
    <style>
        table {
            font-family: arial, sans-serif;
            width: 100%;
        }

        td,
        th {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #dddddd;
        }

        .a-tag{
            text-decoration: none;
            color: white;
        }

        .a-tag:hover {
            color: white;
        }
    </style>

    <div class="container mt-3">
        <div class="d-flex justify-content-end align-items-center">
            <a href="{{ route('order_items.create') }}" class="bg-success text-white px-3 py-2 rounded a-tag">
                <i class="bi bi-plus-lg"></i>
                <span>Add New Orders</span>
            </a>
        </div>

        <div class="container mt-2" style="background: rgb(247, 253, 255);">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Purchase Order No</th>
                            <th>Sl No</th>
                            <th>Color</th>
                            <th>Item Name</th>
                            <th>Style Article No</th>
                            <th>Lab Dip No</th>
                            <th>Approve Option</th>
                            <th>Match Ref</th>
                            <th>9_12_qty</th>
                            <th>9_12_ratio</th>
                            <th>9_12_total</th>
                            <th>12_18_qty</th>
                            <th>12_18_ratio</th>
                            <th>12_18_total</th>
                            <th>18_24_qty</th>
                            <th>18_24_ratio</th>
                            <th>18_24_total</th>
                            <th>2_3_qty</th>
                            <th>2_3_ratio</th>
                            <th>2_3_total</th>
                            <th>3_4_qty</th>
                            <th>3_4_ratio</th>
                            <th>3_4_total</th>
                            <th>4_5_qty</th>
                            <th>4_5_ratio</th>
                            <th>4_5_total</th>
                            <th>5_6_qty</th>
                            <th>5_6_ratio</th>
                            <th>5_6_total</th>
                            <th>Order Qty</th>
                            <th>Order Ratio</th>
                            <th>Order Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>john doe</td>
                            <td>john@gmail.com</td>
                            <td>100908234500</td>
                            <td>joss</td>
                            <td>house 111</td>
                            <td>New York</td>
                            <td>Warehouse 1</td>
                            <td>50</td>
                            <td>Type A</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>john doe</td>
                            <td>john@gmail.com</td>
                            <td>100908234500</td>
                            <td>joss</td>
                            <td>house 111</td>
                            <td>New York</td>
                            <td>Warehouse 1</td>
                            <td>50</td>
                            <td>Type A</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                            <td>10%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
