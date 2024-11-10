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

    <div class="mt-3">
        <div class="d-flex justify-content-end align-items-center">
            <a href="{{ route('buyers.create') }}" class="bg-success text-white px-3 py-2 rounded a-tag">
                <i class="bi bi-plus-lg"></i>
                <span>Create Buyer</span>
            </a>
        </div>

        <div class="mt-2" style="background: rgb(247, 253, 255)">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Building</th>
                        <th>Street</th>
                        <th>Suburb</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Postcode</th>
                        <th>Country</th>
                        <th>Instructions</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($buyers as $buyer)
                        <tr>
                            <td>{{ $buyer->id }}</td>
                            <td>{{ $buyer->name }}</td>
                            <td>{{ $buyer->email }}</td>
                            <td>{{ $buyer->phone }}</td>
                            <td>{{ $buyer->company }}</td>
                            <td>{{ $buyer->building }}</td>
                            <td>{{ $buyer->street }}</td>
                            <td>{{ $buyer->suburb }}</td>
                            <td>{{ $buyer->city }}</td>
                            <td>{{ $buyer->state }}</td>
                            <td>{{ $buyer->postcode }}</td>
                            <td>{{ $buyer->country }}</td>
                            <td>{{ $buyer->instructions }}</td>
                            <td>
                                <div class="col-6 col-md-6 col-lg-1 text-center">
                                    <div class="d-flex justify-content-around align-items-center h-100 gap-1">
                                        <a href="{{ route('buyers.edit', $buyer->id) }}">
                                            <i class="bi bi-pencil-square bg-success text-white px-2 py-1 rounded" title="Edit"></i>
                                        </a>
                                        <form action="{{ route('buyers.destroy', $buyer->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bi bi-trash bg-danger text-white px-2 py-1 rounded" title="Delete" onclick="return confirm('Are you sure you want to delete this buyer?');"></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
