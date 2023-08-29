<?php

namespace App\Http\Controllers;

use App\Models\teknisi;
use App\Models\costumer;
use Hash;
use Session;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $data = teknisi::count();
        $cos = costumer::count();
        $kerja = costumer::where('status_servisan', 0)->count();
        $selesai = costumer::where('status_servisan', 1)->count();
        $klaim = costumer::where('status_servisan', 2)->count();
        $doneklaim = costumer::where('status_servisan', 3)->count();
        //Alert::success('Berhasil', 'Sukses Menyimpan');
        return view('admin.teknisi.home', compact('data', 'selesai', 'klaim', 'doneklaim', "cos", "kerja"));
    }


    public function index()
    {
        $data = teknisi::all();
        //Alert::success('Berhasil', 'Sukses Menyimpan');
        return view('admin.teknisi.index', compact('data'));
    }

    public function del()
    {
        // $data = teknisi::all();
        //Alert::success('Berhasil', 'Sukses Menyimpan');
        return view('admin.teknisi.del');
    }

    public function hapus()
    {
        DB::table('costumer')->truncate();
        Alert::success('Berhasil', 'Sukses Di Reset');
        return redirect('/del');
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
        $this->validate($request, [
            'nama_teknisi' => 'required',
            'username' => 'required',
            'password' => 'required',
            'no_hp' => 'required',
            'no_tenan' => 'required',
        ]);

        $data = new Teknisi;

        $data->nama_teknisi = $request->input('nama_teknisi');
        $data->username = $request->input('username');
        $data->password = $request->input('password');
        $data->no_hp = $request->input('no_hp');
        $data->no_tenan = $request->input('no_tenan');

        //dd($request);

        $data->save();
        Alert::success('Berhasil', 'Data Berhasil Di Simpan');
        return redirect('/admin');
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
        $data = teknisi::find($id);
        return view('admin.teknisi.formedit', compact('data'));
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
        // $data = teknisi::findorfail($request->id);
        // dd($data);

        $data = teknisi::find($id);
        $model = $request->all();
        $data->update($model);
        Alert::success('Berhasil', 'Data Berhasil Di update');
        return redirect('/admin');
    }


    public function destroy($id)
    {
        $data = teknisi::find($id);
        //Alert::success('Berhasil', 'Data Berhasil Di update');
        Alert::error('', 'Berhasil Di Hapus');
        $data->delete();

        return redirect('/admin');
    }
}
