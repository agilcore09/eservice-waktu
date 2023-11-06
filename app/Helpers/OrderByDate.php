<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class OrderHelper
{

    public static function bubbleSort($array)
    {
        $n = count($array);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($array[$j]->estimasi < $array[$j + 1]->estimasi) {
                    // Tukar elemen jika elemen saat ini lebih kecil dari elemen berikutnya
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
        return $array;
    }

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

    public static function bubbleSortSelesai($array)
    {
        $n = count($array);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($array[$j]->updated_at < $array[$j + 1]->updated_at) {
                    // Tukar elemen jika elemen saat ini lebih kecil dari elemen berikutnya
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
        return $array;
    }
}
