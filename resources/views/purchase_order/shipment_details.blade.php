@extends('layouts.app')

@section('content')
    <style>
        .custom-line {
            width: 100%;
            height: 3px;
            background-color: #3498db;
            margin-top: 5px;
        }

        .card {
            max-height: 400px;
            background: rgb(250, 250, 250);
        }

        .card-body {
            display: flex;
            flex-direction: column;
        }
    </style>

    <div class="container mt-4">

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Date</h5>
                        <div class="custom-line"></div>
                        <div class="d-flex flex-column">
                            <span class="card-text mt-2">Shipping Date: 20/10/2024</span>
                            <span class="card-text">Expected Deliver: 20/11/2024</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Buyer Name</h5>
                        <div class="custom-line"></div>
                        <div class="d-flex flex-column">
                            <span class="card-text mt-2">Ovs Internation</span>
                            <span class="card-text">Reference: #234798</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Tracking Number</h5>
                        <div class="custom-line"></div>
                        <div class="d-flex flex-column align-items-start">
                            <span class="card-text mt-2">DHL- 45809</span>
                            <a href="#" class="bg-warning px-3 py-1 rounded-pill text-decoration-none text-dark mt-2"
                                style="width: fit-content;">
                                In Transit
                            </a>
                            <a href="#" class="bg-danger px-3 py-1 rounded-pill text-decoration-none text-white mt-2"
                                style="width: fit-content;">
                                Book Pickup
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Documents</h5>
                        <div class="custom-line"></div>
                        <div class="d-flex flex-column align-items-start">
                            <h6 class="card-text mt-2 fw">AWB</h6>
                            <a href="#"
                                class="bg-primary w-100 text-center py-1 rounded text-decoration-none text-white">
                                <i class="bi bi-file-arrow-down"></i>
                                Download AWB
                            </a>
                        </div>
                        <div class="d-flex flex-column align-items-start">
                            <h6 class="card-text mt-2 fw">LABEL</h6>
                            <a href="#"
                                class="bg-primary w-100 text-center py-1 rounded text-decoration-none text-white">
                                <i class="bi bi-file-arrow-down"></i>
                                Download LABEL
                            </a>
                        </div>
                        <div class="d-flex flex-column align-items-start">
                            <h6 class="card-text mt-2 fw">INVOICE</h6>
                            <a href="#"
                                class="bg-primary w-100 text-center py-1 rounded text-decoration-none text-white">
                                <i class="bi bi-file-arrow-down"></i>
                                Download INVOICE
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Date</h5>
                        <div class="custom-line"></div>
                        <div class="d-flex flex-column">
                            <span class="card-text mt-2">Shipping Date: 20/10/2024</span>
                            <span class="card-text">Expected Deliver: 20/11/2024</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Buyer Name</h5>
                        <div class="custom-line"></div>
                        <div class="d-flex flex-column">
                            <span class="card-text mt-2">Ovs Internation</span>
                            <span class="card-text">Reference: #234798</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Tracking Number</h5>
                        <div class="custom-line"></div>
                        <div class="d-flex flex-column align-items-start">
                            <span class="card-text mt-2">DHL- 45809</span>
                            <a href="#" class="bg-success px-3 py-1 rounded-pill text-decoration-none text-white mt-2"
                                style="width: fit-content;">
                                Deliverd
                            </a>
                            <a href="#" class="bg-danger px-3 py-1 rounded-pill text-decoration-none text-white mt-2"
                                style="width: fit-content;">
                                Book Pickup
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Documents</h5>
                        <div class="custom-line"></div>
                        <div class="d-flex flex-column align-items-start">
                            <h6 class="card-text mt-2 fw">AWB</h6>
                            <a href="#"
                                class="bg-primary w-100 text-center py-1 rounded text-decoration-none text-white">
                                <i class="bi bi-file-arrow-down"></i>
                                Download AWB
                            </a>
                        </div>
                        <div class="d-flex flex-column align-items-start">
                            <h6 class="card-text mt-2 fw">LABEL</h6>
                            <a href="#"
                                class="bg-primary w-100 text-center py-1 rounded text-decoration-none text-white">
                                <i class="bi bi-file-arrow-down"></i>
                                Download LABEL
                            </a>
                        </div>
                        <div class="d-flex flex-column align-items-start">
                            <h6 class="card-text mt-2 fw">INVOICE</h6>
                            <a href="#"
                                class="bg-primary w-100 text-center py-1 rounded text-decoration-none text-white">
                                <i class="bi bi-file-arrow-down"></i>
                                Download INVOICE
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Date</h5>
                        <div class="custom-line"></div>
                        <div class="d-flex flex-column">
                            <span class="card-text mt-2">Shipping Date: 20/10/2024</span>
                            <span class="card-text">Expected Deliver: 20/11/2024</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Buyer Name</h5>
                        <div class="custom-line"></div>
                        <div class="d-flex flex-column">
                            <span class="card-text mt-2">Ovs Internation</span>
                            <span class="card-text">Reference: #234798</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Tracking Number</h5>
                        <div class="custom-line"></div>
                        <div class="d-flex flex-column align-items-start">
                            <span class="card-text mt-2">DHL- 45809</span>
                            <a href="#" class="bg-info px-3 py-1 rounded-pill text-decoration-none text-white mt-2"
                                style="width: fit-content;">
                                Processing
                            </a>
                            <a href="#"
                                class="bg-danger px-3 py-1 rounded-pill text-decoration-none text-white mt-2"
                                style="width: fit-content;">
                                Book Pickup
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Documents</h5>
                        <div class="custom-line"></div>
                        <div class="d-flex flex-column align-items-start">
                            <h6 class="card-text mt-2 fw">AWB</h6>
                            <a href="#"
                                class="bg-primary w-100 text-center py-1 rounded text-decoration-none text-white">
                                <i class="bi bi-file-arrow-down"></i>
                                Download AWB
                            </a>
                        </div>
                        <div class="d-flex flex-column align-items-start">
                            <h6 class="card-text mt-2 fw">LABEL</h6>
                            <a href="#"
                                class="bg-primary w-100 text-center py-1 rounded text-decoration-none text-white">
                                <i class="bi bi-file-arrow-down"></i>
                                Download LABEL
                            </a>
                        </div>
                        <div class="d-flex flex-column align-items-start">
                            <h6 class="card-text mt-2 fw">INVOICE</h6>
                            <a href="#"
                                class="bg-primary w-100 text-center py-1 rounded text-decoration-none text-white">
                                <i class="bi bi-file-arrow-down"></i>
                                Download INVOICE
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
