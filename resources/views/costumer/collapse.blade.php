<style>
    /**
 *	This element is created inside your target element
 *	It is used so that your own element will not need to be altered
 **/
.time_circles {
    position: relative !important;
    width: 200px !important;
    height: 200px !important;
}

/**
 *	This is all the elements used to house all text used
 * in time circles
 **/
.time_circles > div {
    position: absolute !important;
    text-align: center !important;
}

/**
 *	Titles (Days, Hours, etc)
 **/
.time_circles > div > h4 {
    margin: 0 !important;
    padding: 0 !important;
    text-align: center !important;
    text-transform: uppercase !important;
    font-family: 'Century Gothic', Arial !important;
    line-height: 1 !important;
}

/**
 *	Time numbers, ie: 12
 **/
.time_circles > div > span {
    margin: 0 !important;
    padding: 0 !important;
    display: block !important;
    width: 100% !important;
    text-align: center !important;
    font-family: 'Century Gothic', Arial !important;
    line-height: 1 !important;
    font-weight: bold !important;
}

</style>

<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#cek">History Servisan</button>


<div id="cek" class="collapse table-wrap" style="margin-top: 20px;">
    <table id="example2" class="table table-bordered">
        <thead>
            <tr>
                <th width="10px">No</th>
                <th>ID Transaksi</th>
                <th>Nama Kostumer</th>
                <th>Servisan</th>
                <th>Biaya</th>
                <th width="1000px">Estimasi</th>
                <th>Status Servisan</th>
                <th>Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ambildata as $no => $v)
                <tr>
                    <td widtd="10px">{{ ++$no }}</td>
                    <td>{{ $v->kd_transaksi }}</td>
                    <td>{{ $v->nama_costumer }}</td>
                    <td>{{ $v->kerusakan }}</td>
                    <td>Rp.{{ number_format($v->biaya) }}</td>
                    {{-- estimasi --}}
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
                              echo "hari $a jam $b menit $c detik $d";
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
                               echo "hari $a jam $b menit $c detik $d";
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
                                 echo "hari $a jam $b menit $c detik $d";
                            }
                            ?>
                        @endif

                    </td>
                    {{-- end estimasi --}}
                    <td>
                        @if ($v->status_servisan == 0)
                            <div class="d-flex align-items-center">
                                <small class="mr-2">Menunggu</small>
                                <small class="spinner-border ml-auto" role="status" aria-hidden="true"
                                    style="width:10px; height: 10px;"></small>
                            </div>
                        @elseif($v->status_servisan == 1)
                            <a href="#" class="badge badge-success"> Di Kerja</a>
                        @elseif ($v->status_servisan == 2)
                            <a href="#" class="badge badge-warning">garansi diklaim</a>
                        @elseif ($v->status_servisan == 3)
                            <a href="#" class="badge badge-info">garansi telah selesai</a>
                        @elseif ($v->status_servisan == 4)
                            <a href="#" class="badge badge-info">Selesai</a>
                        @endif
                    </td>
                    <td>
                        @if ($v->status == 0)
                            <span class="badge badge-danger">Belum Bayar</span>
                        @elseif($v->status == 1)
                            <span class="badge badge-primary">Sudah Bayar</span>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
