<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class PerhubunganSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $kementerian = Kementerian::updateOrCreate(
            ['kode_kementerian' => '021'],
            ['nama_kementerian' => 'Kementerian Perhubungan']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '289712', 'nama_satker' => 'UNIT PENYELENGGARA PELABUHAN KOTA AGUNG'],
            ['kode_satker' => '413307', 'nama_satker' => 'KANTOR KESYAHBANDARAN DAN OTORITAS PELABUHAN PANJANG'],
            ['kode_satker' => '521641', 'nama_satker' => 'UNIT PENYELENGGARA PELABUHAN MENGGALA'],
            ['kode_satker' => '521658', 'nama_satker' => 'UNIT PENYELENGGARA PELABUHAN LABUHAN MARINGGAI'],
            ['kode_satker' => '521662', 'nama_satker' => 'UNIT PENYELENGGARA PELABUHAN MESUJI'],
            ['kode_satker' => '652521', 'nama_satker' => 'KANTOR KESYAHBANDARAN DAN OTORITAS PELABUHAN BAKAUHEUNI'],
        ];

        $kppnBySatker = [
            '413307' => 'KPPN Bandar Lampung',
            '652521' => 'KPPN Bandar Lampung',
            '521658' => 'KPPN Metro',
            '521641' => 'KPPN Kotabumi',
            '521662' => 'KPPN Kotabumi',
            '289712' => 'KPPN Liwa',
        ];

        foreach ($satkers as $data) {
            Satker::updateOrCreate(
                ['kode_satker' => $data['kode_satker']],
                [
                    'kementerian_id' => $kementerian->id,
                    'wilayah_id' => $wilayah->id,
                    'nama_satker' => $data['nama_satker'],
                    'kppn' => $kppnBySatker[$data['kode_satker']] ?? null,
                    'pagu_anggaran' => 0,
                    'realisasi' => 0,
                ]
            );
        }
    }
}
