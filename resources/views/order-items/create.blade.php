@extends('layouts.app')

@section('content')
    <div class="container mt-4 py-2" style="background: rgb(245, 245, 245)">
        <form action="">
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="" class="fw-bold">Purchase Order No</label>
                        <input type="text" class="form-control" name="purchase_order_no" id="purchase_order_no" placeholder="Order no">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="" class="fw-bold">Sl No</label>
                        <input type="number" class="form-control" name="sl_no" id="sl_no" placeholder="PO Name/Ref.">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="" class="fw-bold">Color</label>
                        <input type="text" class="form-control" name="color" id="color" placeholder="Contact person">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="" class="fw-bold">Style Article No</label>
                        <input type="text" class="form-control" name="style_article_no" id="style_article_no" placeholder="Contact person">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="" class="fw-bold">Lab Dip No</label>
                        <input type="text" class="form-control" name="lab_dip_no" id="lab_dip_no" placeholder="Contact person">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="" class="fw-bold">Approve Option</label>
                        <select class="form-select" id="approve_option" name="approve_option" aria-label="Default select example">
                            <option selected>Select Options</option>
                                <option value="">Yes</option>
                                <option value="">No</option>
                          </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="" class="fw-bold">Match Ref</label>
                        <input type="text" class="form-control" name="match_ref" id="match_ref" placeholder="Contact person">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="" class="fw-bold">Order Qty</label>
                        <input type="text" class="form-control" name="order_qty" id="order_qty" placeholder="Contact person">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="" class="fw-bold">Order Ratio</label>
                        <input type="text" class="form-control" name="order_ratio" id="order_ratio" placeholder="Contact person">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column">
                        <label for="" class="fw-bold">Order Total</label>
                        <input type="text" class="form-control" name="order_total" id="order_total" placeholder="Contact person">
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
                        <label for="item6" class="form-check-label">Item 7</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 8</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 9</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 10</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 11</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 12</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 13</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 14</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 15</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 16</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 17</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 18</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 19</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 20</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="item-card">
                        <input type="checkbox" id="item6" class="form-check-input">
                        <label for="item6" class="form-check-label">Item 21</label>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <button type="submit" class="bg-warning border-0 rounded px-4 py-1 mb-3 fw-bold text-center"
                    style="font-size: 20px">Send</button>
            </div>
        </form>
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
