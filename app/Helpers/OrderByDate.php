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
            ->where('status_servisan', 0)
            ->orWhere('status_servisan', 1)
            ->orWhere('status_servisan', 2)
            ->whereBetween('tgl_masuk', [$dateIn, $dateTo])
            ->orderBy('tgl_masuk', 'DESC')
            ->get();

        return $data;
    }

    public static function orderDateClear($dateIn, $dateTo, $session)
    {
        $data = DB::table('costumer')->where('status_servisan', 4)
            ->whereBetween('tgl_masuk', [$dateIn, $dateTo])
            ->where('id_teknisi', $session)
            ->orderby("updated_at", "ASC")
            ->get();



        return $data;
    }
}
