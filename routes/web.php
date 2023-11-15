<?php

use App\Http\Controllers\LatihanControllers;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PegawaiController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halamanawal', function () {
    return view('awal');
});

Route::get('/halamanawalmodul', function () {
    return view('awalmodul');
});

// Route::get('/Home', function () {
//     return view('home');
// });

Route::get('/Produk', function () {
    return view('produk');
});

Route::get('/Transaksi', function () {
    return view('transaksi');
});

Route::get('/Biodata', function () {
    return view('biodata');
});

Route::get('/Laporan', function () {
    return view('laporan');
});

Route::get('/NamaPassingData', function () {
    return view('nama',['name' => "Rayhan Pradana Putra Nugraha Baik Banget"]);
});

Route::get('nilai1', function () {
    return view('nilai1');
});

Route::get('nilai2', function () {
    return view('nilai2');
});

Route::get('/produkmaster', function () {
    return view('produkmaster');
});
Route::get('/laporanmaster', function () {
    return view('laporanmaster');
});
Route::get('/transaksimaster', function () {
    return view('transaksimaster');
});
Route::get('/tabel', function () {
    return view('homemaster');
});

//routing home controller
// Route::get('home', [LatihanController::class, 'home']);
//routing produk controller
Route::get('barang', [LatihanController::class, 'barang']);
//routing kategori controller
Route::get('kategori', [LatihanController::class, 'kategori']);
//routing transaksi controller
Route::get('transaksi', [LatihanController::class, 'transaksi']);


//CRUD PROJECT
//Home
Route::get('/HOMECRUD', function () {
    return view('homeCRUD');
});

//Home login register
Route::get('/landingpage', function () {
    return view('landingpage');
});


//PRODUK
//index
Route::get('tampil-produk', [ProdukController::class, 'index']);
//create produk
Route::get('tambah-produk', [ProdukController::class, 'create'])->name('produk.create');
//simpan produk
Route::post('tampil-produk', [ProdukController::class, 'store'])->name('produk.store');
//edit produk
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
//update produk
Route::post('/produk/edit/{id}', [ProdukController::class, 'update'])->name('produk.update');
//delete produk
Route::post('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');


//PEGAWAI
//index pegawai
Route::get('tampil-pegawai', [PegawaiController::class, 'index']);
//create produk
Route::get('tambah-pegawai', [PegawaiController::class, 'create'])->name('pegawai.create');
//simpan produk
Route::post('tampil-pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
//edit produk
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
//update produk
Route::post('/pegawai/edit/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
//delete produk
Route::post('/pegawai/delete/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

Auth::routes();

//login register
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homeCRUD');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homeCRUD')->middleware(['auth'])->name('dashboard');

//aksi produk dengan middleware
Route::middleware(['auth'])->group(function () {

    //index
    Route::get('tampil-produk', [ProdukController::class, 'index']);
    //create produk
    Route::get('tambah-produk', [ProdukController::class, 'create'])->name('produk.create');
    //simpan produk
    Route::post('tampil-produk', [ProdukController::class, 'store'])->name('produk.store');
    //edit produk
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    //update produk
    Route::post('/produk/edit/{id}', [ProdukController::class, 'update'])->name('produk.update');
    //delete produk
    Route::post('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    //laporan
    Route::get('/laporanmaster', function () { return view('laporanmaster'); });
    //transaksi
    Route::get('/transaksimaster', function () { return view('transaksimaster'); });
    
});

//routing excel
Route::get('excelProduk', [ProdukController::class, 'exportExcelProduk'])->name('excel');

//routing pdf
Route::get('cetakPDFProduk', [ProdukController::class, 'pdfProduk'])->name('pdfProduk');

//routing chart
Route::get('laporan', [ProdukController::class, 'chart']);
