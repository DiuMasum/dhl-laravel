@extends('layouts.app')

@section('content')
<div class="container mt-4 py-2" style="background: rgb(245, 245, 245)">
    <form action="{{ route('buyers.store') }}" method="POST">
        @csrf <!-- CSRF protection -->
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="name" class="fw-bold">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="john doe" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="email" class="fw-bold">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="john@gmail.com" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="phone" class="fw-bold">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="0123456789">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="company" class="fw-bold">Company</label>
                    <input type="text" class="form-control" name="company" id="company" placeholder="company">
                    @error('company')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="building" class="fw-bold">Building</label>
                    <input type="text" class="form-control" name="building" id="building" placeholder="building">
                    @error('building')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="street" class="fw-bold">Street</label>
                    <input type="text" class="form-control" name="street" id="street" placeholder="street" required>
                    @error('street')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="suburb" class="fw-bold">Suburb</label>
                    <input type="text" class="form-control" name="suburb" id="suburb" placeholder="suburb">
                    @error('suburb')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="city" class="fw-bold">City</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="city" required>
                    @error('city')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="state" class="fw-bold">State</label>
                    <input type="text" class="form-control" name="state" id="state" placeholder="state">
                    @error('state')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="postcode" class="fw-bold">Postcode</label>
                    <input type="text" class="form-control" name="postcode" id="postcode" placeholder="postcode" required>
                    @error('postcode')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="country" class="fw-bold">Country</label>
                    <input type="text" class="form-control" name="country" id="country" placeholder="country" required>
                    @error('country')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column">
                    <label for="instructions" class="fw-bold">Instructions</label>
                    <input type="text" class="form-control" name="instructions" id="instructions" placeholder="instructions">
                    @error('instructions')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="bg-success border-0 rounded px-4 py-1 mb-3 fw-bold text-white text-center"
                style="font-size: 20px">Save</button>
        </div>
    </form>
</div>
@endsection
