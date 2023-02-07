<?php

use App\Http\Controllers\PemesananController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CetakStrukController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pemesanan/show', [PemesananController::class, 'show_data'])->name('pemesanan.show_data');
Route::get('/cetak_struk/show', [CetakStrukController::class, 'show'])->name('cetakstruk.show');
