<?php

namespace App\Http\Controllers;

use App\Models\costumer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('home');
    }

    public function home()
    {
        return view('costumer.home');
    }

    public function costumer(Request $request)
    {
        $model = $request->all();



        if ($costumer = costumer::select('costumer.*')->where('kd_transaksi', '=', $model['kd_transaksi'])->first()) {
            $ambildata = costumer::where('id', '=', $costumer['id'])->get();
            Alert::success('Berhasil', 'Data Berhasil Di Temukan');
            return view('costumer.home', compact('costumer', 'ambildata'));
        }
        //dd($costumer);
        else {
            Alert::error('Data Anda Tidak Ditemukan Silahkan Ulangi!!!');
            return redirect('/');
        }
    }
}
