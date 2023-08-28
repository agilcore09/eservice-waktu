<html>

<head>
</head>

<body>

    <p>Laporan || <b> Tanggal Cetak {{Carbon\Carbon::now()}}</b> || Gadget Care<b></p>
    <table>
        <thead>
            <tr>

            </tr>

        </thead>

        <tbody>
            <tr>

                <td>


                </td>

            </tr>
        </tbody>
    </table>
    <hr>
    <table border="1" cellspacing="0">
        <thead>
            <tr style="background-color:#eeff00">
                <th>No</th>
                <th>Id Teknisi</th>
                <th width="120px">Kode Transaksi</th>
                <th>Nama Costumer</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Biaya</th>
                <th>Kerusakan</th>
                <th>Tgl Masuk</th>
                <th>Tgl Selesai</th>
                <th>Status</th>
                <th>Status Servisan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cos as $no => $v)
            <tr>
                <td>{{++$no}}</td>
                <td>{{$v->id_teknisi}}</td>
                <td>{{$v->kd_transaksi}}</td>
                <td>{{$v->nama_costumer}}</td>
                <td>{{$v->alamat}}</td>
                <td>{{$v->no_hp}}</td>
                <td>Rp. {{ number_format($v->biaya)}}</td>
                <td>{{$v->kerusakan}}</td>
                <td>{{$v->tgl_masuk}}</td>
                <td>{{$v->tgl_selesai}}</td>
                <td> @if($v->status == 0)
                    Belum Bayar
                    @elseif($v->status == 1)
                    Sudah Bayar
                    @endif
                </td>
                <td>
                    @if($v->status_servisan == 0)
                    <div class="d-flex align-items-center">
                        <strong>Dikerja</strong>
                        <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                    </div>
                    @elseif($v->status_servisan == 1 )
                    Selesai
                    @elseif ($v->status_servisan == 2)
                    garansi diklaim
                    @elseif ($v->status_servisan == 3)
                    garansi telah selesai
                    @endif
                </td>
               
            </tr>
            @endforeach



        <tbody>
    </table>
   
    <p>Hormat Kami</p>
</body>
<html>