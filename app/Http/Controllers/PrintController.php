<?php

namespace App\Http\Controllers;

use App\Models\costumer;
use App\Models\teknisi;
use Illuminate\Http\Request;
use PDF;
use Carbon;


class PrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function printreport()
    {
    
        $cos = costumer::all();
        $pdf   = PDF::loadview('admin.teknisi.print', compact('cos'))->setPaper('a4', 'landscape');
        return $pdf->download('laporan-bulanan.pdf');
    }

    public function print($id)
    {

        $servisan = costumer::where('id', $id)->first();
        //   dd($pesanan);
        $servisanq = costumer::where('id', $servisan->id)->get();
        $pdf = PDF::loadView('teknisi.servisan.print', compact('servisan', 'servisanq', 'id'))->setPaper('a4', 'landscape');
        return $pdf->stream();
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
