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
                            <p class="card-text">Status Servisan :
                                @if ($v->status_servisan == 0)
                                    <?php echo 'Menunggu'; ?>
                                @elseif($v->status_servisan == 1)
                                    <?php echo 'Di kerja'; ?>
                                @elseif($v->status_servisan == 4)
                                    <?php echo 'Selesai'; ?>
                                @endif
                            </p>
                            <p class="card-text">Pembayaran :
                                @if ($v->status == 0)
                                    <?php echo 'Belum Lunas'; ?>
                                @elseif($v->status == 1)
                                    <?php echo 'Telah Lunas'; ?>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
