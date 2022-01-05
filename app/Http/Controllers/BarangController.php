<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Merk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $barang = Barang::All();
        // $merk = Merk::All();
        // return view('dashboard.penambahan')->with (compact('barang', 'merk'));

        // $barang = Barang::All();

        // return view('dashboard.daftarBarang', compact('barang'));

        // dd($request->ajax());
        if ($request->ajax()) {
            $data = Barang::All();

            if (Auth::user()->id_role == 2) {
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('merk', function ($row) {

                        // $merk = $brg->merk->merk;
                        return $row->merk->merk;
                    })
                    ->addColumn('peminjaman', function ($row) {
                        $actionBtn = '<a type="button" class="btn  btn-sm btn-primary mx-2"
                    href="' . route('peminjaman.edit', $row->id) . '">Peminjaman</a>';

                        return $actionBtn;
                    })
                    ->rawColumns(['action', 'peminjaman'])
                    ->make(true);
            } else {
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('merk', function ($row) {

                        // $merk = $brg->merk->merk;
                        return $row->merk->merk;
                    })
                    ->addColumn('peminjaman', function ($row) {
                        $actionBtn = '<a type="button" class="btn  btn-sm btn-primary mx-2"
                    href="' . route('peminjaman.edit', $row->id) . '">Peminjaman</a>';

                        return $actionBtn;
                    })
                    ->addColumn('action', function ($row) {
                        // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';

                        $actionBtn = '<a type="button" class="btn  btn-sm btn-secondary mx-2"
                    href="' . route('barang.edit', $row->id) . '">Edit</a>';

                        $actionBtn = $actionBtn .   '<form onsubmit="return confirm(\'Hapus ' . $row->nama . '? \');"' .
                            ' action="' . route('barang.destroy', $row->id) . '" method="post">' .
                            csrf_field() .
                            method_field("DELETE") .
                            '<button type="submit" class="btn btn-sm btn-secondary mt-1">hapus</button>
                    </form>';

                        return $actionBtn;
                    })
                    ->rawColumns(['action', 'peminjaman'])
                    ->make(true);
            }
        }
        return view('dashboard.daftarBarang');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $merk = Merk::All();
        // return view('dashboard.penambahan', compact('merk'));

        $barang = Barang::All();
        $merk = Merk::All();
        $now = Carbon::now();
        $unique_code = "B-" . $now->format('Hszu');
        return view('dashboard.penambahan')->with(compact('barang', 'merk', 'unique_code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama' => 'required',
            'id_merk' => 'required',
            'kuantitas' => 'required'
        ]);

        $barang = Barang::create($request->all());

        $transaksi = Transaksi::create(array(
            'id_jenis_transaksi' => 3,
            'id_barang' => $barang->id,
            'id_user' => Auth()->user()->id,
            'kuantitas' => $request->jumlah,
            'nama_peminjam' => null
        ));


        $quries = DB::getQueryLog();

        dd($quries);


        return redirect()->route('barang.create')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //EDIT BARANG
        $merk = Merk::All();
        // dd($barang);
        return view('daftarBarang.editBarang', compact('barang', 'merk'));

        // PENGEMBALIAN
        // $ids = Barang::all()
        // // ->where('town_id', Auth::user()->town_id)
        // ->where('id', $barang->get('kode_barang'))
        // ->first();

        // if(is_null($ids))
        // {
        //     // Do somthing if no result e.g.
        //     echo 'no_id', 'ID does not exist!';
        //     return redirect()->back();
        // }

        // return view('dashboard.pengembalian', compact('ids'));
        // return view('dashboard.pengembalian', compact('barang')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama' => 'required',
            'id_merk' => 'required',
            'kuantitas' => 'required'
        ]);

        // Barang::update($request->all());
        $barang = Barang::find($barang->id)->update($request->all());

        return redirect('barang')
            ->with('success', 'Data berhasil diubah');;
        // return view('editBarang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barangKeluar = BarangKeluar::where('kode_barang', '=', $barang->kode_barang)->first();
        if ($barangKeluar == null) {
            $barang = Barang::findOrFail($barang->id);
            $barang->delete();

            return redirect()->route('barang.index')->with('success', 'Barang berhasil di hapus');
        } else {
            return redirect()->route('barang.index')->with('fail', 'Barang yang sedang dipinjam tidak bisa dihapus');
        }
    }

    // public function showAll()
    // {
    //     $barang = Barang::All();

    //     return view('dashboard.daftarBarang', compact('barang'));
    // }
}