<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class OrderHelper
{

    public static function orderDate($dateIn, $dateTo, $session)
    {
        $data = DB::table('costumer')
            ->whereBetween('tgl_masuk', [$dateIn, $dateTo])
            ->where('id_teknisi', $session)
            ->get();

        return $data;
    }

    public static function orderDateClear($dateIn, $dateTo, $session)
    {
        $data = DB::table('costumer')->where('status_servisan', 4)
            ->whereBetween('tgl_masuk', [$dateIn, $dateTo])
            ->orderby("updated_at", "ASC")
            ->where('id_teknisi', $session)
            ->get();

        return $data;
    }
}
