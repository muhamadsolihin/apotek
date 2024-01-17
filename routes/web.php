<?php

use App\Http\Controllers\TransaksiPenjualan;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\HistoryLogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\penjualInventory;
use App\Http\Controllers\penjualLaporan;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pembeli', function () {
        return view('pembeli'); // Replace this with the actual logic for the pembeli role
    })->middleware('checkRole:pembeli');
    
    Route::resource('login', InventoryController::class);
});

Route::middleware(['auth'])->group(function () {
    // ...
    Route::middleware('checkRole:pembeli')->group(function () {
        Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
        // ... other inventory routes ...
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/penjual', function () {
        return view('penjual'); // Replace this with the actual logic for the pembeli role
    })->middleware('checkRole:penjual');
    
    Route::resource('login', InventoryController::class);
});

Route::middleware(['auth'])->group(function () {
    // ...
    Route::middleware('checkRole:penjual')->group(function () {
        Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
        // ... other inventory routes ...
    });
});


Route::middleware(['guest'])->group(function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    // ... other guest routes ...
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        
Route::get('admin', function () { return view('admin'); })->middleware('checkRole:admin');
Route::get('pemilik', function () { return view('pemilik'); })->middleware(['checkRole:pemilik,admin']);


Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');



Route::get('/inventory/pemilik', [penjualInventory::class, 'index'])->name('inventorypemilik.index');
Route::get('/inventory/pemilik/create', [penjualInventory::class, 'create'])->name('inventorypemilik.create');
Route::get('/inventory/pemilik/edit', [penjualInventory::class, 'edit'])->name('inventorypemilik.edit');
Route::post('/inventory/pemilik', [penjualInventory::class, 'store'])->name('inventorypemilik.store');

Route::get('/laporan/pemilik', [penjualLaporan::class, 'index'])->name('laporanpemilik.index');
Route::get('/laporan/pemilik/create', [penjualLaporan::class, 'create'])->name('laporanpemilik.create');
Route::get('/laporan/pemilik/edit', [penjualLaporan::class, 'edit'])->name('laporanpemilik.edit');
Route::get('/laporan/pemilik', [LaporanController::class, 'destroy'])->name('laporan.destroy');
Route::post('/laporan', [penjualLaporan::class, 'store'])->name('laporan.store');
Route::resource('laporan/pemilik', penjualLaporan::class);

Route::post('/laporan/pdf', [LaporanController::class, 'exportToPdf'])->name('laporan.pdf');

Route::get('/inventory/user', [PembeliController::class, 'index'])->name('pembeli.index');

Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
Route::get('/inventory/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::get('/inventory', [InventoryController::class, 'destroy'])->name('inventory.destroy');
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
Route::resource('inventory', InventoryController::class);
Route::get('expired-inventory', [InventoryController::class,'expiredInventory'])->name('expired-inventory');





Route::get('/transaksi', [TransaksiPenjualan::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiPenjualan::class, 'create'])->name('transaksi.create');
Route::get('/transaksi/edit', [TransaksiPenjualan::class, 'edit'])->name('transaksi.edit');
Route::get('/transaksi', [TransaksiPenjualan::class, 'destroy'])->name('transaksi.destroy');
Route::post('/transaksi', [TransaksiPenjualan::class, 'store'])->name('transaksi.store');
Route::resource('transaksi', TransaksiPenjualan::class);

Route::get('sales-data', [TransaksiPenjualan::class, 'getSalesData'])->name('sales-data');
Route::get('total-data', [TransaksiPenjualan::class, 'getTotalData'])->name('total-data');


Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
Route::get('/laporan/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
Route::get('/laporan', [LaporanController::class, 'destroy'])->name('laporan.destroy');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
Route::resource('laporan', LaporanController::class);

Route::post('/laporan/pdf', [LaporanController::class, 'exportToPdf'])->name('laporan.pdf');


Route::get('/history-logs', [HistoryLogController::class, 'index'])->name('history-logs.index');
Route::get('/history-logs/{id}', [HistoryLogController::class, 'show'])->name('history_logs.show');
// Route::get('/history-logs', 'LoginController@showHistoryLogs')->name('history-logs.index');
