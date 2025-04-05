<?php
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\HotelsController;
use \App\Http\Controllers\HotelReservationController ;
use \App\Http\Controllers\overnightController ;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
    Route::get('/export/users/pdf/', [UserController::class, 'exportPdf'])->name('export.users.pdf');
Route::get('/export/hotel/pdf/{id}', [HotelsController::class, 'exportPdf'])->name('export.hotel.pdf');
Route::get('/export/hotelRes/pdf/{id}', [HotelReservationController::class, 'exportPdf'])->name('export.hotelRes.pdf');
Route::get('/export/overnight/pdf/', [overnightController::class, 'exportPdf'])->name('export.overnight.pdf');



