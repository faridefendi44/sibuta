<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('login',[AuthController::class, 'index'])->name('login');
Route::get('getPegawai',[TamuController::class, 'showData'])->name('getPegawai');
Route::post('actionlogin', [AuthController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [AuthController::class, 'actionlogout'])->name('actionlogout');
Route::post('/save-chart-image', [DashboardController::class, 'saveChartImage'])->name('saveChartImage');
Route::post('/save-tamu-chart-image', [DashboardController::class, 'saveTamuChartImage'])->name('saveTamuChartImage');
Route::post('/save-target-chart-image', [DashboardController::class, 'saveTargetChartImage'])->name('saveTargetChartImage');

Route::prefix('laporan')->group(function () {
    Route::get('chart-surat', [DashboardController::class, 'downloadPdfWithChart'])->name('downloadPdfWithChart');
    Route::get('chart-tamu', [DashboardController::class, 'downloadTamuPdfWithChart'])->name('downloadTamuPdfWithChart');
    Route::get('chart-target', [DashboardController::class, 'downloadTargetPdfWithChart'])->name('downloadTargetPdfWithChart');
    Route::prefix('surat')->group(function () {
        Route::get('', [LaporanController::class, 'surat'])->name('laporanSurat.index');
        Route::get('download-pdf-surat', [LaporanController::class, 'downloadSuratPdf'])->name('suratDownload.index');
    });
    Route::prefix('tamu')->group(function () {
        Route::get('', [LaporanController::class, 'tamu'])->name('laporanTamu.index');
        Route::get('download-pdf-tamu', [LaporanController::class, 'downloadTamuPdf'])->name('tamuDownload.index');
    });

});
Route::prefix('pegawai')->group(function () {
    Route::get('', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::get('/search', [PegawaiController::class, 'search'])->name('pegawai.search');
    Route::post('/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/detail/{id}', [PegawaiController::class, 'show'])->name('pegawai.show');
    Route::get('/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/update/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::post('/delete/{id}', [PegawaiController::class, 'delete'])->name('pegawai.delete');

});
Route::prefix('tamu')->group(function () {
    Route::get('', [TamuController::class, 'index'])->name('tamu.index');
    Route::get('/create', [TamuController::class, 'create'])->name('tamu.create');
    Route::get('/search', [TamuController::class, 'search'])->name('tamu.search');
    Route::post('/store', [TamuController::class, 'store'])->name('tamu.store');
    Route::get('/detail/{id}', [TamuController::class, 'show'])->name('tamu.show');
    Route::get('/edit/{id}', [TamuController::class, 'edit'])->name('tamu.edit');
    Route::put('/update/{id}', [TamuController::class, 'update'])->name('tamu.update');
    Route::post('/delete/{id}', [TamuController::class, 'delete'])->name('tamu.delete');
    Route::get('/data', [TamuController::class, 'data'])->middleware('auth')->name('tamu.data');
    Route::put('/reject/{id}', [TamuController::class, 'reject'])->middleware('auth')->name('tamu.reject');
    Route::put('/approve/{id}', [TamuController::class, 'approve'])->middleware('auth')->name('tamu.approve');
});
Route::prefix('surat')->group(function () {
    Route::get('', [SuratController::class, 'index'])->name('surat.index');
    Route::get('/create', [SuratController::class, 'create'])->name('surat.create');
    Route::post('/store', [SuratController::class, 'store'])->name('surat.store');
    Route::get('/search', [SuratController::class, 'search'])->name('surat.search');
    Route::get('/detail/{id}', [SuratController::class, 'show'])->name('surat.show');
    Route::get('/edit/{id}', [SuratController::class, 'edit'])->name('surat.edit');
    Route::put('/update/{id}', [SuratController::class, 'update'])->name('surat.update');
    Route::post('/delete/{id}', [SuratController::class, 'delete'])->name('surat.delete');
    Route::get('/data', [SuratController::class, 'data'])->middleware('auth')->name('surat.data');
    Route::put('/reject/{id}', [SuratController::class, 'reject'])->middleware('auth')->name('surat.reject');
    Route::put('/approve/{id}', [SuratController::class, 'approve'])->middleware('auth')->name('surat.approve');
});
