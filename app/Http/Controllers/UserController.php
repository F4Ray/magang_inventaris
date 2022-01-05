<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::All();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function ($row) {

                    // $merk = $brg->merk->merk;
                    return $row->profile->nama;
                })
                ->addColumn('nip', function ($row) {

                    // $merk = $brg->merk->merk;
                    return $row->profile->nip;
                })
                ->addColumn('role', function ($row) {

                    // $merk = $brg->merk->merk;
                    return $row->role->role;
                })
                ->addColumn('action', function ($row) {
                    // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';

                    $actionBtn = '<a type="button" class="btn  btn-sm btn-secondary mx-2"
                    href="' . route('user.edit', $row->id) . '">Edit</a>';

                    $actionBtn = $actionBtn .   '<form onsubmit="return confirm(\'Hapus ' . $row->profile->nama . '? \');"' .
                        ' action="' . route('user.destroy', $row->id) . '" method="post">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button type="submit" class="btn btn-sm btn-secondary mt-1">Hapus</button>
                    </form>';

                    return $actionBtn;
                })
                ->rawColumns(['action', 'peminjaman'])
                ->make(true);
        }
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::All();

        return view('user.add')->with(compact('roles'));
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
            'email' => 'required|unique:users',
            'password' => 'required',
            'nama' => 'required',
            'nip' => 'required|unique:profiles',
            'role' => 'required'
        ]);

        $profilenya = new Profile;
        $profilenya->nip = $request->nip;
        $profilenya->nama = $request->nama;
        $profilenya->foto_profile = "assets/img/undraw_profile.svg";
        $profilenya->save();

        if ($profilenya->save()) {
            $usernya = new User;
            $usernya->email = $request->email;
            $usernya->password = bcrypt($request->password);
            $usernya->id_role = $request->role;
            $usernya->id_profiles = $profilenya->id;
            $usernya->save();
        }

        return redirect()->route('user.index')
            ->with('success', 'Barang berhasil ditambahkan');
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
        $user = User::find($id);
        $roles = Role::All();


        return view('user.edit')->with(compact('user', 'roles'));
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

        // dd($request->role);

        $user = User::find($id);



        $profile = Profile::find($user->id_profiles);

        if ($request->role == null) {
            $role = $user->id_role;
        } else {
            $role = $request->role;
        }

        $userUpdate = $user->update([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_role' => $role,
        ]);

        $profileUpdate = $profile->update([
            'nama' => $request->nama,
            'nip' => $request->nip
        ]);

        return redirect()->route('user.index')
            ->with('success', 'Barang berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $profile = Profile::find($user->id_profiles);
        $delUser = $user->delete();

        if ($delUser) {
            $profile->delete();

            return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
        } else {
            return redirect()->route('user.index')->with('fail', 'User gagal dihapus');
        }
    }
}