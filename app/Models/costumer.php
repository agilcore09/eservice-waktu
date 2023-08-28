<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class costumer extends Model
{

    protected $table = "costumer";
    protected $casts = ['estimasi' => 'datetime'];
    // protected $primarykey="id";
    protected $fillable = [
        'id',
        'id_teknisi',
        'kd_transaksi',
        'nama_costumer',
        'alamat',
        'no_hp',
        'biaya',
        'kerusakan',
        'kategori',

        'estimasi' => 'date:hh:mm',

        'tgl_masuk',
        'tgl_selesai',
        'status',
        'status_servisan',

    ];
    public function teknisi()
    {

        return $this->belongsTo('App\models\teknisi', 'id_teknisi', 'id');
    }
}
