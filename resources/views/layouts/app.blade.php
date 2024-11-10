{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DHLBD - @yield('title')</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js for basic interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Top Navigation Bar -->
    <nav class="bg-white shadow-lg" x-data="{ isOpen: false }">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <!-- Logo and Brand -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-2xl font-bold text-gray-800">DHLBD</span>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('dashboard') }}"
                        class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                    <a href="{{ route('purchase_order.index') }}"
                        class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Purchase Orders
                    </a>

                    <!-- User Profile -->
                    <div class="flex items-center ml-4">
                        <span class="text-gray-700 text-sm font-medium">Admin User</span>
                        <img class="h-8 w-8 rounded-full ml-2" src="https://ui-avatars.com/api/?name=Admin+User"
                            alt="User avatar">
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="isOpen = !isOpen" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div x-show="isOpen" class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#"
                    class="block text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium">
                    Dashboard
                </a>
                <a href="{{ route('purchase_order.index') }}"
                    class="block text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium">
                    Purchase Orders
                </a>
            </div>
            <!-- Mobile User Profile -->
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Admin+User"
                            alt="User avatar">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800">Admin User</div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h1>
        </div>

        <!-- Page Content -->
        @yield('content')
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('dashboard/assets') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('page_title')</title>

    <meta name="description" content="" />


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dash/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('dashboard/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('dashboard/assets') }}js/config.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
            ul {
        list-style-type: none; /* Remove the default bullet points */
        padding-left: 0; /* Optionally, remove padding on the left */
    }
        ul li a {
            text-decoration: none;
            padding-right: 30px;
        }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="">
        <div class="">

            {{-- <div class="bg-warning text-danger text-center py-2">
                <h5>DHLBD TEST ERP</h5>
            </div> --}}

            <div class="d-flex align-items-center text-danger py-2" style="background: linear-gradient(to right, #ffcc00 30%, #ffe57f 79%, #fff0b2); position: relative;">
                <img src="{{ asset('images/dhl image.jpeg') }}" alt="Logo" style="height: 50px; margin-left: 8cm;">
                <h5 class="mb-0 text-center fw-bold" style="position: absolute; left: 50%; transform: translateX(-50%) color: #D40511 font size: 1.5rem;">DHLBD TEST ERP</h5>
            </div>

            <!-- Layout container -->
            <div class="container mt-3">
                <!-- Navbar -->
                <nav class="bg-white shadow px-3" id="layout-navbar">

                    <ul class="menu-inner py-1 align-items-center text-center d-flex gap-4">

                        <li class="menu-item">
                            <a href="{{ route('buyers.index') }}" class="menu-link">
                                <div data-i18n="Analytics">Buyer Info</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('purchase_order.index') }}" class="menu-link">
                                <div data-i18n="Analytics">Purchase Order</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('products.index') }}" class="menu-link">
                                <div data-i18n="Analytics">Product Info</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('users.index') }}" class="menu-link">
                                <div data-i18n="Analytics">Users</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('breakdown_info.index') }}" class="menu-link">
                                <div data-i18n="Analytics">Breakdown Info</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('fabric_info.create') }}" class="menu-link">
                                <div data-i18n="Analytics">Fabric Info</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('trims.create') }}" class="menu-link">
                                <div data-i18n="Analytics">Trims</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('fabric_process_flow.create') }}" class="menu-link">
                                <div data-i18n="Analytics">Fabric Process Flow</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('others_cost.create') }}" class="menu-link">
                                <div data-i18n="Analytics">Others Cost</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('budget_costing.create') }}" class="menu-link">
                                <div data-i18n="Analytics">Budget Costing</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('dhl_orders.index') }}" class="menu-link">
                                <div data-i18n="Analytics">DHL Shipping</div>
                            </a>
                        </li>
                    </ul>

                </nav>

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    @yield('content')
                </div>

                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

    </div>
    <!-- / Layout wrapper -->
    <br>
    <br>
    <br>
    <br>
    <div class="text-center">
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('dashboard/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('dashboard/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('dashboard/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>

