<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Merk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
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
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang, $id)
    {
        // $barang = Barang::where('id', $id)->get();
        $barang = BarangKeluar::find($id);
        // dd($barang);
        return view('dashboard.pengembalian', compact('barang'));
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

        //merubah angka table barang keluar
        $oldKuantitas = BarangKeluar::find($id)->kuantitas;

        $newKuantitas = (int)$request->kuantitas;
        $newKuantitas = $oldKuantitas - $newKuantitas;


        //merubah angka table barang
        $barangnya = Barang::where('kode_barang', '=', $request->kode_barang)->first();

        $oldKuantitasBarangnya = $barangnya->kuantitas;
        $newKuantitasBarangnya = (int)$request->kuantitas;
        $newKuantitasBarangnya += $oldKuantitasBarangnya;


        $request->validate(
            [
                'nama_peminjam' => 'required',
                'kode_barang' => 'required',
                'kuantitas' => "required|integer|max:$oldKuantitas"
            ],
            [
                'kuantitas.max' => "Jumlah tidak boleh lebih dari $oldKuantitas"
            ]
        );




        //update barang keluar
        if ($oldKuantitas == $request->kuantitas) {
            $barangkel = BarangKeluar::find($id)
                ->update([
                    'kuantitas' => 0,
                    'disable' => '1'
                ]);
        } else {
            $barangkel = BarangKeluar::find($id)->update([
                'kuantitas' => $newKuantitas,
            ]);
        }

        // update barang
        $z = Barang::where('kode_barang', '=', $request->kode_barang)
            ->update([
                'kuantitas' => $newKuantitasBarangnya
            ]);


        $transaksi = Transaksi::create(array(
            'id_jenis_transaksi' => 2,
            'id_barang' => $barangnya->id,
            'id_user' => Auth()->user()->id,
            'kuantitas' => $request->kuantitas,
            'nama_peminjam' => $request->nama_peminjam
        ));

        // $barangKeluar = BarangKeluar::find($id)->update([
        //     'kuantitas' => 
        // ])

        // return redirect('barang.editBarang');
        // dd($request);

        return redirect()->route('daftarBarangKeluar')->with(['success' => 'Barang berhasil dikembalikan!']);
        // return view('dashboard.daftarBarang', compact('barang'));
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