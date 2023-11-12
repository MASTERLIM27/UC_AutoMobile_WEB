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


Route::get('/', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::patch('/orders/{id}/edit', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{id}/delete', [OrderController::class, 'destroy'])->name('orders.destroy');

Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicles/store', [VehicleController::class, 'store'])->name('vehicles.store');
Route::get('/vehicles/{id}', [VehicleController::class, 'show'])->name('vehicles.show');
Route::get('/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::patch('/vehicles/{id}/edit', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{id}/delete', [VehicleController::class, 'destroy'])->name('vehicles.destroy');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{id}/edit', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}/delete', [CustomerController::class, 'destroy'])->name('customers.destroy');
