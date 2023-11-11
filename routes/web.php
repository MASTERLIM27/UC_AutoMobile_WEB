<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('order');
});

Route::get('/order/create', function () {
    return view('createOrder');
});

Route::get('/vehicle/create', function () {
    return view('createVehicle');
});

Route::get('/order', [OrderController::class, 'index'])->name('orders.index');
Route::get('/order/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('orders.store');

Route::get('/vehicle', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicle/store', [VehicleController::class, 'store'])->name('vehicles.store');

Route::apiResource('admin', CustomerController::class); 
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{id}/edit', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}/delete', [CustomerController::class, 'destroy'])->name('customers.destroy');
