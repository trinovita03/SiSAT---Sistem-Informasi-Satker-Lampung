<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kementerian;
use App\Models\Wilayah;
use App\Models\Satker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Kementerian
        $kemenkeu = Kementerian::create([
            'kode_kementerian' => '015', 
            'nama_kementerian' => 'Kementerian Keuangan'
        ]);
        
        $kemenag = Kementerian::create([
            'kode_kementerian' => '025', 
            'nama_kementerian' => 'Kementerian Agama'
        ]);

        // 2. Buat Data Wilayah
        $lampung = Wilayah::create([
            'kode_wilayah' => '18', 
            'nama_wilayah' => 'Provinsi Lampung'
        ]);

        // 3. Buat Data Satker
        Satker::create([
            'kementerian_id' => $kemenkeu->id,
            'wilayah_id' => $lampung->id,
            'kode_satker' => '415123',
            'nama_satker' => 'Kanwil DJPb Provinsi Lampung',
            'pagu_anggaran' => 15000000000.00,
            'realisasi' => 7500000000.00,
        ]);

        Satker::create([
            'kementerian_id' => $kemenag->id,
            'wilayah_id' => $lampung->id,
            'kode_satker' => '415999',
            'nama_satker' => 'Kanwil Kemenag Provinsi Lampung',
            'pagu_anggaran' => 8000000000.00,
            'realisasi' => 6000000000.00,
        ]);
    }
}