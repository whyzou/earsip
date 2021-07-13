<?php

define('TANGGAL_AWAL_TAHUN', date('Y-01-01'));
define('TANGGAL_AKHIR_TAHUN', date('Y-12-31'));


function tanggal_indonesia($tanggal = '0000-00-00')
{
    if (isset($tanggal)) {
        $tanggalArray = explode('-', $tanggal);
        switch ($tanggalArray[1]) {
            case '01':
                $bulan = "Januari";
                break;
            case '02':
                $bulan = "Februari";
                break;
            case '03':
                $bulan = "Maret";
                break;
            case '04':
                $bulan = "April";
                break;
            case '05':
                $bulan = "Mei";
                break;
            case '06':
                $bulan = "Juni";
                break;
            case '07':
                $bulan = "Juli";
                break;
            case '08':
                $bulan = "Agustus";
                break;
            case '09':
                $bulan = "September";
                break;
            case '10':
                $bulan = "Oktober";
                break;
            case '11':
                $bulan = "November";
                break;
            case '12':
                $bulan = "Desember";
                break;
            default:
                $bulan = "";
        }

        if ($tanggalArray[0] == '0000') $tanggalArray[0] = '';
        if ($tanggalArray[2] == '00') $tanggalArray[2] = '';

        return $tanggalArray[2] . ' ' . $bulan . ' ' . $tanggalArray[0];
    }
}
