<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CarController as AdminCar;
use App\Http\Controllers\Admin\CustomerController as AdminCustomer;
use App\Http\Controllers\Admin\RentalController as AdminRental;

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
    return view('welcome');
});

Route::post('/create_user',[CustomerController::class,'CreateUser']);

Route::post('/add_car',[CarController::class,'AddCar'])->name('AddCar');
Route::get('/show_car/{id}',[CarController::class,'ShowCar'])->name('ShowCar');
Route::post('/update_car',[CarController::class,'UpdateCar'])->name('UpdateCar');
Route::post('/delete_car/{id}',[CarController::class,'DeleteCar'])->name('DeleteCar');

Route::post('/create_rental',[RentalController::class,'CreateRental'])->name('CreateRental');

Route::get('/admin',[AdminDashboard::class,'index'])->name('admin.index');
Route::get('/admin/car',[AdminCar::class,'CarPage'])->name('admin.car');
Route::get('/admin/customer',[AdminCustomer::class,'CustomerPage'])->name('admin.customer');
Route::get('/admin/rental',[AdminRental::class,'RentalPage'])->name('admin.rental');