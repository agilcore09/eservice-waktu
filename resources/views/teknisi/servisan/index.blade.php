@extends('teknisi.layouts.index')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Servis</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Servisan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <section class="content">
        <div class="container-fluid">
            @include('sweetalert::alert')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="float-right">

                                <a href="{{ route('create_Servisan') }}">
                                    <button class="btn btn-primary btn-sm" id="add">
                                        <i class="fa fa-plus-circle"></i>
                                    </button></a>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- Button trigger modal -->



                        <br>

                        <div class="row">

                            <div class="col-8">
                                <div class="row pl-3">
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i>
                                                    </span>
                                                </div>
                                                <input name="dateTo" class="form-control" placeholder="Full name"
                                                    type="date">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-1">
                                        <button class="btn btn-primary" type="submit"> <i class="fa-solid fa-stamp"></i>
                                            Terapkan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <form action="{{ route('cari_servisan') }}" method="get">
                                    <div class="input-group input-group-lg">
                                        <input type="search" name="search" class="form-control"
                                            value="{{ $keyword }}" placeholder="Silahkan Cari Disini">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-secondary">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card-body table-wrap">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="10px">No</th>
                                        <th>KD Transaksi</th>
                                        <th>Nama Kostumer</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Kerusakan</th>
                                        <th>Biaya</th>
                                        <th>Tgl Masuk</th>
                                        <th>Tgl Selesai</th>
                                        <th>Kategori Kerusakan</th>
                                        <th width="1000px">Estimasi Kerja</th>
                                        <th>Status</th>
                                        <th>Status Servisan</th>


                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $no => $v)
                                        <tr>
                                            <td widtd="10px">{{ ++$no }}</td>

                                            <td widtd="10px">{{ $v->kd_transaksi }}</td>
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

                                            <td width="13%">
                                                @if ($v->status_servisan == 1)
                                                    </button></a> <a
                                                        onclick="return confirm('anda yakin servisan Atas NAMA : {{ $v->nama_costumer }} telah selesai?')"
                                                        href="{{ route('selesaikan', $v->id) }}" class="delete-confirm">
                                                        <button class="btn btn-info btn-xs" id="add">
                                                            <i class="fa fa-check-circle"></i>
                                                @endif
                                                </button>

                                                @if ($v->status_servisan == 0)
                                                    </button></a> <a
                                                        onclick="return confirm('anda yakin servisan Atas NAMA : {{ $v->nama_costumer }} sedang dikerja?')"
                                                        href="{{ route('dikerjakan', $v->id) }}" class="delete-confirm">
                                                        <button class="btn btn-primary btn-xs" id="add">
                                                            <i class="fa fa-hourglass-end"></i>
                                                @endif
                                                </button>

                                                @if ($v->status_servisan == 1)
                                                    {{-- </button></a> <a
                                                        onclick="return confirm('anda yakin ingin klaim Garansi Atas NAMA : {{ $v->nama_costumer }}')"
                                                        href="{{ route('garansi', $v->id) }}" class="delete-confirm">
                                                        <button class="btn btn-dark btn-xs" id="add">
                                                            <i class="fa fa-sync-alt"></i>

                                                        </button> --}}
                                                @endif


                                                @if ($v->status_servisan == 2)
                                                    {{-- </button></a> <a
                                                        onclick="return confirm('anda yakin klaim Garansi Atas NAMA : {{ $v->nama_costumer }} telah selesai ??') "
                                                        href="{{ route('selesai_garansi', $v->id) }}"
                                                        class="delete-confirm">
                                                        <button class="btn btn-warning btn-xs" id="add">
                                                            <i class="fa fa-check-circle"></i>
                                                        </button>
                                                    </a>
                                                    {{-- @endif
                                            
                                        @if ($v->status_servisan == 1)  --}}
                                                @endif
                                                </button></a> <a
                                                    onclick="return confirm('Cetak Struk Atas NAMA : {{ $v->nama_costumer }}??') "
                                                    href="{{ route('print', $v->id) }}" class="delete-confirm"
                                                    target="blank">
                                                    <button class="btn btn-dark btn-xs" id="add">
                                                        <i class="fa fa-print"></i>
                                                    </button>
                                                    @if ($v->status < 1)
                                                        </button>
                                                </a> <a
                                                    onclick="return confirm('Pembayaran Atas Nama : {{ $v->nama_costumer }} Sudah Dilakukan??') "
                                                    href="{{ route('bayar', $v->id) }}" class="delete-confirm">
                                                    <button class="btn btn-danger btn-xs" id="add">
                                                        <i class="fas fa-money-bill-wave-alt"></i>
                                                    </button>
                                    @endif

                                    </td>

                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            {{-- {{ $data->links() }} --}}

                        </div>


                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->

            </div>
        </div>
        <!-- /.row -->
    </section>
    {{-- {{ $data->render() }} --}}
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/countdown/jquery.countdown.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>

<!-- countdown timer jagoankode.blogspot.com  -->

<!-- Adding JavaScript code -->
{{-- <script>
        
    $(document).ready(function(){
    setInterval(function(){
        $.ajax({
            url: '/show-servisan', // URL of the server-side script
            success: function(data) {
                $('#my_div').html(data); // Update the content of the DIV element
            }
        });
    }, 5000); // Refresh the content every 5 seconds
});

        </script> --}}



<!--javascript-->

{{-- 
<script>
    // Converting string to required date format
    let deadline = new Date("{{$get}}")
                    .getTime();

    // To call defined fuction every second
    let x = setInterval(function () {
         
        // Getting current time in required format
        let now = new Date("{{$getDateTime}}").getTime();

        // Calculating the difference
        let t = deadline - now;

        // Getting value of days, hours, minutes, seconds
        let days = Math.floor(t / (1000 * 60 * 60 * 24));
        let hours = Math.floor(
            (t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor(
            (t % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor(
            (t % (1000 * 60)) / 1000);

        // Output the remaining time
        document.getElementById("demo").innerHTML =
            days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        // Output for over time
        if (t < 0) {
            clearInterval(x);
            document.getElementById("demo")
                    .innerHTML = "EXPIRED";
        }
    }, 1000);
</script> --}}



<script>
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
