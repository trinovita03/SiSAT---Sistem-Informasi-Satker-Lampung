<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class PendidikanSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $kementerian = Kementerian::updateOrCreate(
            ['kode_kementerian' => '036'],
            ['nama_kementerian' => 'Kementerian Pendidikan Tinggi, Sains, dan Teknologi']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '693348', 'nama_satker' => 'BALAI GTK PROVINSI LAMPUNG'],
            ['kode_satker' => '693244', 'nama_satker' => 'BPMP PROVINSI LAMPUNG'],
            ['kode_satker' => '693286', 'nama_satker' => 'BALAI BAHASA LAMPUNG'],
            ['kode_satker' => '693379', 'nama_satker' => 'UNIVERSITAS LAMPUNG'],
            ['kode_satker' => '693402', 'nama_satker' => 'INSTITUT TEKNOLOGI SUMATERA'],
            ['kode_satker' => '693467', 'nama_satker' => 'POLITEKNIK NEGERI LAMPUNG'],
        ];

        $kppnBandarLampung = array_fill_keys([
            '693348', '693244', '693286', '693379', '693402', '693467',
        ], 'KPPN Bandar Lampung');

        foreach ($satkers as $data) {
            Satker::updateOrCreate(
                ['kode_satker' => $data['kode_satker']],
                [
                    'kementerian_id' => $kementerian->id,
                    'wilayah_id' => $wilayah->id,
                    'nama_satker' => $data['nama_satker'],
                    'kppn' => $kppnBandarLampung[$data['kode_satker']] ?? null,
                    'pagu_anggaran' => 0,
                    'realisasi' => 0,
                ]
            );
        }

        Kementerian::where('kode_kementerian', '050')
            ->whereDoesntHave('satkers')
            ->delete();
    }
}
