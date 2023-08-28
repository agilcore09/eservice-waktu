<?php

namespace App\Http\Controllers;

use App\Models\costumer;
use Illuminate\Http\Request;
use App\models\teknisi;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ApiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return costumer::all();
        $data = DB::table('costumer')

            ->orderby('biaya')
            // ->where('id_teknisi', $request->session()->get('id'))

            ->get();


        // $data = $data->toArray();

        // $data = $data->toArray();


        do {
            $swapped = false;
            for ($i = 0, $c = count($data) - 1; $i  < $c; $i++) {
                if ($data[$i] > $data[$i + 1]) {
                    list($data[$i + 1], $data[$i]) =
                        array($data[$i], $data[$i + 1]);
                    $swapped = true;
                }
            }
        } while ($swapped);


        // do {
        //     $swapped = false;
        //     for ($i = 0, $c = count($data) - 1; $i  < $c; $i++) {
        //         if ($data[$i] < $data[$i + 1]) {
        //             list($data[$i + 1], $data[$i]) =
        //                 array($data[$i], $data[$i + 1]);
        //             $swapped = true;
        //         }
        //     }
        // } while ($swapped);



        // return $my_array;
        return $data;


        // dd($data);
        // return response()->json([
        //     'response_code' => 200,
        //     'message' => 'Berhasil Ambil Data',
        //     'conntent' => $data
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $teknisi = new teknisi;
        $teknisi->nama_teknisi = $request->nama_teknisi;
        $teknisi->username = $request->username;
        $teknisi->no_hp = $request->no_hp;
        $teknisi->password = $request->password;
        $teknisi->no_tenan = $request->no_tenan;
        $teknisi->save();
        return "berhasil menyimpan";
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
        $nama_teknisi = $request->nama_teknisi;
        $username = $request->username;
        $no_hp = $request->no_hp;
        $password = $request->password;
        $no_tenan = $request->no_tenan;

        $teknisi = teknisi::find($id);

        $teknisi->nama_teknisi = $nama_teknisi;
        $teknisi->username = $username;
        $teknisi->no_hp = $no_hp;
        $teknisi->password = $password;
        $teknisi->no_tenan = $no_tenan;
        $teknisi->save();
        return "berhasil update";
    }



    public function cek_costumer(Request $request)
    {
        $model = $request->all();



        if ($costumer = costumer::select('costumer.*')->where('kd_transaksi', '=', $model['kd_transaksi'])->first()) {
            $ambildata = costumer::where('id', '=', $costumer['id'])->get();


            return response()->json([
                'response_code' => 200,
                'message' => 'Berhasil Ambil Data',
                'conntent' => $ambildata
            ]);
        } else {
            return response()->json([
                'response_code' => 404,
                'message' => 'Data Tidak Ditemukan'
            ]);
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
        $teknisi = teknisi::find($id);
        $teknisi->delete();
        return "berhasil hapus";
    }
}
