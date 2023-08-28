<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kerusakan extends Model
{
    protected $table = "kerusakan";
    protected $fillable = [
        'id',
        'kerusakan',
        'biaya'
    ];
}
