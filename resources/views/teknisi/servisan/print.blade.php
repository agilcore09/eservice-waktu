
<html>
<head>
</head>
<body>

    <p>Nota Pembelian || <b> Tanggal Cetak {{Carbon\Carbon::now()}}</b> || Gadget Care<b></p>
        <table>
                <thead>
                    <tr>
                    
                    </tr>
                    
                </thead>
                
                <tbody>
                <tr>
                    
                        <td>
                                <img src="AdminLTE/dist/img/gcare.jpg" width="50px" >

                        </td>

                </tr>
                </tbody>
        </table>
    <hr>
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Servisan</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($servisanq as $no => $v)
        <tr>
            <td>{{++$no}}</td>
            <td>{{$v->kd_transaksi}}</td>
            <td align="center">{{$v->kerusakan}}</td>
            <td align="right">Rp. {{ number_format($v->biaya)}}</td>
        </tr>
        @endforeach

       

        <tbody>
    </table>
        <p>
    <b>Teknisi :{{session()->get('nama')}} || NO Tenan: {{session()->get('no')}}

        </p><br><br><br>
        <p>Hormat Kami</p>
</body>
<html>
