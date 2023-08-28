<?php

namespace App\Http\Controllers;

use App\Models\teknisi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class LoginTeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teknisi.login_teknisi.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return Redirect('/login-teknisi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $masuk = teknisi::where('username', $request->username)->where('password', $request->password)->first();
        // dd($masuk);
        if ($masuk) {

            $request->session()->put('status_login', '1');
            $request->session()->put('id', $masuk->id);
            $request->session()->put('nama', $masuk->nama_teknisi);
            $request->session()->put('no', $masuk->no_tenan);
            $request->session()->put('idluar', $masuk->id);

            //   $request->session()->put('status_login', '1');

            return Redirect('/show-home-servisan');
            // Alert::success('Berhasil', 'Data Berhasil Di update');
            //Alert::success('Berhasil', 'Data Berhasil Di update');

        }

        Alert::error('Login Gagal', 'Username dan Password Salah');

        return view('teknisi.login_teknisi.login');
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
        //
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
