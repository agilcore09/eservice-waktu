<?php

namespace App\Http\Controllers;

use App\Models\costumer;
use App\Models\kerusakan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\OrderHelper;

use function PHPUnit\Framework\isEmpty;

class ServisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $keyword = null;

        if ($request->dateIn && $request->dateTo != null) {

            $data = OrderHelper::orderDate($request->dateIn, $request->dateTo, $request->session()->get('id'));
        } else {
            $data = DB::table('costumer')->where('id_teknisi', $request->session()->get('id'))
                ->where('status_servisan', 0)
                ->orWhere('status_servisan', 1)
                ->orWhere('status_servisan', 2)
                ->orderby("estimasi", "ASC")
                ->get();
        }

        do {
            $swapped = false;
            for ($i = 0, $c = count($data) - 1; $i  <  $c; $i++) {
                if ($data[$i] < $data[$i + 1]) {
                    list($data[$i + 1], $data[$i]) =
                        array($data[$i], $data[$i + 1]);
                    $swapped = true;
                }
            }
        } while ($swapped);

        return view('teknisi.servisan.index', compact('data', 'keyword'));
    }

    public function index_selesai(Request $request)
    {

        $keyword = null;

        if ($request->dateIn && $request->dateTo != null) {
            $data = OrderHelper::orderDateClear($request->dateIn, $request->dateTo, $request->session()->get('id'));
        } else {
            $data = DB::table('costumer')->where('status_servisan', 4)
                ->orderby("updated_at", "ASC")
                ->where('id_teknisi', $request->session()->get('id'))
                ->get();
        }



        $data = $data->toArray();

        do {
            $swapped = false;
            for ($i = 0, $c = count($data) - 1; $i  <  $c; $i++) {
                if ($data[$i] > $data[$i + 1]) {
                    list($data[$i + 1], $data[$i]) =
                        array($data[$i], $data[$i + 1]);
                    $swapped = true;
                }
            }
        } while ($swapped);


        return view('teknisi.servisan.index', compact('data', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = kerusakan::all();
        $now = Carbon::now();
        $thnbulan = $now->year . $now->month;
        $cek = costumer::count();
        $harga = kerusakan::all();
        //dd($cek);
        if ($cek == 0) {
            $urut = 1001;
            $nomor = 'CS:' . $thnbulan . $urut;
            //dd($nomor);
        } else {

            $ambil = costumer::all()->last();
            $urut = (int)substr($ambil->kd_transaksi, -4) + 1;
            $nomor = 'CS:' . $thnbulan . $urut;
            // dd($nomor);
        }

        return view('teknisi.servisan.create', compact('nomor', 'data', 'harga'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal = Carbon::now();
        // $tgl = Carbon::createFromFormat('d-m-Y', $request->estimasi);
        // $tes = date(" Y-M H:i:s", $request->estimasi);
        // dd($tes);
        // $date = date("Y-m-d h:i:s");
        // $date1 = $date($request->estimasi);
        // $tes =  date('d-m-Y H:i:s', strtotime($request->estimasi));
        // dd($tes);
        // $now = date('Y-m-d H:i');

        // $now = ;
        // $now = strtotime('Y-m-d H:i');

        // $date = DateTime::createFromFormat('d/m/Y g:i a', '2018-05-16 10:28 PM');
        // $date = Carbon::now()->format('d/m/Y H:i:s', '2018-05-16 10:28 PM');
        // $date = Carbon::now()->format('d-m-Y H:i:s', ['class' => 'form-control']);
        // $date = DateTime::createFromFormat('Y-m-d H:i a', '2018-05-16 10:28 PM');
        $date = $request->estimasi;
        // $date->format('Y-m-d H:i:s');
        // dd($date);
        // $date = strtotime('Y-m-d H:i');

        // dd($date);





        $cek_servisan = costumer::where('id_teknisi', $request->session()->get('id'))->where('status', 0)->first();
        $pesanan = new costumer;
        $pesanan->id_teknisi = $request->session()->get('id');
        $pesanan->nama_costumer = $request->input('nama_costumer');
        $pesanan->kd_transaksi = $request->input('kd_transaksi');
        $pesanan->alamat = $request->input('alamat');
        $pesanan->no_hp = $request->input('no_hp');
        $pesanan->biaya = $request->input('biaya');
        $pesanan->kerusakan = $request->input('kerusakan');
        $pesanan->kategori = $request->input('kategori');
        $pesanan->estimasi =  $date;
        // $pesanan->lama_servis_jam = $request->input('jam');
        $pesanan->status_servisan = 0;
        $pesanan->tgl_masuk = $tanggal;
        $pesanan->status = $request->input('status');
        // dd($pesanan);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        $pesanan->save();
        return redirect('/show-servisan');
        // dd($pesanan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function selesai($id)
    {
        $tanggal = Carbon::now();
        // $tanggal = DateTime::createFromFormat();
        //  $date = $request->estimasi;
        $servisan = costumer::where('id', $id)->first();
        //   dd($pesanan);

        $servisan->tgl_selesai = $tanggal;
        $servisan->status_servisan = 4;
        //$servisan->status = 1;
        //  dd($servisan);


        $servisan->update();
        Alert::success('Servisan Telah Selesai');

        return redirect('/show-servisan');
    }


    public function dikerja($id)
    {
        $tanggal = Carbon::now();
        // $tanggal = DateTime::createFromFormat();
        //  $date = $request->estimasi;
        $servisan = costumer::where('id', $id)->first();
        //   dd($pesanan);

        // $servisan->tgl_selesai = $tanggal;
        $servisan->status_servisan = 1;
        //$servisan->status = 1;
        //  dd($servisan);


        $servisan->update();
        Alert::success('Servisan dikerjakan');

        return redirect('/show-servisan');
    }

    public function garansi($id)
    {
        $tanggal = Carbon::now();
        $servisan = costumer::where('id', $id)->first();
        //   dd($pesanan);

        $servisan->tgl_selesai = $tanggal;
        $servisan->status_servisan = 2;

        $servisan->update();
        Alert::success('Garansi Di Klaim');

        return redirect('/show-servisan');
    }

    public function bayar($id)
    {
        //$tanggal = Carbon::now();
        $servisan = costumer::where('id', $id)->first();
        //   dd($pesanan);

        // $servisan->tgl_selesai = $tanggal;
        $servisan->status = 1;

        $servisan->update();
        Alert::success('Telah Di Bayar');

        return redirect('/show-servisan');
    }


    public function upgaransi($id)
    {
        $tanggal = Carbon::now();
        $servisan = costumer::where('id', $id)->first();
        //   dd($pesanan);

        $servisan->tgl_selesai = $tanggal;
        $servisan->status_servisan = 3;

        $servisan->update();
        Alert::success('Garansi Telah Selesai Dikerja');

        return redirect('/show-servisan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function homeser(Request $request)
    {
        $dikerja = costumer::where('status_servisan', 0)->where('id_teknisi', $request->session()->get('id'))->count();
        $selesai = costumer::where('status_servisan', 1)->where('id_teknisi', $request->session()->get('id'))->count();
        $klaim = costumer::where('status_servisan', 2)->where('id_teknisi', $request->session()->get('id'))->count();
        $doneklaim = costumer::where('status_servisan', 3)->where('id_teknisi', $request->session()->get('id'))->count();
        return view('teknisi.servisan.home', compact('dikerja', 'selesai', 'klaim', 'doneklaim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function harga()
    {
        $keyword = null;
        $data = kerusakan::all();
        //Alert::success('Berhasil', 'Sukses Menyimpan');
        return view('teknisi.servisan.list_harga', compact('data', 'keyword'));
    }

    public function cari_servisan(Request $request)
    {
        $keyword = $request->search;

        $data = costumer::where('id_teknisi', $request->session()->get('id'))

            ->where('nama_costumer', 'like', "%" . $keyword . "%")

            ->get();
        // dd($data);
        return view('teknisi.servisan.index', compact('data', 'keyword'));
    }

    public function cari_harga(Request $request)
    {
        $keyword = $request->search;

        $data = kerusakan::where('kerusakan', 'like', "%" . $keyword . "%",)
            ->get();
        // dd($data);
        return view('teknisi.servisan.list_harga', compact('data', 'keyword'));
    }

    public function data_sort(Request $request)
    {
        // jika tidak login 
        if ($request->session()->get('id') == null) {
            return redirect("login-teknisi")->with('message', Alert::error('Belum login', 'Kamu Belum Login Sebagai Teknisi'));
        }
        $data = DB::table('costumer')->orderby('estimasi', 'ASC')->get();
        return view('teknisi.servisan.data_sort', compact('data'));
    }

    public function pembayaran(Request $request)
    {
        return view('teknisi.servisan.pembayaran');
    }
}
