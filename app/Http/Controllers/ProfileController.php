<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {

    //     $profile_id = auth()->user()->id_profiles;
    //     $profiles = Profile::where('id', $profile_id)->get();

    //     return view('dashboard.profil', compact('profiles'));
    // }

    public function index()
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        // dd($users->profile->foto_profile);

        return view('dashboard.profil', compact('user'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // $email = User::find($id)->update(array(
        //     // 'email'=>$request->email,
        //     'nama' => $request->nama,
        //     // 'nip' => $request->nip
        // ));

        $usernya = User::find(Auth::user()->id);
        $profilenya = Profile::find($usernya->id_profiles);
        $namaNip = $profilenya->update([
            'nama' => $request->nama
        ]);
        // $edit = Profile::update(array(
        //     'nama' => $request->nama,
        //     '' => $request->kode_barang,
        //     'id_user' => Auth()->user()->id,
        //     'nip' => $request->nip
        // ));

        return redirect()->route('profile');
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