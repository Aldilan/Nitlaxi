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

Route::controller(AdminController::class)->group(function() {
    Route::get('/admin', 'index')->name('admin')->middleware('isAdmin');
   //tambah data admin
   Route::post('/admin/tambahUser', 'tambahUser')->middleware('isAdmin');
   Route::post('/admin/tambahKamar', 'tambahKamar')->middleware('isAdmin');
   Route::post('/admin/tambahFasilitasKamar', 'tambahFasilitasKamar')->middleware('isAdmin');
   Route::post('/admin/tambahFasilitasHotel', 'tambahFasilitasHotel')->middleware('isAdmin');
   //edit data admin
   Route::post('/admin/editUser', 'editUser')->middleware('isAdmin');
   Route::post('/admin/editRoom', 'editRoom')->middleware('isAdmin');
   Route::post('/admin/editRoomFacility', 'editRoomFacility')->middleware('isAdmin');
   Route::post('/admin/editHotelFacility', 'editHotelFacility')->middleware('isAdmin');
   //hapus data admin
   route::get('/admin/deleteUser/{id}', 'deleteUser')->middleware('isAdmin');
   route::get('/admin/deleteRoom/{id}', 'deleteRoom')->middleware('isAdmin');
   route::get('/admin/deleteRoomFacility/{id}', 'deleteRoomFacility')->middleware('isAdmin');
   route::get('/admin/deleteHotelFacility/{id}', 'deleteHotelFacility')->middleware('isAdmin');
});

Route::get('/resepsionis', [ResepsionisController::class, 'index'])->name('resepsionis')->middleware('isResepsionis');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('isnUser');
Route::post('/login', [LoginController::class, 'login'])->middleware('isnUser');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/signup', [SignupController::class, 'index'])->middleware('isnUser');
Route::post('/signup', [SignupController::class, 'store'])->middleware('isnUser');

Route::post('/booking', [BookingController::class, 'booking'])->middleware('isCustomer');
Route::get('/booking', [BookingController::class, 'index'])->middleware('isCustomer');
Route::get('/struk', [BookingController::class, 'struk'])->middleware('isCustomer') ;
Route::post('/struk', [BookingController::class, 'createStruk']);
Route::get('/receiptdownload', [BookingController::class, 'strukPDF'])->middleware('isCustomer');
