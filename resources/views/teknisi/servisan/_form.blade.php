@csrf

<div class="card-body">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Kd Transaksi</label>
                <input type="text" value="{{ $nomor }}" class="form-control" name="kd_transaksi" readonly
                    class="form-control" autocomplete="off" required />
            </div>
        </div>



        <div class="col-sm-6">
            <div class="form-group">
                <label>Nama Kostumer</label>
                <input type="text" class="form-control" name="nama_costumer" class="form-control" autocomplete="off"
                    value="{{ isset($data->username) ? $data->username : null }}" required />
            </div>
        </div>


        <div class="col-sm-6">
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" class="form-control" autocomplete="off"
                    value=""" required />
            </div>
        </div>

        <div class=" col-sm-6">
            <div class="form-group">
                <label>No HP</label>
                <input type="number" class="form-control" name="no_hp" class="form-control" autocomplete="off"
                    value="" required />
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label>Biaya</label>
                <input type="number" width="10px" class="form-control" name="biaya" class="form-control"
                    autocomplete="off" value="" required />
            </div>
        </div>



        <div class="col-sm-3">
            <div class="form-group">
                <label>Kerusakan</label>
                <select class="form-control" name="kerusakan">
                    @foreach ($data as $v)
                        <option value="{{ $v->kerusakan }}">{{ $v->kerusakan }}</option>
                        {{-- <option value="Tombol Rusak">Tombol Rusak</option> --}}
                        {{-- <option value="Tombol Volume Rusak">Tombol Volume Rusak</option>
                        <option value="Wifi Tidak Berfungsi">Wifi Tidak Berfungsi</option>
                        <option value="GPS Tidak Berfungsi">GPS Tidak Berfungsi</option>
                        <option value="Notifikasi Tidak Muncul">Notifikasi Tidak Muncul</option>
                        <option value="Batrei Sulit Terisi">Batrei Sulit Terisi</option>
                        <option value="Batrei Cepat Habis">Batrei Cepat Habis</option>
                        <option value="Sinyal Hilang">Sinyal Hilang</option>
                        <option value="Ganti Casing">Ganti Casing</option>
                        <option value="Insert Sim">Insert Sim</option>
                        <option value="LCD Bergaris">LCD Bergaris</option>
                        <option value="HP Restart Sendiri">HP Restart Sendiri</option>
                        <option value="Hp Sering Panas">HP Sering Panas</option>
                        <option value="Hp Kemasukan Air">HP Kemasukan Air</option>
                        <option value="layar Sentu Tidak Responsif">layar Sentu Tidak Responsif</option>
                        <option value="Google Play Tiba-tiba Berhenti">Google Play Tiba-tiba Berhenti</option>
                        <option value="HP Mati Total">HP Mati Tota</option>
                        <option value="Bootloop">Bootloop</option>
                        <option value="Kerusakan LCD">Kerusakan LCD</option>
                        <option value="Kerusakan Keypad">Kerusakan Keypad/option>
                        <option value="Kerusakan Lainnya">Kerusakan Lainnya/option> --}}
                    @endforeach

                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="0">Belum Lunas</option>
                    <option value="1">Lunas</option>
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Kategori Kerusakan</label>
                <select class="form-control" name="kategori">
                    <option value="Ringan">Ringan</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Berat">Berat</option>
                </select>
            </div>
        </div>

        {{-- <div class="col-sm-3">
                <div class="form-group">
                    <label>Estimasi Kerja Jam</label>
                    <input type="text" class="form-control" name="jam" class="form-control" autocomplete="off"
                        value="" />
                </div>
            </div>


            <div class="col-sm-3">
                <div class="form-group">
                    <label>Estimasi Kerja Hari</label>
                    <input type="text" class="form-control" name="hari" class="form-control" autocomplete="off"
                        value="" />
                </div>
            </div> --}}

        <div class="col-sm-3">
            <label>Estimasi Selesai</label>
            {{-- <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" name="estimasi"
                    data-target="#reservationdatetime" />
                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div> --}}
            <div class="input-group date" id="id_0">
                <input type="text" value="" class="form-control" name="estimasi"
                    placeholder="MM/DD/YYYY HH:mm:ss" required />
            </div>
        </div>




    </div>
</div>
