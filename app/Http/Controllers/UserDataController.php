<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;

class UserDataController extends Controller
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
        $ktp = $request->file('file_ktp');
        
        $nama_ktp = "foto_ktp_".$request->nim_nip.".".$ktp->getClientOriginalExtension();

        $ktp_upload = 'folder_ktp';
        $ktp->move($ktp_upload,$nama_ktp);
        
        UserData::updateOrCreate(
            ['id_user' => $id],
            ['nama_lengkap' => $request->nama_lengkap, 
             'nim_nip'    => $request->nim_nip,
             'no_telp'    => $request->no_telp,
             'status'     => $request->option,
             'gambar_ktp' => $nama_ktp,
             'alamat'     => $request->alamat]
        );

        return redirect()->route('home');
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
