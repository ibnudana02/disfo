<?php

if (!function_exists('flash_success')) {
    function flash_success($response)
    {
        // $session = \Config\Services::session();
        $session = session();
        return $session->setFlashdata("message", "<script type='text/javascript'>
        Swal.fire({
            title: {$response['title']}',
            text: {$response['desc']},
            icon: {$response['icon']},
            showCancelButton: false,
            });
            </script>");
    }
}

function fullnominal($nominal)
{
    return "Rp " . number_format($nominal, 0, '.', ',') . ",-";
}

function nominal_rp($nominal)
{
    return "Rp " . number_format($nominal, 0, '.', ',');
}

function nominal($nominal)
{
    return number_format($nominal, 0, '.', ',');
}

function rupiah($terbilang)
{
    return terbilang($terbilang) . " rupiah";
}

function terbilang($angka)
{
    $arr = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
    if ($angka < 1) {
        return "nol";
    } else {
        # code...
        if ($angka < 12)
            return " " . $arr[$angka];
        elseif ($angka < 20)
            return terbilang($angka - 10) . " belas";
        elseif ($angka < 100)
            return terbilang($angka / 10) . " puluh" . terbilang($angka % 10);
        elseif ($angka < 200)
            return "seratus" . terbilang($angka - 100);
        elseif ($angka < 1000)
            return terbilang($angka / 100) . " ratus" . terbilang($angka % 100);
        elseif ($angka < 2000)
            return "seribu" . terbilang($angka - 1000);
        elseif ($angka < 1000000)
            return terbilang($angka / 1000) . " ribu" . terbilang($angka % 1000);
        elseif ($angka < 1000000000)
            return terbilang($angka / 1000000) . " juta" . terbilang($angka % 1000000);
    }
}

if (!function_exists('bulan')) {
    function bulan()
    {
        $bulan = Date('m');
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;

            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}

/**
 * Fungsi untuk membuat tanggal dalam format bahasa indonesia
 * @param void
 * @return string format tanggal sekarang (contoh: 22 Desember 2016)
 */
if (!function_exists('tanggal')) {
    function tanggal()
    {
        $tanggal = Date('d') . " " . bulan() . " " . Date('Y');
        return $tanggal;
    }
}

if (!function_exists('toHijriah')) {
    function toHijriah($tanggal)
    {
        $array_month = array("Muharram", "Safar", "Rabiul Awwal", "Rabiul Akhir", "Jumadil Awwal", "Jumadil Akhir", "Rajab", "Sya'ban", "Ramadhan", "Syawwal", "Zulqaidah", "Zulhijjah");

        $date = intval(substr($tanggal, 8, 2));
        $month = intval(substr($tanggal, 5, 2));
        $year = intval(substr($tanggal, 0, 4));

        if (($year > 1582) || (($year == "1582") && ($month > 10)) || (($year == "1582") && ($month == "10") && ($date > 14))) {
            $jd = intval((1461 * ($year + 4800 + intval(($month - 14) / 12))) / 4) +
                intval((367 * ($month - 2 - 12 * (intval(($month - 14) / 12)))) / 12) -
                intval((3 * (intval(($year + 4900 + intval(($month - 14) / 12)) / 100))) / 4) +
                $date - 32075;
        } else {
            $jd = 367 * $year - intval((7 * ($year + 5001 + intval(($month - 9) / 7))) / 4) +
                intval((275 * $month) / 9) + $date + 1729777;
        }

        $wd = $jd % 7;
        $l  = $jd - 1948440 + 10632;
        $n  = intval(($l - 1) / 10631);
        $l  = $l - 10631 * $n + 354;
        $z  = (intval((10985 - $l) / 5316)) * (intval((50 * $l) / 17719)) + (intval($l / 5670)) * (intval((43 * $l) / 15238));
        $l  = $l - (intval((30 - $z) / 15)) * (intval((17719 * $z) / 50)) - (intval($z / 16)) * (intval((15238 * $z) / 43)) + 29;
        $m  = intval((24 * $l) / 709);
        $d  = $l - intval((709 * $m) / 24);
        $y  = 30 * $n + $z - 30;
        $g  = $m - 1;

        $hijriah = "$d $array_month[$g] $y H";

        return $hijriah;
    }
}

if (!function_exists('getRomawi')) {
    function getRomawi($bln)
    {
        switch ($bln) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }
}

if (!function_exists('date_indo')) {
    function date_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = bulan_indo($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
        // return $tgl;
        // return $bulan;
    }
}

if (!function_exists('bulan_indo')) {
    function bulan_indo($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

//Format Shortdate
if (!function_exists('shortdate_indo')) {
    function shortdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = short_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . '/' . $bulan . '/' . $tahun;
    }
}

if (!function_exists('short_bulan')) {
    function short_bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "01";
                break;
            case 2:
                return "02";
                break;
            case 3:
                return "03";
                break;
            case 4:
                return "04";
                break;
            case 5:
                return "05";
                break;
            case 6:
                return "06";
                break;
            case 7:
                return "07";
                break;
            case 8:
                return "08";
                break;
            case 9:
                return "09";
                break;
            case 10:
                return "10";
                break;
            case 11:
                return "11";
                break;
            case 12:
                return "12";
                break;
        }
    }
}

//Format Medium date
if (!function_exists('mediumdate_indo')) {
    function mediumdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = medium_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . '-' . $bulan . '-' . $tahun;
    }
}

