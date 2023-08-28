<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeknisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teknisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_teknisi');
            $table->string('username');
            $table->double('no_hp');
            $table->string('password');
            $table->double('no_tenan');
            // $table->date('tgl_pinjam');
            // $table->date('tgl_kembali')->nullable();;
            // $table->string('jaminan');
            // $table->double('jumlah_pinjaman');
            // $table->double('bayar_perbulan');
            // $table->double('bunga');
            // $table->double('tenor');
            // $table->enum('status',['1','0'])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teknisi');
    }
}
