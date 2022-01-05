<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Models\Profile;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//  


Route::get('/penambahan',  [App\Http\Controllers\BarangController::class, 'index']);

// Route::get('/peminjaman', function(){
//     $barang= Barang::All();
//     return view('dashboard.peminjaman', compact('barang'));
// });

Route::get('/report', function () {
    return view('dashboard.report');
});



// Route::get('/barang',  [App\Http\Controllers\BarangController::class, 'showAll'])->name('barang.showAll');


Route::get('/barang_rusak', function () {
    return view('dashboard.barang_rusak');
});


Route::get('/profil', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');


Route::resource('barang', App\Http\Controllers\BarangController::class);
Route::resource('merk', App\Http\Controllers\MerkController::class);
Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
Route::resource('profile', App\Http\Controllers\ProfileController::class);
Route::resource('peminjaman', App\Http\Controllers\PeminjamanController::class);
Route::resource('pengembalian', App\Http\Controllers\PengembalianController::class);
Route::resource('user', App\Http\Controllers\UserController::class);

Route::get('/barangkeluar', [App\Http\Controllers\BarangKeluarController::class, 'index'])->name('daftarBarangKeluar');








//di view barang rusak dan peminjaman, user cuma milih kode_barang aja. Setelah milih maka semua field otomatis terisi sesuai database dan tidak bisa di ubah. selanjutnya user tinggal input jumlahnya saja

//dibagian register table yang terhubung bukan tabel user melainkan table profile karena tabel user statusnya sebagai child sehingga tidak bisa di create atau update. Digunakan tabel profile karena dia merupakan parent dari tabel user. Tinggal definisikan relasinya di model agar kita dapat mengakses tabel usernya untuk create email dan passwordnya

//di peminjaman dan barang rusak tinggal mengubah kuantitas dari barang yang bersangkutan saja. Sehingga langsung di arahkan ke class update saja.

//di profile aku mau seluruh attibutnya dalam bentuk teks (bukan form) dan disebelah tiap atribut ada tombol edit. Setelah tombol edit diklik maka teks tadi berubah menjadi form ( tidak berpindah halaman).

//butuh field jumlah/kuantitas di tabel barang.
//kode barang harus unique sebagai parameter untuk form pengembalian dan barang rusak dan peminjaman
//jika kuantitas sebuah barang 0 (kosong), maka tidak terjadi apapun. jika ingin di hilangkan maka user harus melakukannya secara manual di view daftar barang.

// *blm dicoba* buat cem form login. formnya post, nanti di controller di where id/kode barangnya untuk ngubah kuantitasnya