if (!function_exists('medium_bulan')) {
    function medium_bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Ags";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
}

//Long date indo Format
if (!function_exists('longdate_indo')) {
    function longdate_indo($tanggal)
    {
        $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];
        $bulan = bulan($pecah[1]);

        $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
        $nama_hari = "";
        if ($nama == "Sunday") {
            $nama_hari = "Minggu";
        } else if ($nama == "Monday") {
            $nama_hari = "Senin";
        } else if ($nama == "Tuesday") {
            $nama_hari = "Selasa";
        } else if ($nama == "Wednesday") {
            $nama_hari = "Rabu";
        } else if ($nama == "Thursday") {
            $nama_hari = "Kamis";
        } else if ($nama == "Friday") {
            $nama_hari = "Jumat";
        } else if ($nama == "Saturday") {
            $nama_hari = "Sabtu";
        }
        return $tgl . ' ' . $bulan . ' ' . $thn;
    }
}

if (!function_exists('hari_indo')) {
    function hari_indo($tanggal)
    {
        $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];

        $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
        if ($nama == "Sunday") {
            $nama_hari = "Minggu";
        } else if ($nama == "Monday") {
            $nama_hari = "Senin";
        } else if ($nama == "Tuesday") {
            $nama_hari = "Selasa";
        } else if ($nama == "Wednesday") {
            $nama_hari = "Rabu";
        } else if ($nama == "Thursday") {
            $nama_hari = "Kamis";
        } else if ($nama == "Friday") {
            $nama_hari = "Jumat";
        } else if ($nama == "Saturday") {
            $nama_hari = "Sabtu";
        }
        return $nama_hari;
    }
}

if (!function_exists('formatsp3')) {
    function formatsp3($no, $tgl)
    {
        $nosp3 = $no . "/SP3-PBY/HSN/" . getRomawi(date('m', strtotime($tgl))) . "/" . date('y', strtotime($tgl));
        return $nosp3;
    }
}

if (!function_exists('formatakad')) {
    function formatakad($no, $tgl, $kdprd)
    {
        $db = db_connect();
        $builder = $db->table('produk');
        $produk = $builder->where('kdprd', $kdprd)->get()->getRow('singkat');

        $noakad = $no . "/PBY-$produk/HSN/" . getRomawi(date('m', strtotime($tgl))) . "/" . date('y', strtotime($tgl));
        return $noakad;
    }
}
