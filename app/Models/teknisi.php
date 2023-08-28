<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teknisi extends Model
{
    protected $table = "teknisi";
    // protected $primarykey="id";
    protected $fillable = [
        'id',
        'nama_teknisi',
        'username',
        'no_hp',
        'password',
        'no_tenan'
    ];
    public function costumer()
    {

        return $this->hasMany('App\models\costumer', 'id_teknisi', 'id');
    }
}
