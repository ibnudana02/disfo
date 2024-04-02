<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function index()
    {
        $this->data['title'] = 'Dashboard';
        $this->data['countUser'] = count($this->user_m->findAll());
        $this->data['countProduk'] = count($this->produk_m->findAll());
        echo view('dashboard', $this->data);
    }

    public function display()
    {
        $this->data['title'] = 'Display Information';
        $baghas = $this->Basil_m->getBaghas(date('Y-m-d'));
        $this->data['baghas'] = $baghas;
        $api_jadwal = json_decode($this->getJadwalSholat(date('Y-m-d')));
        $object = $api_jadwal->data->jadwal;
        if ($api_jadwal->status) {
            $this->data['jadwalSholat'] = true;
            $this->data['lokasi'] = $api_jadwal->data->lokasi;
            $this->data['tglJadwal'] = $object->tanggal;
            $waktu = [
                ['sholat' => 'subuh', 'waktu' => $object->subuh, 'warna' => 'bg-purple'],
                ['sholat' => 'syuruq', 'waktu' => $object->terbit, 'warna' => 'bg-teal'],
                ['sholat' => 'dzuhur', 'waktu' => $object->dzuhur, 'warna' => 'bg-warning'],
                ['sholat' => 'ashar', 'waktu' => $object->ashar, 'warna' => 'bg-info'],
                ['sholat' => 'maghrib', 'waktu' => $object->maghrib, 'warna' => 'bg-maroon'],
                ['sholat' => 'isya', 'waktu' => $object->isya, 'warna' => 'bg-gray-dark'],
            ];
            $this->data['waktu'] = $waktu;
        } else {
            $this->data['jadwalSholat'] = false;
        }
        echo view('display_lte', $this->data);
    }

    public function displayNew()
    {
        $this->data['title'] = 'Display Information';
        $updatedBaghas = $this->Basil_m->getBaghas(date('Y-m-d'));
        $oldBaghas = $this->Basil_m->getBaghas(date('Y-m-d', strtotime('-1 month')));
        $baghas = ($updatedBaghas) ? $updatedBaghas : $oldBaghas;
        $this->data['baghas'] = $baghas;
        $api_jadwal = json_decode($this->apiJadwal());
        $jadwal = $api_jadwal->data->timings;
        if ($api_jadwal->status) {
            $this->data['jadwalSholat'] = true;
            $waktu = [
                ['sholat' => 'subuh', 'waktu' => $jadwal->Fajr, 'warna' => 'bg-purple'],
                ['sholat' => 'syuruq', 'waktu' => $jadwal->Sunrise, 'warna' => 'bg-teal'],
                ['sholat' => 'dzuhur', 'waktu' => $jadwal->Dhuhr, 'warna' => 'bg-warning'],
                ['sholat' => 'ashar', 'waktu' => $jadwal->Asr, 'warna' => 'bg-info'],
                ['sholat' => 'maghrib', 'waktu' => $jadwal->Maghrib, 'warna' => 'bg-maroon'],
                ['sholat' => 'isya', 'waktu' => $jadwal->Isha, 'warna' => 'bg-gray-dark'],
            ];
            $this->data['waktu'] = $waktu;
        } else {
            $this->data['jadwalSholat'] = false;
        }
        echo view('display_lte', $this->data);
    }

    public function getJadwalSholat($date)
    {
        $tahun = date('Y', strtotime($date));
        $bulan = date('m', strtotime($date));
        $tgl = date('d', strtotime($date));
        $api = $this->data['app']->api_jadwal_sholat;
        $url = "$api/$tahun/$bulan/$tgl";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$url",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function apiJadwal()
    {
        $api = $this->data['app']->api_jadwal_sholat;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$api",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function test()
    {
        $file = base_url('adhan.json');
        $adhan = file_get_contents($file);
        $aladhan = json_decode($adhan);
        $jadwal = $aladhan->data->timings;
        echo "Shubuh : " . $jadwal->Fajr . " WIB</br>";
        echo "Dzuhur : " . $jadwal->Dhuhr . " WIB</br>";
        echo "Ashar : " . $jadwal->Asr . " WIB</br>";
        echo "Maghrib : " . $jadwal->Maghrib . " WIB</br>";
        echo "Isya : " . $jadwal->Isha . " WIB</br>";
    }
}
