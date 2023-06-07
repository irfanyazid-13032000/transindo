<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\FillPDFController;
use App\Http\Controllers\UserController;
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
    return view('dashboard.index');
})->middleware('auth');

Route::resource('intern', MagangController::class)->middleware('adminhr');
Route::post('/sertifikat/{id}',[FillPDFController::class, 'process'])->name('sertifikat')->middleware('adminhr');
Route::get('/sertifikat/{email}',[FillPDFController::class, 'show'])->name('sertifikat.show')->middleware('adminhr');
Route::resource('divisi', DivisiController::class)->middleware('adminhr');
//  Route::resource('users', UserController::class)->middleware('adminhr');

// Route::resource('absensi', AbsensiController::class)->middleware('auth');
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index')->middleware('admin');
Route::get('/absensi/{email}', [AbsensiController::class, 'show'])->name('absensi.show')->middleware('auth');
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create')->middleware('auth');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store')->middleware('auth');
Route::get('/absensi/{absensi}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit')->middleware('auth');
Route::put('/absensi/{absensi}', [AbsensiController::class, 'update'])->name('absensi.update')->middleware('auth');
Route::delete('/absensi/{absensi}', [AbsensiController::class, 'destroy'])->name('absensi.destroy')->middleware('admin');

 Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('admin');
 Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
 Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');
 Route::get('/users/{user}', [UserController::class,'edit'])->name('users.edit')->middleware('auth');
 Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
 Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('admin');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login-post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->name('register-post')->middleware('guest');
