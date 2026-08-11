<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class AgrariaSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $kementerian = Kementerian::updateOrCreate(
            ['kode_kementerian' => '030'],
            ['nama_kementerian' => 'Kementerian Agraria dan Tata Ruang / Badan Pertanahan Nasional']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '121019', 'nama_satker' => 'KANTOR PERTANAHAN KABUPATEN PRINGSEWU'],
            ['kode_satker' => '431209', 'nama_satker' => 'KANTOR WILAYAH BADAN PERTANAHAN NASIONAL PROP. LAMPUNG'],
            ['kode_satker' => '431215', 'nama_satker' => 'KANTOR PERTANAHAN KOTA BANDAR LAMPUNG'],
            ['kode_satker' => '431221', 'nama_satker' => 'KANTOR PERTANAHAN KAB. LAMPUNG SELATAN'],
            ['kode_satker' => '431230', 'nama_satker' => 'KANTOR PERTANAHAN KAB. LAMPUNG TENGAH'],
            ['kode_satker' => '621981', 'nama_satker' => 'KANTOR PERTANAHAN KAB. TANGGAMUS'],
            ['kode_satker' => '648542', 'nama_satker' => 'KANTOR PERTANAHAN KAB. LAMPUNG TIMUR'],
            ['kode_satker' => '675560', 'nama_satker' => 'KANTOR PERTANAHAN KABUPATEN PESAWARAN'],
            ['kode_satker' => '121217', 'nama_satker' => 'KANTOR PERTANAHAN KABUPATEN TULANG BAWANG BARAT'],
            ['kode_satker' => '431246', 'nama_satker' => 'KANTOR PERTANAHAN KAB. LAMPUNG UTARA'],
            ['kode_satker' => '613565', 'nama_satker' => 'KANTOR PERTANAHAN KAB. TULANG BAWANG'],
            ['kode_satker' => '648538', 'nama_satker' => 'KANTOR PERTANAHAN KAB. WAY KANAN'],
            ['kode_satker' => '689404', 'nama_satker' => 'KANTOR PERTANAHAN KABUPATEN MESUJI'],
            ['kode_satker' => '539604', 'nama_satker' => 'KANTOR PERTANAHAN KAB. LAMPUNG BARAT'],
            ['kode_satker' => '689405', 'nama_satker' => 'KANTOR PERTANAHAN KABUPATEN PESISIR BARAT'],
            ['kode_satker' => '621995', 'nama_satker' => 'KANTOR PERTANAHAN KOTA METRO'],
        ];

        $kppnBySatker = [
            '121019' => 'KPPN Bandar Lampung',
            '431209' => 'KPPN Bandar Lampung',
            '431215' => 'KPPN Bandar Lampung',
            '431221' => 'KPPN Bandar Lampung',
            '431230' => 'KPPN Bandar Lampung',
            '621981' => 'KPPN Bandar Lampung',
            '648542' => 'KPPN Bandar Lampung',
            '675560' => 'KPPN Bandar Lampung',
            '121217' => 'KPPN Kotabumi',
            '431246' => 'KPPN Kotabumi',
            '613565' => 'KPPN Kotabumi',
            '648538' => 'KPPN Kotabumi',
            '689404' => 'KPPN Kotabumi',
            '539604' => 'KPPN Liwa',
            '689405' => 'KPPN Liwa',
            '621995' => 'KPPN Metro',
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
