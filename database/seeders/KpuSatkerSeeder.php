<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class KpuSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $kementerian = Kementerian::updateOrCreate(
            ['kode_kementerian' => '115'],
            ['nama_kementerian' => 'Komisi Pemilihan Umum (KPU)']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '654357', 'nama_satker' => 'KPU PROVINSI LAMPUNG'],
            ['kode_satker' => '656710', 'nama_satker' => 'KPU KABUPATEN LAMPUNG TENGAH'],
            ['kode_satker' => '656752', 'nama_satker' => 'KPU KABUPATEN TANGGAMUS'],
            ['kode_satker' => '656769', 'nama_satker' => 'KPU KABUPATEN LAMPUNG TIMUR'],
            ['kode_satker' => '656780', 'nama_satker' => 'KPU KABUPATEN LAMPUNG SELATAN'],
            ['kode_satker' => '656802', 'nama_satker' => 'KPU KOTA BANDAR LAMPUNG'],
            ['kode_satker' => '670721', 'nama_satker' => 'KPU KAB. PESAWARAN'],
            ['kode_satker' => '680696', 'nama_satker' => 'KPU KABUPATEN TULANGBAWANG BARAT'],
            ['kode_satker' => '680701', 'nama_satker' => 'KPU KABUPATEN PRINGSEWU'],
            ['kode_satker' => '656727', 'nama_satker' => 'KPU KABUPATEN LAMPUNG UTARA'],
            ['kode_satker' => '656748', 'nama_satker' => 'KPU KABUPATEN TULANG BAWANG'],
            ['kode_satker' => '656773', 'nama_satker' => 'KPU KABUPATEN WAY KANAN'],
            ['kode_satker' => '680718', 'nama_satker' => 'KPU KABUPATEN MESUJI'],
            ['kode_satker' => '121306', 'nama_satker' => 'KPU KABUPATEN PESISIR BARAT'],
            ['kode_satker' => '656731', 'nama_satker' => 'KPU KABUPATEN LAMPUNG BARAT'],
            ['kode_satker' => '656794', 'nama_satker' => 'KPU KOTA METRO'],
        ];

        $kppnBySatker = [
            '654357' => 'KPPN Bandar Lampung',
            '656710' => 'KPPN Bandar Lampung',
            '656752' => 'KPPN Bandar Lampung',
            '656769' => 'KPPN Bandar Lampung',
            '656780' => 'KPPN Bandar Lampung',
            '656802' => 'KPPN Bandar Lampung',
            '670721' => 'KPPN Bandar Lampung',
            '680696' => 'KPPN Bandar Lampung',
            '680701' => 'KPPN Bandar Lampung',
            '656727' => 'KPPN Kotabumi',
            '656748' => 'KPPN Kotabumi',
            '656773' => 'KPPN Kotabumi',
            '680718' => 'KPPN Kotabumi',
            '121306' => 'KPPN Liwa',
            '656731' => 'KPPN Liwa',
            '656794' => 'KPPN Metro',
        ];

        foreach ($satkers as $data) {
            Satker::updateOrCreate(
                ['kode_satker' => $data['kode_satker']],
                [
                    'kementerian_id' => $kementerian->id,
                    'wilayah_id' => $wilayah->id,
                    'nama_satker' => $data['nama_satker'],
                    'kppn' => $kppnBySatker[$data['kode_satker']],
                    'pagu_anggaran' => 0,
                    'realisasi' => 0,
                ]
            );
        }
    }
}
