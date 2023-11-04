<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class OrderHelper
{

    public $table;
    public $datein;
    public $dateto;

    public function __construct($table, $dateIn, $dateTo)
    {
        $this->table = $table;
        $this->datein = $dateIn;
        $this->dateto = $dateTo;
    }

    public function ByDate()
    {
        $data = DB::table($this->table)->whereBetween('tgl_masuk', [$this->dateto, $this->datein])->get();
        return $data;
    }
}
