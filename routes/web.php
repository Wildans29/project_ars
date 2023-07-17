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
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/store', [UserController::class, 'store'])->name('user.store');
Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
Route::put('/update/{id}', [UserController::class, 'update']);
Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => 'level:1'], function () {

        //ROUTE KATEGORI
        Route::prefix('kategori')->name('kategori.')->group(function () {
            Route::get('/', [KategoriController::class, 'index'])->name('index');
            Route::get('/data', [KategoriController::class, 'data'])->name('data');
            Route::post('/store', [KategoriController::class, 'store'])->name('store');
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
        Route::get('/pembelian/data', [PembelianController::class, 'data'])->name('pembelian.data');
        Route::get('/pembelian/{id}/create', [PembelianController::class, 'create'])->name('pembelian.create');
        Route::resource('/pembelian', PembelianController::class)
            ->except('create');

        //ROUTE PEMBELIAN DETAIL
        Route::get('/pembelian_detail/{id}/data', [PembelianDetailController::class, 'data'])->name('pembelian_detail.data');
        Route::get('/pembelian_detail/loadform/{diskon}/{total}', [PembelianDetailController::class, 'loadForm'])->name('pembelian_detail.load_form');
        Route::resource('/pembelian_detail', PembelianDetailController::class)
            ->except('create', 'show', 'edit');


        //ROUTE PENJUALAN
        Route::prefix('penjualan')->name('penjualan.')->group(function () {
            Route::get('/data', [PenjualanController::class, 'data'])->name('data');
            Route::get('/', [PenjualanController::class, 'index'])->name('index');
            Route::get('/{id}', [PenjualanController::class, 'show'])->name('show');
            Route::delete('/{id}', [PenjualanController::class, 'destroy'])->name('destroy');
        });
    });

    //ROUTE USER LEVEL 1 (ADMIN)
   
    Route::group(['middleware' => 'level:1,2'], function () {
        Route::get('/transaksi/baru', [PenjualanController::class, 'create'])->name('transaksi.baru');
        Route::post('/transaksi/simpan', [PenjualanController::class, 'store'])->name('transaksi.simpan');
        Route::get('/transaksi/selesai', [PenjualanController::class, 'selesai'])->name('transaksi.selesai');
        Route::get('/transaksi/nota-kecil', [PenjualanController::class, 'notaKecil'])->name('transaksi.nota_kecil');
        Route::get('/transaksi/nota-besar', [PenjualanController::class, 'notaBesar'])->name('transaksi.nota_besar');

        Route::get('/transaksi/{id}/data', [PenjualanDetailController::class, 'data'])->name('transaksi.data');
        Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('transaksi.load_form');
        Route::resource('/transaksi', PenjualanDetailController::class)
            ->except('create', 'show', 'edit');
    
    

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
            Route::get('/gejala/data', [GejalaController::class, 'data'])->name('gejala.data');
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
            Route::group(['middleware' => 'level:1'], function () {
                Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
                Route::get('/laporan/data/{awal}/{akhir}', [LaporanController::class, 'data'])->name('laporan.data');
                Route::get('/laporan/pdf/{awal}/{akhir}', [LaporanController::class, 'exportPDF']);

        
                Route::get('/user/data', [UserController::class, 'data'])->name('user.data');
                Route::resource('/user', UserController::class);
        
                Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
                Route::get('/setting/first', [SettingController::class, 'show'])->name('setting.show');
                Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');
            });

            //ROUTE USER
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/data', [UserController::class, 'data'])->name('data');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
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
    Route::group(['middleware' => 'level:1,2'], function () {

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
