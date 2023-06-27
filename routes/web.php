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
    DiagnosaController,
    AturanController
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


    Route::group(['middleware' => 'level:1'], function () {

        //ROUTE KATEGORI
        Route::prefix('kategori')->name('kategori.')->group(function () {
            Route::get('/', [KategoriController::class, 'index'])->name('index');
            Route::get('/data', [KategoriController::class, 'data'])->name('data');
            Route::post('/store', [KategoriController::class, 'store'])->name('store');
            //ubah update mejadi edit dengan berbeda action post dan get. get(edit) untuk menampilkan data, post(edit) untuk mengirim data. function di controller ttp harus beda ya wil
            Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [KategoriController::class, 'update']);
            Route::delete('/destroy/{id}', [KategoriController::class, 'destroy'])->name('destroy');
        });
        

        //ROUTE PRODUK
        Route::prefix('produk')->name('produk.')->group(function () {
            Route::get('/', [ProdukController::class, 'index'])->name('index');
            Route::get('/data', [ProdukController::class, 'data'])->name('data');
            Route::post('/store',[ProdukController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [ProdukController::class, 'update']);
            Route::delete('/destroy/{id}',[ProdukController::class, 'destroy'])->name('destroy');
            Route::post('/delete-selected/', [ProdukController::class, 'deleteSelected'])->name('delete_selected');
            Route::post('/cetak-barcode/', [ProdukController::class, 'cetakBarcode'])->name('cetak_barcode');
        });
        
        //ROUTE SUPPLIER
        Route::prefix('supplier')->name('supplier.')->group(function () {
            Route::get('/', [SupplierController::class, 'index'])->name('index');
            Route::get('/data', [SupplierController::class, 'data'])->name('data');
            Route::Post('/store', [SupplierController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [SupplierController::class, 'update']);
            Route::delete('/destroy/{id}', [SupplierController::class, 'destroy'])->name('destroy');
        });
        
        //ROUTE PENGELUARAN
        Route::prefix('pengeluaran')->name('pengeluaran.')->group(function () {
            Route::get('/', [PengeluaranController::class, 'index'])->name('index');
            Route::get('/data', [PengeluaranController::class, 'data'])->name('data');
            Route::post('/store', [PengeluaranController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PengeluaranController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [PengeluaranController::class, 'update']);
            Route::delete('/destroy/{id}', [PengeluaranController::class, 'destroy'])->name('destroy');
        });

        //ROUTE PEMBELIAN
        Route::prefix('pembelian')->name('pembelian.')->group(function () {
            Route::get('/{id}/create', [PembelianController::class, 'create'])->name('create');
            Route::get('/', [PembelianController::class, 'index'])->name('index');
            Route::get('/data', [PembelianController::class, 'data'])->name('data');
            Route::post('/store', [PembelianController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PembelianController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [PembelianController::class, 'update']);
            Route::delete('/destroy/{id}', [PembelianController::class, 'destroy'])->name('destroy');
            Route::get('/{id}/create', [PembelianController::class, 'create'])->name('create');
        });

        //ROUTE PEMBELIAN DETAIL
        Route::prefix('pembelian_detail')->name('pembelian_detail.')->group(function () {
            Route::get('/{id}/data', [PembelianDetailController::class, 'data'])->name('data');
            Route::get('/loadform/{diskon}/{total}', [PembelianDetailController::class, 'loadForm'])->name('load_form');
            Route::resource('/', PembelianDetailController::class)->except('create', 'show', 'edit');
        });

        //ROUTE PENJUALAN
        Route::prefix('penjualan')->name('penjualan.')->group(function () {
            Route::get('/data', [PenjualanController::class, 'data'])->name('data');
            Route::get('/', [PenjualanController::class, 'index'])->name('index');
            Route::get('/{id}', [PenjualanController::class, 'show'])->name('show');
            Route::delete('/{id}', [PenjualanController::class, 'destroy'])->name('destroy');
        });
    });

    //ROUTE USER LEVEL 1 (ADMIN)
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
    

        Route::prefix('master')->group(function() {
            
            //MASTER KERUSAKAN
            Route::get('/kerusakan', [KerusakanController::class, 'index'])->name('kerusakan.index');
            Route::get('/kerusakan/data', [KerusakanController::class, 'data'])->name('kerusakan.data');
            Route::post('/kerusakan/store', [KerusakanController::class, 'store'])->name('kerusakan.store');
            Route::get('/kerusakan/edit/{id}', [KerusakanController::class, 'edit'])->name('kerusakan.edit');
            Route::post('/kerusakan/edit/{id}', [KerusakanController::class, 'update']);
            Route::delete('/kerusakan/destroy/{id}', [KerusakanController::class, 'destroy'])->name('kerusakan.destroy');

            // MASTER GEJALA
            Route::get('/gejala', [GejalaController::class, 'index'])->name('gejala.index');
            Route::get('/gejala/data', [GejalaController::class, 'data'])->name('gejala.data'); // Perubahan pada rute ini
            Route::post('/gejala/store', [GejalaController::class, 'store'])->name('gejala.store');
            Route::get('/gejala/edit/{id}', [GejalaController::class, 'edit'])->name('gejala.edit');
            Route::post('/gejala/edit/{id}', [GejalaController::class, 'update']);
            Route::delete('/gejala/destroy/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');

            // MASTER ATURAN
            Route::get('/aturan', [AturanController::class, 'index'])->name('aturan.index');
            Route::get('/aturan/data', [AturanController::class, 'data'])->name('aturan.data');
            Route::post('/aturan/store', [AturanController::class, 'store'])->name('aturan.store');
            Route::get('/aturan/edit/{id}', [AturanController::class, 'edit'])->name('aturan.edit');
            Route::post('/aturan/edit/{id}', [AturanController::class, 'update']);
            Route::delete('/aturan/destroy/{id}', [AturanController::class, 'destroy'])->name('aturan.destroy');
         });
            
            //ROUTE LAPORAN
        Route::prefix('laporan')->name('laporan.')->group(function () {
            Route::get('/', [LaporanController::class, 'index'])->name('index');
            Route::get('/data/{awal}/{akhir}', [LaporanController::class, 'data'])->name('data');
            Route::get('/pdf/{awal}/{akhir}', [LaporanController::class, 'exportPDF'])->name('export_pdf');
        });

            //ROUTE USER
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/data', [UserController::class, 'data'])->name('data');
            Route::resource('/', UserController::class);
        });

            //ROUTE SETTING
        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::get('/setting/first', [SettingController::class, 'show'])->name('setting.show');
        Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');
    });

    //ROUTE USER LEVEL 1 dan 2
    Route::group(['middleware' => 'level:1,2'], function () {
        Route::prefix('profil')->name('user.')->group(function () {
            Route::get('/', [UserController::class, 'profil'])->name('profil');
            Route::post('/', [UserController::class, 'updateProfil'])->name('update_profil');
        });
    });

    //ROUTE USER LEVEL 2 (PELANGGAN)
    Route::group(['middleware' => 'level:2'], function () {

        //ROUTE BOOKING SERVICE
        Route::prefix('booking')->name('booking.')->group(function () {
            Route::get('/', function () {return view('pelanggan.booking');})->name('index');
            Route::post('/submit', [BookingController::class, 'submit'])->name('submit');
            Route::get('/submit', [BookingController::class, 'submit'])->name('submit');
            Route::post('/{id}/service', [BookingController::class, 'markAsServiced'])->name('service');
            Route::get('/pelanggan/status', [BookingController::class, 'showStatus'])->name('status');
            Route::post('/pelanggan/booking/{id}', [BookingController::class, 'updateServiceStatus'])->name('status');
        });

        //ROUTE PELANGGAN
        Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
            Route::get('/konsultasi', [PelangganController::class, 'konsultasi'])->name('konsultasi');
            Route::get('/berhasil', [PelangganController::class, 'berhasil'])->name('berhasil');
            Route::get('/success', [PelangganController::class, 'berhasil'])->name('success');
            Route::get('/riwayatKonsultasi',[PelangganController::class,'Riwayat'])->name('riwayat');
        });

        //ROUTE DIAGNOSA
        Route::group(['middleware' => 'level:1,2'], function () {
            Route::prefix('diagnosa')->group(function() {
                Route::get('new', [DiagnosaController::class, 'index'])->name('diagnosa');
                Route::get('create/{id}', [DiagnosaController::class, 'firstQuestion'])->name('diagnosa.create');
                Route::get('createNew', [DiagnosaController::class, 'create']);
                Route::post('store', [DiagnosaController::class, 'store'])->name('diagnosa.store');
                Route::get('first/{id}', [DiagnosaController::class, 'firstQuestion'])->name('diagnosa.first');
                Route::get('pertanyaan/{id}/diagnosa/{pertanyaanId}/{isTrue}', [DiagnosaController::class, 'executeQuestion'])->name('diagnosa.question');
                Route::get('result/{id}/view', [DiagnosaController::class, 'result'])->name('diagnosa.result');
                Route::get('search', [DiagnosaController::class, 'search'])->name('diagnosa.search');
            });
        });
    });
});
