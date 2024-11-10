@extends('layouts.app')

@section('content')
    <div class="container mt-4 py-2" style="background: rgb(245, 245, 245)">
        <div class="row g-3">
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Order No</label>
                    <input type="text" class="form-control" placeholder="Order no">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Buyer</label>
                    <input type="text" class="form-control" placeholder="Buyer">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">PO Name/Ref.</label>
                    <input type="text" class="form-control" placeholder="PO Name/Ref.">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Contact Person</label>
                    <input type="text" class="form-control" placeholder="Contact person">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">HS Code</label>
                    <input type="text" class="form-control" placeholder="HS Code">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Product Name</label>
                    <input type="text" class="form-control" placeholder="Product Name">
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h4>DHL Dimension Info</h4>
        </div>
        <div class="row g-3">
        <div class="col-6 col-md-3">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Price</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Dimension Length</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Dimension Width</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Dimension Height</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h4>DHL Weight Info</h4>
        </div>
        <div class="row g-3">
            <div class="col-6 col-md-3">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Weight Unit</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Net Weight</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Gross Weight</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Quantity</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
        </div>

        <div class="row g-3 mt-5">
            <div class="col-6 col-md-3">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Order Type</label>
                    <select class="form-select" id="product_category_id" name="product_category_id"
                        aria-label="Default select example">
                        <option value="">Normal</option>
                        <option value="">Normal</option>
                        <option value="">Normal</option>
                    </select>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Confirm/Bangking Order:</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-6 col-md-6">
                <div class="d-flex flex-column">
                    <label for="" class="fw-bold">Remarks</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
        </div>

        <div class="mt-3">
            <p class="fw-bold">Sample Type</p>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item1" class="form-check-input">
                    <label for="item1" class="form-check-label">Item 1</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item2" class="form-check-input">
                    <label for="item2" class="form-check-label">Item 2</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item3" class="form-check-input">
                    <label for="item3" class="form-check-label">Item 3</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item4" class="form-check-input">
                    <label for="item4" class="form-check-label">Item 4</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item5" class="form-check-input">
                    <label for="item5" class="form-check-label">Item 5</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item6" class="form-check-input">
                    <label for="item6" class="form-check-label">Item 6</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item6" class="form-check-input">
                    <label for="item6" class="form-check-label">Item 6</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item6" class="form-check-input">
                    <label for="item6" class="form-check-label">Item 6</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item6" class="form-check-input">
                    <label for="item6" class="form-check-label">Item 6</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item6" class="form-check-input">
                    <label for="item6" class="form-check-label">Item 6</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item6" class="form-check-input">
                    <label for="item6" class="form-check-label">Item 6</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item6" class="form-check-input">
                    <label for="item6" class="form-check-label">Item 6</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item6" class="form-check-input">
                    <label for="item6" class="form-check-label">Item 6</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item6" class="form-check-input">
                    <label for="item6" class="form-check-label">Item 6</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item6" class="form-check-input">
                    <label for="item6" class="form-check-label">Item 6</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="item-card">
                    <input type="checkbox" id="item6" class="form-check-input">
                    <label for="item6" class="form-check-label">Item 6</label>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <button type="submit" class="bg-warning border-0 rounded px-4 py-1 mb-3 fw-bold text-center"
                style="font-size: 20px">Save</button>
        </div>
    </div>



    <script>
        function submitSelection() {
            const selectedItems = [];
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            checkboxes.forEach((checkbox) => {
                selectedItems.push(checkbox.nextSibling.textContent.trim());
            });
            alert('You selected: ' + selectedItems.join(', '));
        }
    </script>
@endsection
