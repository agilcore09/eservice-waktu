@extends('teknisi.layouts.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mt-5">Data Sort</h2>

        </div>
    </div>
    <div class="container-fluid p-5">
        <div class="row">
            @foreach ($data as $v)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem; background-color: #007bff;">
                        <div class="card-body text-light">
                            <h5 class="card-title text-light" style="border-bottom: 1px solid white;">Data Transaksi</h5>
                            <hr>
                            <p class="card-text">ID : {{ $v->id }} </p>
                            <p class="card-text">Kode Transaksi : {{ $v->kd_transaksi }} </p>
                            <p class="card-text">Nama Customer : {{ $v->nama_costumer }} </p>
                            <p class="card-text">Servisan : {{ $v->kerusakan }} </p>
                            <p class="card-text">Biaya : Rp.{{ $v->biaya }}</p>
                            <p class="card-text">Estimasi Servisan :
                                @if ($v->status_servisan == 0)
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
                                        echo $a . 'hari. ' . $b . ' jam. ' . $c . ' menit ' . $d . ' detik';
                                    }
                                    
                                    //    echo "Waktu saat ini: ".date("d-m-Y H:i:s")."<br>";
                                    
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
                                        echo $a . 'hari. ' . $b . ' jam. ' . $c . ' menit ' . $d . ' detik';
                                    }
                                    
                                    //    echo "Waktu saat ini: ".date("d-m-Y H:i:s")."<br>";
                                    
                                    ?>

                                    {{-- end test --}}
                                @elseif($v->status_servisan == 4)
                                    <?= 'Selesai' ?>
                                @endif
                            </p>
                            <p class="card-text">Status :
                                <?php
                                if ($v->status_servisan == 0) {
                                    echo 'Menunggu';
                                } elseif ($v->status_servisan == 1) {
                                    echo 'Di kerja';
                                } elseif ($v->status_servisan == 4) {
                                    echo 'Selesai';
                                }
                                
                                ?>

                            </p>
                            <p class="card-text">Pembayaran :
                                @if ($v->status == 0)
                                    <?= 'Belum Lunas' ?>
                                @elseif($v->status == 1)
                                    <?= 'Telah Lunas' ?>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
