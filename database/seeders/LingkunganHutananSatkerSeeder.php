<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class LingkunganHutananSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $kementerian = Kementerian::updateOrCreate(
            ['kode_kementerian' => '027'],
            ['nama_kementerian' => 'Kementerian Kehutanan']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '693654', 'nama_satker' => 'BALAI PEMANTAPAN KAWASAN HUTAN WILAYAH XX BANDAR LAMPUNG'],
            ['kode_satker' => '693552', 'nama_satker' => 'BALAI PENGELOLAAN DAERAH ALIRAN SUNGAI WAY SEPUTIH-SEKAMPUNG'],
            ['kode_satker' => '693537', 'nama_satker' => 'BALAI PENGELOLAAN HUTAN LESTARI WILAYAH VI BANDAR LAMPUNG'],
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

        Kementerian::where('kode_kementerian', '051')
            ->whereDoesntHave('satkers')
            ->delete();
    }
}
