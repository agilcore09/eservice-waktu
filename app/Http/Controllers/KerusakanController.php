<?php

namespace App\Http\Controllers;

use App\Models\kerusakan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;


class KerusakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = kerusakan::all();
        //Alert::success('Berhasil', 'Sukses Menyimpan');

        // $data = DB::table('kerusakan')
        //     ->orderBy('biaya', 'ASC')
        //     ->get();

        // $data = $data->toArray();


        // do {
        //     $swapped = false;
        //     for ($i = 0, $c = count($data) - 1; $i < $c; $i++) {
        //         if ($data[$i] > $data[$i + 1]) {
        //             list($data[$i + 1], $data[$i]) =
        //                 array($data[$i], $data[$i + 1]);
        //             $swapped = true;
        //         }
        //     }
        // } while ($swapped);

        $data = DB::table('kerusakan')
            ->select(
                'biaya',
                'id',
                'kerusakan'
            )

            ->get();

        $data = $data->toArray();


        do {
            $swapped = false;
            for ($i = 0, $c = count($data) - 1; $i < $c; $i++) {
                if ($data[$i] < $data[$i + 1]) {
                    list($data[$i + 1], $data[$i]) =
                        array($data[$i], $data[$i + 1]);
                    $swapped = true;
                }
            }
        } while ($swapped);
        //dd($data);
        return view('admin.kerusakan.index', compact('data'));
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
        $data = new kerusakan;

        $data->kerusakan = $request->input('kerusakan');
        $data->biaya = $request->input('biaya');

        //dd($request);

        $data->save();
        Alert::success('Berhasil', 'Data Berhasil Di Simpan');
        return redirect('/kerusakan');
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
        $data = kerusakan::find($id);
        //dd($data);
        return view('admin.kerusakan.formedit', compact('data'));
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
        $data = kerusakan::find($id);
        $model = $request->all();
        $data->update($model);
        Alert::success('Berhasil', 'Data Berhasil Di update');
        return redirect('/kerusakan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = kerusakan::find($id);
        //Alert::success('Berhasil', 'Data Berhasil Di update');
        Alert::error('', 'Berhasil Di Hapus');
        $data->delete();

        return redirect('/kerusakan');
    }
}
