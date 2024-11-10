<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BreakdowninfoController;
use App\Http\Controllers\BudgetCostingController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DhlOrderController;
use App\Http\Controllers\FabricInfoController;
use App\Http\Controllers\FabricProcessFlowController;
use App\Http\Controllers\OthersCostController;
use App\Http\Controllers\TrimsController;

Route::get('/', function () {
    return redirect('/users');
})->middleware('auth');

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Cache Clearing Routes
// Route::get('/clear-cache', function() {
//     Artisan::call('view:clear');
//     Artisan::call('config:clear');
//     return 'Cache cleared';
// });


// For test this routes are without middleware
// Route::get('/users', [UserController::class, 'index'])->name('users.index');
//     Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
//     Route::post('/users', [UserController::class, 'store'])->name('users.store');
//     Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
//     Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
//     Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
//     Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// All routes that require authentication
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Purchase Orders
    Route::get('/purchase-orders', [PurchaseOrderController::class, 'index'])->name('purchase_order.index');
    Route::get('/purchase-order/create', [PurchaseOrderController::class, 'create'])->name('purchase_order.create');
    Route::post('/purchase-order', [PurchaseOrderController::class, 'store'])->name('purchase_order.store');

    Route::get('/dhl-order', [PurchaseOrderController::class, 'dhlOrder'])->name('dhl.order');
    Route::get('/shipment-details', [PurchaseOrderController::class, 'shipmentDetails'])->name('shipment.details');

    // Order Items
    Route::get('/order-items', [OrderItemsController::class, 'index'])->name('order_items.index');
    Route::get('/order-items/create', [OrderItemsController::class, 'create'])->name('order_items.create');
    Route::post('/order-items', [OrderItemsController::class, 'store'])->name('order_items.store');

    // User Management
    Route::resource('users', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Buyer Routes
    Route::get('/buyers', [BuyerController::class, 'index'])->name('buyers.index');
    Route::get('/buyers/create', [BuyerController::class, 'create'])->name('buyers.create');
    Route::post('/buyers', [BuyerController::class, 'store'])->name('buyers.store');
    Route::get('/buyers/{id}', [BuyerController::class, 'show'])->name('buyers.show');
    Route::get('/buyers/{id}/edit', [BuyerController::class, 'edit'])->name('buyers.edit');
    Route::put('/buyers/{id}', [BuyerController::class, 'update'])->name('buyers.update');
    Route::delete('/buyers/{id}', [BuyerController::class, 'destroy'])->name('buyers.destroy');

    // Product Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // DHL Routes
    Route::get('/dhlorders', [DhlOrderController::class, 'index'])->name('dhl_orders.index');
    Route::get('/dhlorders/create', [DhlOrderController::class, 'create'])->name('dhl_orders.create');
    Route::post('/dhlorders', [DhlOrderController::class, 'store'])->name('dhl_orders.store');

    // Breakdown info Routes
    Route::get('/breakdown-info/index', [BreakdowninfoController::class, 'index'])->name('breakdown_info.index');

    // Fabric process flow Routes
    Route::get('/fabric-process-flow/create', [FabricProcessFlowController::class, 'create'])->name('fabric_process_flow.create');
    Route::post('/fabric-process-flow/store', [FabricProcessFlowController::class, 'store'])->name('fabric_process_flow.store');

    // Budget costing Routes
    Route::get('/budget-costing/create', [BudgetCostingController::class, 'create'])->name('budget_costing.create');
    Route::post('/budget-costing/store', [BudgetCostingController::class, 'store'])->name('budget_costing.store');

    // Trims Routes
    Route::get('/trims/create', [TrimsController::class, 'create'])->name('trims.create');
    Route::post('/trims/store', [TrimsController::class, 'store'])->name('trims.store');

    // Fabric info Routes
    Route::get('/fabric-info/create', [FabricInfoController::class, 'create'])->name('fabric_info.create');
    Route::post('/fabric-info/store', [FabricInfoController::class, 'store'])->name('fabric_info.store');

    // Others cost Routes
    Route::get('/others-cost/create', [OthersCostController::class, 'create'])->name('others_cost.create');
    Route::post('/others-cost/store', [OthersCostController::class, 'store'])->name('others_cost.store');

});
