<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Merk;
use App\Models\Transaksi;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // $transaksi = Transaksi::All();
        if ($request->ajax()) {
            if (Auth::user()->id_role == 2) {
                $data = Transaksi::where('id_user', '=', Auth::user()->id)
                    ->get();
            } else {
                $data = Transaksi::All();
            }
            // $data = Transaksi::All();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('merk', function ($row) {

                    // var_dump($row->barang->merk);
                    return $row->barang->merk->merk;
                })
                ->addColumn('kode_barang', function ($row) {


                    return $row->barang->kode_barang;
                })
                ->addColumn('jenis_transaksi', function ($row) {


                    return $row->jenis_transaksi->jenis_transaksi;
                })
                ->addColumn('waktu', function ($row) {

                    $dt = $row->created_at->locale('id')->isoFormat('LLLL');
                    return $dt;
                })
                ->addColumn('nama_barang', function ($row) {


                    return $row->barang->nama;
                })
                ->addColumn('nama_peminjam', function ($row) {

                    $namaPeminjam = $row->nama_peminjam;
                    if ($namaPeminjam == null || $namaPeminjam == '') {
                        $namaPeminjam = "-";
                    }

                    return $namaPeminjam;
                })
                ->make(true);
        }


        return view('transaksi.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama' => 'required',
            'id_merk' => 'required',
            'kuantitas' => 'required'
        ]);

        // $transaksi = Transaksi::create(array(
        //     'id_jenis_transaksi' => '3',
        //     'id_barang' => $request->kode_barang,
        //     'id_user' => Auth()->user()->id,
        //     'kuantitas' => $request->kuantitas,
        //     'nama_peminjam' => ''
        // ));

        // Barang::create($request->all());

        $barang = new Barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->nama = $request->nama;
        $barang->id_merk = $request->id_merk;
        $barang->kuantitas = $request->kuantitas;
        $barang->save();

        $transaksi = new Transaksi;
        $transaksi->id_barang = $barang->id;
        $transaksi->id_jenis_transaksi = 1;
        $transaksi->id_user = auth()->id();
        $transaksi->nama_peminjam = null;
        $transaksi->kuantitas = $request->kuantitas;
        $transaksi->save();







        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function create()
    {
        $merk = Merk::All();
        return view('dashboard.penambahan', compact('merk'));
    }
}