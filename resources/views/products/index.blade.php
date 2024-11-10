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

    .a-tag {
        text-decoration: none;
        color: white;
    }

    .a-tag:hover {
        color: white;
    }
</style>

<div class="container mt-3">
    <div class="d-flex justify-content-end align-items-center">
        <a href="{{ route('products.create') }}" class="bg-success text-white px-3 py-2 rounded a-tag">
            <i class="bi bi-plus-lg"></i>
            <span>Add New Products</span>
        </a>
    </div>

    <div class="container mt-2" style="background: rgb(247, 253, 255);">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Subcategory</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Brand</th>
                        <th>Season</th>
                        <th>Collection</th>
                        <th>Barcode</th>
                        <th>Sku</th>
                        <th>Size Range</th>
                        <th>Fit Type</th>
                        <th>Size Chart</th>
                        <th>Material Composition</th>
                        <th>Base Price</th>
                        <th>Retail Price</th>
                        <th>Wholesale Price</th>
                        <th>Cost Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_category }}</td>
                            <td>{{ $product->product_subcategory }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" style="width: 50px; height: auto;">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->season }}</td>
                            <td>{{ $product->collection }}</td>
                            <td>{{ $product->barcode }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->size_range }}</td>
                            <td>{{ $product->fit_type }}</td>
                            <td>{{ $product->size_chart }}</td>
                            <td>{{ $product->material_composition }}</td>
                            <td>{{ $product->base_price }}</td>
                            <td>{{ $product->retails_price }}</td>
                            <td>{{ $product->wholesale_price }}</td>
                            <td>{{ $product->cost_price }}</td>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <a href="{{ route('products.edit', $product->id) }}">
                                        <i class="bi bi-pencil-square bg-success text-white px-2 py-1 rounded" title="Edit"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-danger border-0 text-white px-2 py-1 rounded" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
