<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class PertanianSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $kementerian = Kementerian::updateOrCreate(
            ['kode_kementerian' => '026'],
            ['nama_kementerian' => 'Kementerian Pertanian']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '129115', 'nama_satker' => 'DINAS PETERNAKAN DAN KESEHATAN HEWAN PROVINSI LAMPUNG'],
            ['kode_satker' => '237856', 'nama_satker' => 'BALAI VETERINER LAMPUNG'],
            ['kode_satker' => '567517', 'nama_satker' => 'BALAI BESAR PENERAPAN MODERNISASI PERTANIAN LAMPUNG'],
            ['kode_satker' => '120040', 'nama_satker' => 'BALAI PELATIHAN PERTANIAN LAMPUNG'],
            ['kode_satker' => '415799', 'nama_satker' => 'BALAI KEKARANTINAAN KESEHATAN KELAS I PANJANG'],
            ['kode_satker' => '690878', 'nama_satker' => 'BALAI KARANTINA HEWAN, IKAN, DAN TUMBUHAN LAMPUNG'],
        ];

        foreach ($satkers as $data) {
            Satker::updateOrCreate(
                ['kode_satker' => $data['kode_satker']],
                [
                    'kementerian_id' => $kementerian->id,
                    'wilayah_id' => $wilayah->id,
                    'nama_satker' => $data['nama_satker'],
                    'kppn' => 'KPPN Bandar Lampung',
                    'pagu_anggaran' => 0,
                    'realisasi' => 0,
                ]
            );
        }
    }
}
