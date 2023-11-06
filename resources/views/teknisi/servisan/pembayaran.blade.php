@extends('teknisi.layouts.index')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Biaya Jasa Servis</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Jasa Servis</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-11">
                    <div class="card shadow">
                        <div class="card-body">

                            <div class="container-fluid">
                                <div class="col-10">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <form method="GET">
                                                <div class="form-group">
                                                    <div class="form-group input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fa-solid fa-calendar-days"></i> </span>
                                                        </div>
                                                        <input name="dateIn" class="form-control" placeholder="Full name"
                                                            type="date">
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="col-1">
                                            <button class="btn btn-primary" type="submit"> <i
                                                    class="fa-solid fa-stamp"></i>
                                                Terapkan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid table-wrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>KD Transaksi</th>
                                            <th>Nama Kostumer</th>
                                            <th>Alamat</th>
                                            <th>No Hp</th>
                                            <th>Kerusakan</th>
                                            <th>Biaya</th>
                                            <th>Tgl Masuk</th>
                                            <th>Tgl Selesai</th>
                                            <th>Kategori Kerusakan</th>
                                            <th>Estimasi Kerja</th>
                                            <th>Status</th>
                                            <th>Status Servisan</th>
                                        </tr>
                                    </thead>
                                    <?php $num = 1; ?>
                                    <tbody>

                                        @foreach ($data as $no => $v)
                                            <tr>
                                                <td class="text-center">{{ $num++ }}</td>
                                                <td class="text-center">{{ $v->kd_transaksi }}</td>
                                                <td>{{ $v->nama_costumer }}</td>
                                                <td>{{ $v->alamat }}</td>
                                                <td>{{ $v->no_hp }}</td>
                                                <td>{{ $v->kerusakan }}</td>
                                                <td>Rp. {{ number_format($v->biaya) }}</td>
                                                <td>
                                                    @php

                                                        $dt = strtotime($v->tgl_masuk);
                                                        $getDateTime = date('F d, Y H:i:s', $dt);
                                                        echo $getDateTime;

                                                    @endphp

                                                </td>
                                                <td>
                                                    @if ($v->tgl_selesai)
                                                        @php
                                                            $dt = strtotime($v->tgl_selesai);
                                                            $getDateTime = date('F d, Y H:i:s', $dt);
                                                            echo $getDateTime;
                                                        @endphp
                                                    @endif
                                                </td>
                                                <td>{{ $v->kategori }}</td>
                                                <td>
                                                    @if ($v->status_servisan == 0)
                                                        {{-- test --}}
                                                        {{-- {{ $v->estimasi }} --}}
                                                        <?php
                                                        
                                                        // mengatur time zone untuk WIB.
                                                        date_default_timezone_set('Asia/Makassar');
                                                        
                                                        // mencari mktime untuk tanggal 1 Januari 2011 00:00:00 WIB
                                                        //    $selisih1 =  mktime( $v->estimasi);
                                                        
                                                        $selisih1 = strtotime($v->estimasi);
                                                        $date = date('Y-m-d H:i:s', mktime(date('H', $selisih1), date('i', $selisih1), date('s', $selisih1), date('m', $selisih1), date('d', $selisih1), date('Y', $selisih1) + 1));
                                                        
                                                        // mencari mktime untuk current time
                                                        $selisih2 = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));
                                                        
                                                        // mencari selisih detik antara kedua waktu
                                                        $delta = $selisih1 - $selisih2;
                                                        
                                                        // proses mencari jumlah hari
                                                        $a = floor($delta / 86400);
                                                        
                                                        // proses mencari jumlah jam
                                                        $sisa = $delta % 86400;
                                                        $b = floor($sisa / 3600);
                                                        
                                                        // proses mencari jumlah menit
                                                        $sisa = $sisa % 3600;
                                                        $c = floor($sisa / 60);
                                                        
                                                        // proses mencari jumlah detik
                                                        $sisa = $sisa % 60;
                                                        $d = floor($sisa / 1);
                                                        
                                                        if ($delta < 0) {
                                                            echo 'Waktu Estimasi Telah Lewat';
                                                        } else {
                                                            echo 'Order tersisa ' . $a . ' Hari' . $b . ' Jam' . $c . ' Menit' . $d . ' Detik';
                                                        }
                                                        ?>

                                                        {{-- end test --}}
                                                    @elseif($v->status_servisan == 1)
                                                        {{-- test --}}
                                                        <?php
                                                        
                                                        // mengatur time zone untuk WIB.
                                                        date_default_timezone_set('Asia/Makassar');
                                                        
                                                        // mencari mktime untuk tanggal 1 Januari 2011 00:00:00 WIB
                                                        //    $selisih1 =  mktime( $v->estimasi);
                                                        
                                                        $selisih1 = strtotime($v->estimasi);
                                                        $date = date('Y-m-d H:i:s', mktime(date('H', $selisih1), date('i', $selisih1), date('s', $selisih1), date('m', $selisih1), date('d', $selisih1), date('Y', $selisih1) + 1));
                                                        // dd($date);
                                                        
                                                        // mencari mktime untuk current time
                                                        $selisih2 = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));
                                                        
                                                        // mencari selisih detik antara kedua waktu
                                                        $delta = $selisih1 - $selisih2;
                                                        
                                                        // proses mencari jumlah hari
                                                        $a = floor($delta / 86400);
                                                        
                                                        // proses mencari jumlah jam
                                                        $sisa = $delta % 86400;
                                                        $b = floor($sisa / 3600);
                                                        
                                                        // proses mencari jumlah menit
                                                        $sisa = $sisa % 3600;
                                                        $c = floor($sisa / 60);
                                                        
                                                        // proses mencari jumlah detik
                                                        $sisa = $sisa % 60;
                                                        $d = floor($sisa / 1);
                                                        
                                                        if ($delta < 0) {
                                                            echo 'Estimasi Selesai';
                                                        } else {
                                                            echo "<div class='my_div' data-date='$v->estimasi'></div>";
                                                        }
                                                        
                                                        //    echo "Waktu saat ini: ".date("d-m-Y H:i:s")."<br>";
                                                        
                                                        ?>

                                                        {{-- end test --}}
                                                    @endif

                                                    {{-- jika sudah selesai --}}
                                                    @if ($v->status_servisan == 4)
                                                        <?php
                                                        
                                                        // mengatur time zone untuk WIB.
                                                        date_default_timezone_set('Asia/Makassar');
                                                        
                                                        // mencari mktime untuk tanggal 1 Januari 2011 00:00:00 WIB
                                                        //    $selisih1 =  mktime( $v->estimasi);
                                                        
                                                        $selisih1 = strtotime($v->estimasi);
                                                        $date = date('Y-m-d H:i:s', mktime(date('H', $selisih1), date('i', $selisih1), date('s', $selisih1), date('m', $selisih1), date('d', $selisih1), date('Y', $selisih1) + 1));
                                                        
                                                        // mencari mktime untuk current time
                                                        $selisih2 = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));
                                                        
                                                        // mencari selisih detik antara kedua waktu
                                                        $delta = $selisih1 - $selisih2;
                                                        
                                                        // proses mencari jumlah hari
                                                        $a = floor($delta / 86400);
                                                        
                                                        // proses mencari jumlah jam
                                                        $sisa = $delta % 86400;
                                                        $b = floor($sisa / 3600);
                                                        
                                                        // proses mencari jumlah menit
                                                        $sisa = $sisa % 3600;
                                                        $c = floor($sisa / 60);
                                                        
                                                        // proses mencari jumlah detik
                                                        $sisa = $sisa % 60;
                                                        $d = floor($sisa / 1);
                                                        
                                                        if ($delta < 0) {
                                                            echo 'Estimasi Telah Selesai';
                                                        } else {
                                                            echo "<div class='my_div' data-date='$v->estimasi'></div>";
                                                        }
                                                        ?>
                                                    @endif

                                                    </p>


                                                </td>
                                                {{-- <td>{{ $v->tgl_selesai}}</td> --}}
                                                <td>

                                                    @if ($v->status == 0)
                                                        <span class="badge badge-danger">Belum Bayar</span>
                                                    @elseif($v->status == 1)
                                                        <span class="badge badge-primary">Sudah Bayar</span>
                                                    @endif

                                                <td>
                                                    @if ($v->status_servisan == 0)
                                                        <div class="d-flex align-items-center">

                                                            <span class="badge badge-pill badge-dark">
                                                                <strong>Menunggu dikerja</strong>
                                                            </span>
                                                            {{-- <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div> --}}
                                                        </div>
                                                    @elseif($v->status_servisan == 1)
                                                        <a href="" class="badge badge-success"> dikerja</a>
                                                    @elseif ($v->status_servisan == 2)
                                                        <a href="#" class="badge badge-warning">garansi diklaim</a>
                                                    @elseif($v->status_servisan == 4)
                                                        <a href="" class="badge badge-success"> Selesai dikerja</a>
                                                    @elseif ($v->status_servisan == 3)
                                                        <a href="#" class="badge badge-info">garansi telah selesai</a>
                                                    @endif
                                                </td>



                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </section>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>
<script>
    function tes(id) {
        $('#id').val(id);

        $('#id').val(id);

    }

    //  $('#edit').on('show.bs.modal', function (event){

    //  console.log("hello");
    // var button = $(event.relatedTarget)
    //   // // var id = button.data('myid')
    //   // var nama_teknisi = button.data('mynama_teknisi')
    //   // var username = button.data('myusername')
    //   // var password = button.data('mypassword')
    //   // var no_hp = button.data('myno_hp')
    //   // var no_tenan = button.data('myno_tenan')


    //   // var modal =$(this) 
    //   // // modal.find('.modal-body #idedit').val(id);
    //   // modal.find('.modal-body #nama_teknisiq').val(nama_teknisi);
    //   // modal.find('.modal-body #usernameq').val(username);
    //   // modal.find('.modal-body #passwordq').val(password);
    //   // modal.find('.modal-body #no_hpq').val(no_hp);
    //   // modal.find('.modal-body #no_tenanq').val(no_tenan);
    //  })
</script>
