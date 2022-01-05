<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Merk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { {
            // $barang = Barang::where('id', $id)->get();
            $barang = Barang::find($id);

            // dd($barang);
            return view('dashboard.peminjaman', compact('barang'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $oldKuantitas = Barang::find($id)->kuantitas;
        $idMerk = Barang::find($id)->id_merk;

        $newKuantitas = (int)$request->jumlah;
        $newKuantitas = $oldKuantitas - $newKuantitas;


        $validated = $request->validate(
            [
                'kode_barang' => 'required',
                'nama_barang' => 'required',
                'nama_peminjam' => 'required',
                'jumlah' => "required|integer|max:$oldKuantitas"
            ],
            [
                'jumlah.max' => "Jumlah tidak boleh lebih dari $oldKuantitas"
            ]
        );

        // Barang::update($request->all());
        $z = Barang::find($id)->update([
            'kuantitas' => $newKuantitas
        ]);


        $transaksi = Transaksi::create(array(
            'id_jenis_transaksi' => 3,
            'id_barang' => $id,
            'id_user' => Auth()->user()->id,
            'kuantitas' => $request->jumlah,
            'nama_peminjam' => $request->nama_peminjam
        ));

        $barangKeluar = new BarangKeluar;
        $barangKeluar->nama = $request->nama_barang;
        $barangKeluar->kode_barang = $request->kode_barang;
        $barangKeluar->nama_peminjam = $request->nama_peminjam;
        $barangKeluar->kuantitas = $request->jumlah;
        $barangKeluar->id_merk = $idMerk;
        if (Auth::user()->id_role == 2) {
            $barangKeluar->id_peminjam = Auth::user()->id;
        }
        $barangKeluar->save();



        // return redirect('barang.editBarang');
        // dd($request);
        // return view('dashboard.daftarBarang', compact('barang'));
        return redirect()->route('barang.index')->with(['success' => 'Barang berhasil dipinjam!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}