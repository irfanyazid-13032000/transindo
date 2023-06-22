<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\FillPDFController;
use App\Http\Controllers\CustomerController;

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



Route::get('/', [CustomerController::class, 'index'])->middleware('guest');
Route::get('/customer', [CustomerController::class, 'index'])->middleware('guest');
Route::post('/customer', [CustomerController::class, 'pesan'])->name('customer.pesan')->middleware('guest');



Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login-post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');




Route::get('/order', [TiketController::class, 'customer'])->name('order.customer')->middleware('admin');
Route::get('/data-order', [TiketController::class, 'dataOrder'])->name('order.data')->middleware('admin');
Route::get('/customer/delete/{id}', [TiketController::class, 'destroy'])->name('customer.delete')->middleware('admin');
Route::get('/customer/edit/{id}', [TiketController::class, 'edit'])->name('customer.edit')->middleware('admin');
Route::put('/customer/update/{id}', [TiketController::class, 'update'])->name('customer.update')->middleware('admin');
Route::get('/customer/checkin/{id}', [CheckinController::class, 'store'])->name('checkin.store')->middleware('admin');


Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{iduser}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('admin');


Route::get('/checkin', [CheckinController::class, 'checkin'])->name('checkin.customer')->middleware('admin');




