<?php

use App\Http\Controllers\PendudukController;
use App\Http\Controllers\SembakoController;
use App\Http\Controllers\TunaiController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\PDFController;
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
    return view('home');
});

// Route::get('/penduduk', function () {
//     return view('penduduk.penduduk');
// })->name('datapenduduk');
Route::resource('penduduk', PendudukController::class);

// Route::get('/sembako', function () {
//     return view('sembako.sembako');
// })->name('datasembako');
Route::resource('sembako', SembakoController::class);

// Route::get('/tunai', function () {
//     return view('tunai.tunai');
// })->name('datablt');
Route::resource('tunai', TunaiController::class);

// Route::get('/rumah', function () {
//     return view('rumah.rumah');
// })->name('bedahrumah');
Route::resource('rumah', RumahController::class);

Route::get('cetakPenduduk', [PDFController::class, 'cetakPenduduk'])->name('cetakPenduduk');
Route::get('cetakSembako', [PDFController::class, 'cetakSembako'])->name('cetakSembako');
Route::get('cetakTunai', [PDFController::class, 'cetakTunai'])->name('cetakTunai');
Route::get('cetakRumah', [PDFController::class, 'cetakRumah'])->name('cetakRumah');
