<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CetakStrukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilLautController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/login_page', [AuthController::class, 'login'])->name('login');
Route::post('/login_page/post', [AuthController::class, 'login_post'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){

    Route::get('/dashboards', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/kategori_hasil_laut', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori_hasil_laut/insert', [KategoriController::class, 'insert'])->name('kategori.insert');
    Route::post('/kategori_hasil_laut/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/kategori_hasil_laut/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/data_hasil_laut', [HasilLautController::class, 'index'])->name('hasillaut.index');
    Route::post('/data_hasil_laut/insert', [HasilLautController::class, 'insert'])->name('hasillaut.insert');
    Route::post('/data_hasil_laut/update/{id}', [HasilLautController::class, 'update'])->name('hasillaut.update');
    Route::get('/data_hasil_laut/destroy/{id}', [HasilLautController::class, 'destroy'])->name('hasillaut.destroy');

    Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');
    Route::post('/pemasukan/insert', [PemasukanController::class, 'insert'])->name('pemasukan.insert');
    Route::get('/pemasukan/destroy/{id}', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy');

    Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
    Route::post('/pengeluaran/insert', [PengeluaranController::class, 'insert'])->name('pengeluaran.insert');
    Route::post('/pengeluaran/update/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
    Route::get('/pengeluaran/destroy/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');

    Route::get('/pemesanan/{id}', [PemesananController::class, 'index'])->name('pemesanan.index');
    Route::get('/pemesanan/destroy/{id}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');
    Route::post('/pemesanan/insert', [PemesananController::class, 'insert'])->name('pemesanan.insert');
    Route::post('/pemesanan/success', [PemesananController::class, 'success'])->name('pemesanan.success');
    Route::post('/pemesanan/ditunda', [PemesananController::class, 'ditunda'])->name('pemesanan.ditunda');
    Route::get('/pemesanan/tunai/{id}', [PemesananController::class, 'tunai'])->name('pemesanan.tunai');

    Route::get('/cetak_struk', [CetakStrukController::class, 'index'])->name('cetakstruk.index');
    Route::get('/cetak_struk/show/{id}', [CetakStrukController::class, 'show'])->name('cetakstruk.show');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/change_information', [ProfileController::class, 'change_information'])->name('profile.change_information');
    Route::post('/profile/change_password', [ProfileController::class, 'change_password'])->name('profile.change_password');
    Route::post('/profile/change_avatar', [ProfileController::class, 'change_avatar'])->name('profile.change_avatar');

});
