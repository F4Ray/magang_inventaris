<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class BarangKeluarController extends Controller
{
    public function index(Request $request)
    {


        if ($request->ajax()) {

            if (Auth::user()->id_role == 2) {
                $data = BarangKeluar::where('disable', '=', 0)
                    ->where('id_peminjam', '=', Auth::user()->id)
                    ->get();
            } else {
                $data = BarangKeluar::where('disable', '=', 0)->get();
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('merk', function ($row) {

                    // $merk = $brg->merk->merk;
                    return $row->merk->merk;
                })
                ->addColumn('pengembalian', function ($row) {
                    $actionBtn = '<a type="button" class="btn  btn-sm btn-primary mx-2"
                    href="' . route('pengembalian.edit', $row->id) . '">Pengembalian</a>';

                    return $actionBtn;
                })
                ->rawColumns(['action', 'pengembalian'])
                ->make(true);
        }
        return view('daftarBarang.barangKeluar');
    }
}