<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangKeluar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        // $profiles = Profile::firstOrFail();
        // $user_id = auth()->user()->id;
        // $users = User::where('id', $user_id)->get();   
        $day = date('d');
        $user_id = auth()->user()->id;
        // $users = User::where('id', $user_id)->get();         Gak perlu lagi karena di layouts.app kita manggil pake auth()->user() artinya siapa yang login
        $transaksi = Transaksi::where('id_user', '=', Auth::user()->id)->get();
        $transaksi_today = count($transaksi);
        $barangKeluar = BarangKeluar::where('disable', '=', 0)
            ->where('id_peminjam', '=', Auth::user()->id)
            ->get();
        $barangKeluar_today = count($barangKeluar);



        $barang = Barang::All()->count();



        return view('home', compact('transaksi_today', 'barang', 'barangKeluar_today'));
    }

    public function adminHome()
    {
        $day = date('d');
        $user_id = auth()->user()->id;
        // $users = User::where('id', $user_id)->get();         Gak perlu lagi karena di layouts.app kita manggil pake auth()->user() artinya siapa yang login
        $transaksi = DB::select("SELECT *  FROM transaksi WHERE DAY(created_at) =$day");
        $transaksi_today = count($transaksi);

        $barangMasuk = DB::select("SELECT *  FROM transaksi WHERE DAY(created_at) =$day AND id_jenis_transaksi = 1");
        $barangMasuk_today = count($barangMasuk);
        $barangKeluar = DB::select("SELECT *  FROM transaksi WHERE DAY(created_at) =$day AND id_jenis_transaksi = 3");
        $barangKeluar_today = count($barangKeluar);



        $barang = Barang::All()->count();



        return view('adminHome', compact('transaksi_today', 'barang', 'barangKeluar_today', 'barangMasuk_today'));
    }
}