<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
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
Route::get('/admin', [AdminController::class, 'index']);
//tambah data admin
Route::post('/admin/tambahUser', [AdminController::class, 'tambahUser']);
Route::post('/admin/tambahKamar', [AdminController::class, 'tambahKamar']);
Route::post('/admin/tambahFasilitasKamar', [AdminController::class, 'tambahFasilitasKamar']);
Route::post('/admin/tambahFasilitasHotel', [AdminController::class, 'tambahFasilitasHotel']);
//edit data admin
Route::post('/admin/editUser', [AdminController::class, 'editUser']);
Route::post('/admin/editRoom', [AdminController::class, 'editRoom']);
Route::post('/admin/editRoomFacility', [AdminController::class, 'editRoomFacility']);
Route::post('/admin/editHotelFacility', [AdminController::class, 'editHotelFacility']);
//hapus data admin
route::get('/admin/deleteUser/{id}', [AdminController::class, 'deleteUser']);
route::get('/admin/deleteRoom/{id}', [AdminController::class, 'deleteRoom']);
route::get('/admin/deleteRoomFacility/{id}', [AdminController::class, 'deleteRoomFacility']);
route::get('/admin/deleteHotelFacility/{id}', [AdminController::class, 'deleteHotelFacility']);

Route::get('/resepsionis', [ResepsionisController::class, 'index']);


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'store']);

Route::post('/booking', [BookingController::class, 'booking']);
Route::get('/struk', [BookingController::class, 'struk']);
Route::post('/struk', [BookingController::class, 'createStruk']);
