<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostumerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumer', function (Blueprint $table) {
            $table->id();
            $table->string('id_teknisi');
            $table->string('kd_transaksi');
            $table->string('nama_costumer');
            $table->string('alamat');
            $table->string('no_hp');
            $table->double('biaya');
            $table->string('kerusakan');
            $table->string('kategori');
            $table->timestamp('estimasi')->nullable();

            // $table->string('lama_servis_hari')->nullable();
            $table->DateTime('tgl_masuk');
            $table->DateTime('tgl_selesai')->nullable();
            $table->string('status');
            $table->string('status_servisan');
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
        Schema::dropIfExists('costumer');
    }
}
