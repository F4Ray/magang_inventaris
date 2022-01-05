<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Merk::All();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<a type="button" class="btn  btn-sm btn-secondary mx-2"
                    href="' . route('merk.edit', $row->id) . '">Edit</a>';

                    $actionBtn = $actionBtn .   '<form onsubmit="return confirm(\'Hapus ' . $row->merk . '? \');"' .
                        ' action="' . route('merk.destroy', $row->id) . '" method="post">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button type="submit" class="btn btn-sm btn-secondary mt-1">hapus</button>
                    </form>';


                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('merk.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merk = Merk::All();
        return view('dashboard.tambahMerk', compact('merk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'merk' => 'required'
        ]);



        foreach ($request->merk as $merk) {
            Merk::create([
                'merk' => $merk
            ]);
        }
        // $pj = Merk::get('merk');
        // foreach($pj as $key) {
        // DB::table('order_detail')->insert($order);
        // }

        return redirect()->route('merk.create')
            ->with('success', 'Merk berhasil ditambah');
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
    {
        $merk = Merk::find($id);




        return view('merk.edit')->with(compact('merk'));
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
        $validated = $request->validate([
            'merk' => 'required'
        ]);

        $merk = Merk::find($id)->update([
            'merk' => $request->merk
        ]);

        if ($merk) {
            return redirect()->route('merk.index')
                ->with('success', 'Merk berhasil diedit');
        } else {
            return redirect()->route('merk.index')
                ->with('fail', 'Merk gagal diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merk = Merk::find($id);

        $delMerk = $merk->delete();
        if ($delMerk) {

            return redirect()->route('merk.index')->with('success', 'Merk berhasil dihapus');
        } else {
            return redirect()->route('merk.index')->with('fail', 'Merk gagal dihapus');
        }
    }
}