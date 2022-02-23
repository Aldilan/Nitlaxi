<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\RNSController;
use App\Http\Controllers\AboutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/room&Suites', [RNSController::class, 'index']);

//admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('isAdmin');
//tambah data admin
Route::post('/admin/tambahUser', [AdminController::class, 'tambahUser'])->middleware('isAdmin');
Route::post('/admin/tambahKamar', [AdminController::class, 'tambahKamar']);
Route::post('/admin/tambahFasilitasKamar', [AdminController::class, 'tambahFasilitasKamar'])->middleware('isAdmin');
Route::post('/admin/tambahFasilitasHotel', [AdminController::class, 'tambahFasilitasHotel'])->middleware('isAdmin');
//edit data admin
Route::post('/admin/editUser', [AdminController::class, 'editUser'])->middleware('isAdmin');
Route::post('/admin/editRoom', [AdminController::class, 'editRoom'])->middleware('isAdmin');
Route::post('/admin/editRoomFacility', [AdminController::class, 'editRoomFacility'])->middleware('isAdmin');
Route::post('/admin/editHotelFacility', [AdminController::class, 'editHotelFacility'])->middleware('isAdmin');
//hapus data admin
route::get('/admin/deleteUser/{id}', [AdminController::class, 'deleteUser'])->middleware('isAdmin');
route::get('/admin/deleteRoom/{id}', [AdminController::class, 'deleteRoom'])->middleware('isAdmin');
route::get('/admin/deleteRoomFacility/{id}', [AdminController::class, 'deleteRoomFacility'])->middleware('isAdmin');
route::get('/admin/deleteHotelFacility/{id}', [AdminController::class, 'deleteHotelFacility'])->middleware('isAdmin');

Route::get('/resepsionis', [ResepsionisController::class, 'index'])->name('resepsionis')->middleware('isResepsionis');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('isnUser');
Route::post('/login', [LoginController::class, 'login'])->middleware('isnUser');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/signup', [SignupController::class, 'index'])->middleware('isnUser');
Route::post('/signup', [SignupController::class, 'store'])->middleware('isnUser');

Route::post('/booking', [BookingController::class, 'booking'])->middleware('isCustomer');
Route::get('/booking', [BookingController::class, 'index'])->middleware('isCustomer');
Route::get('/struk', [BookingController::class, 'struk'])->middleware('isCustomer') ;
Route::post('/struk', [BookingController::class, 'isCustomer']);
