<?php

use App\Http\Controllers\DataBansosController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SktmController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeloladataController;
use App\Http\Controllers\IuranWargaController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\TransaksiPenjualan;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['guest'])->group(function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', function () {
    return view('admin');
})->middleware('checkRole:admin');

Route::get('umum', function () {
    return view('umum');
})->middleware('checkRole:umum');
Route::get('umum', function () {
    return view('umum');
})->middleware('checkRole:admin');


Route::get('/pengajuan/detail/{id}', [PengajuanController::class, 'detail'])->name('detail');
Route::get('/pengajuan/approve/{id}', [PengajuanController::class, 'approve'])->name('approve');
Route::get('/pengajuan/reject/{id}', [PengajuanController::class, 'reject'])->name('reject');

Route::get('/kelahiran', [KelahiranController::class, 'index'])->name('kelahiran.index');
Route::get('/kelahiran/create', [KelahiranController::class, 'create'])->name('kelahiran.create');
Route::get('/kelahiran/edit', [KelahiranController::class, 'edit'])->name('kelahiran.edit');
Route::post('/kelahiran', [KelahiranController::class, 'store'])->name('kelahiran.store');
Route::resource('kelahiran', KelahiranController::class);

Route::get('/sktm', [SktmController::class, 'index'])->name('sktm.index');
Route::get('/sktm/create', [SktmController::class, 'create'])->name('sktm.create');
Route::get('/sktm/edit', [SktmController::class, 'edit'])->name('sktm.edit');
Route::post('/sktm', [SktmController::class, 'store'])->name('sktm.store');
Route::resource('sktm', SktmController::class);

Route::get('/kematian', [KematianController::class, 'index'])->name('kematian.index');
Route::get('/kematian/create', [KematianController::class, 'create'])->name('kematian.create');
Route::get('/kematian/edit', [KematianController::class, 'edit'])->name('kematian.edit');
Route::post('/kematian', [KematianController::class, 'store'])->name('kematian.store');
Route::resource('kematian', KematianController::class);

Route::get('/Keloladata', [KeloladataController::class, 'index'])->name('keloladata.index');
Route::get('/Keloladata/create', [KeloladataController::class, 'create'])->name('Keloladata.create');
Route::get('/Keloladata/edit', [KeloladataController::class, 'edit'])->name('Keloladata.edit');
Route::post('/Keloladata', [KeloladataController::class, 'store'])->name('Keloladata.store');
Route::post('/Keloladata', [KeloladataController::class, 'destroy'])->name('Keloladata.destroy');
Route::resource('keloladata', KeloladataController::class);

Route::get('/iuran-warga', [IuranWargaController::class, 'index'])->name('iuranwarga.index');
Route::resource('iuran-warga', IuranWargaController::class);

Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
Route::get('/pengeluaran/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
Route::get('/pengeluaran/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
Route::get('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
Route::get('/pengeluaran', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');
Route::resource('pengeluaran', PengeluaranController::class);

Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');
Route::get('/pemasukan/create', [PemasukanController::class, 'create'])->name('pemasukan.create');
Route::get('/pemasukan/edit', [PemasukanController::class, 'edit'])->name('pemasukan.edit');
Route::get('/pemasukan', [PemasukanController::class, 'store'])->name('pemasukan.store');
Route::get('/pemasukan', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy');
Route::resource('pemasukan', PemasukanController::class);

Route::get('/databansos', [DataBansosController::class, 'index'])->name('databansos.index');
Route::get('/databansos/create', [DataBansosController::class, 'create'])->name('databansos.create');
Route::get('/databansos/edit', [DataBansosController::class, 'edit'])->name('databansos.edit');
Route::get('/databansos', [DataBansosController::class, 'store'])->name('databansos.store');
Route::get('/databansos', [DataBansosController::class, 'destroy'])->name('databansos.destroy');
Route::resource('databansos', DataBansosController::class);


Route::get('total-data', [TransaksiPenjualan::class, 'getTotalData'])->name('total-data');
