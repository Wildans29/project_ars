<?php

use App\Http\Controllers\{
    DashboardController,
    PelangganController,
    KategoriController,
    LaporanController,
    ProdukController,
    PengeluaranController,
    PembelianController,
    PembelianDetailController,
    PenjualanController,
    PenjualanDetailController,
    SettingController,
    SupplierController,
    UserController,
    BookingController,
    GejalaController,
    KerusakanController,
    DiagnosaController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/store', [UserController::class, 'store'])->name('user.store');
Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //kategori
    Route::group(['middleware' => 'level:1'], function () {
        Route::prefix('kategori')->name('kategori.')->group(function () {
            // Route::get('/data', [KategoriController::class, 'data'])->name('data');
            Route::get('/data', [KategoriController::class, 'data'])->name('data');
            Route::resource('/', KategoriController::class);
        });

        Route::prefix('produk')->name('produk.')->group(function () {
            Route::get('/data', [ProdukController::class, 'data'])->name('data');
            Route::post('/delete-selected', [ProdukController::class, 'deleteSelected'])->name('delete_selected');
            Route::post('/cetak-barcode', [ProdukController::class, 'cetakBarcode'])->name('cetak_barcode');
            Route::resource('/', ProdukController::class);
        });
        
        Route::prefix('supplier')->name('supplier.')->group(function () {
            Route::get('/data', [SupplierController::class, 'data'])->name('data');
            Route::resource('/', SupplierController::class);
        });

        Route::prefix('pengeluaran')->name('pengeluaran.')->group(function () {
            Route::get('/data', [PengeluaranController::class, 'data'])->name('data');
            Route::resource('/', PengeluaranController::class);
        });

        Route::prefix('pembelian')->name('pembelian.')->group(function () {
            Route::get('/data', [PembelianController::class, 'data'])->name('data');
            Route::get('/{id}/create', [PembelianController::class, 'create'])->name('create');
            Route::resource('/', PembelianController::class)->except('create');
        });

        Route::prefix('pembelian_detail')->name('pembelian_detail.')->group(function () {
            Route::get('/{id}/data', [PembelianDetailController::class, 'data'])->name('data');
            Route::get('/loadform/{diskon}/{total}', [PembelianDetailController::class, 'loadForm'])->name('load_form');
            Route::resource('/', PembelianDetailController::class)->except('create', 'show', 'edit');
        });

        Route::prefix('penjualan')->name('penjualan.')->group(function () {
            Route::get('/data', [PenjualanController::class, 'data'])->name('data');
            Route::get('/', [PenjualanController::class, 'index'])->name('index');
            Route::get('/{id}', [PenjualanController::class, 'show'])->name('show');
            Route::delete('/{id}', [PenjualanController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group(['middleware' => 'level:1'], function () {
        Route::prefix('transaksi')->name('transaksi.')->group(function () {
            Route::get('/baru', [penjualanController::class, 'create'])->name('baru');
            Route::post('/simpan', [PenjualanController::class, 'store'])->name('simpan'); 
            Route::get('/selesai', [PenjualanController::class, 'selesai'])->name('selesai');
            Route::get('/nota-kecil', [PenjualanController::class, 'notaKecil'])->name('nota_kecil');
            Route::get('/nota-besar', [PenjualanController::class, 'notaBesar'])->name('nota_besar');
        });

        Route::prefix('transaksi')->name('transaksi.')->group(function () {
            Route::get('/{id}/data', [PenjualanDetailController::class, 'data'])->name('data');
            Route::get('/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('load_form');
            Route::resource('/', PenjualanDetailController::class)->except('create', 'show', 'edit');
        });
    });
    Route::group(['middleware' => 'level:1'], function () {
        Route::prefix('master')->group(function() {
            //Master Kerusakan
            Route::get('kerusakan', [KerusakanController::class, 'index'])->name('kerusakan.index');
            Route::get('kerusakan/search', [KerusakanController::class, 'search'])->name('kerusakan.search');
    
            //Master Gejala
            Route::get('gejala', [GejalaController::class, 'index'])->name('gejala.index');
            Route::get('gejala/search', [GejalaController::class, 'search'])->name('gejala.search');
            Route::get('gejala/create', [GejalaController::class, 'create'])->name('gejala.create');
            Route::post('gejala', [GejalaController::class, 'store'])->name('gejala.store');
            Route::get('gejala/{id}/edit', [GejalaController::class, 'edit'])->name('gejala.edit');
            Route::put('gejala/{id}', [GejalaController::class, 'update'])->name('gejala.update');
            Route::delete('gejala/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');
        });
    });
    

    Route::group(['middleware' => 'level:1'], function () {
        Route::prefix('laporan')->name('laporan.')->group(function () {
            Route::get('/', [LaporanController::class, 'index'])->name('index');
            Route::get('/data/{awal}/{akhir}', [LaporanController::class, 'data'])->name('data');
            Route::get('/pdf/{awal}/{akhir}', [LaporanController::class, 'exportPDF'])->name('export_pdf');
        });

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/data', [UserController::class, 'data'])->name('data');
            Route::resource('/', UserController::class);
        });

        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::get('/setting/first', [SettingController::class, 'show'])->name('setting.show');
        Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');
    });

    Route::group(['middleware' => 'level:1,2'], function () {
        Route::prefix('profil')->name('user.')->group(function () {
            Route::get('/', [UserController::class, 'profil'])->name('profil');
            Route::post('/', [UserController::class, 'updateProfil'])->name('update_profil');
        });
    });

    Route::group(['middleware' => 'level:2'], function () {
        Route::prefix('booking')->name('booking.')->group(function () {
            Route::get('/', function () {
                return view('pelanggan.booking');
            })->name('index');

            Route::post('/submit', [BookingController::class, 'submit'])->name('submit');
            Route::get('/submit', [BookingController::class, 'submit'])->name('submit');
            Route::post('/{id}/service', [BookingController::class, 'markAsServiced'])->name('service');
            Route::get('/pelanggan/status', [BookingController::class, 'showStatus'])->name('status');
            Route::post('/pelanggan/booking/{id}', [BookingController::class, 'updateServiceStatus'])->name('status');
        });

        Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
            Route::get('/konsultasi', [PelangganController::class, 'konsultasi'])->name('konsultasi');
            Route::get('/berhasil', [PelangganController::class, 'berhasil'])->name('berhasil');
            Route::get('/success', [PelangganController::class, 'berhasil'])->name('success');

            Route::prefix('konsultasi')->name('konsultasi.')->group(function () {
                Route::get('/', [KerusakanController::class, 'index'])->name('index');
                Route::post('/submit', [KerusakanController::class, 'submit'])->name('submit');
            });
        });

        // Route::prefix('diagnosa')->group(function() {
        //     Route::get('new', [DiagnosaController::class, 'index'])->name('diagnosa');
        //     Route::get('create', [DiagnosaController::class, 'create'])->name('diagnosa.create');
        //     Route::post('', [DiagnosaController::class, 'store'])->name('diagnosa.store');        
        //     Route::get('first/{id}', [DiagnosaController::class, 'firstQuestion'])->name('diagnosa.first');
        //     Route::get('pertanyaan/{id}/diagnosa/{pertanyaanId}/{isTrue}', [DiagnosaController::class, 'executeQuestion'])->name('diagnosa.question');
        //     Route::get('result/{id}/view', [DiagnosaController::class, 'result'])->name('diagnosa.result');
        //     Route::get('diagnosa/search', [DiagnosaController::class, 'search'])->name('diagnosa.search');
        // });        
    });
});
