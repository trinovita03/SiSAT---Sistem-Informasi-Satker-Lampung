<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class BpsSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $kementerian = Kementerian::updateOrCreate(
            ['kode_kementerian' => '054'],
            ['nama_kementerian' => 'Badan Pusat Statistik']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '428321', 'nama_satker' => 'BADAN PUSAT STATISTIK PROP. LAMPUNG'],
            ['kode_satker' => '428330', 'nama_satker' => 'BADAN PUSAT STATISTIK KOTA BANDAR LAMPUNG'],
            ['kode_satker' => '428352', 'nama_satker' => 'BADAN PUSAT STATISTIK KAB. LAMPUNG TENGAH'],
            ['kode_satker' => '428361', 'nama_satker' => 'BADAN PUSAT STATISTIK KAB. LAMPUNG SELATAN'],
            ['kode_satker' => '613640', 'nama_satker' => 'BADAN PUSAT STATISTIK KAB. TULANGBAWANG'],
            ['kode_satker' => '613654', 'nama_satker' => 'BADAN PUSAT STATISTIK KAB. TANGGAMUS'],
            ['kode_satker' => '637106', 'nama_satker' => 'BADAN PUSAT STATISTIK KAB. LAMPUNG TIMUR'],
            ['kode_satker' => '673538', 'nama_satker' => 'BADAN PUSAT STATISTIK KAB. PESAWARAN'],
            ['kode_satker' => '682410', 'nama_satker' => 'BADAN PUSAT STATISTIK KABUPATEN PRINGSEWU'],
            ['kode_satker' => '121115', 'nama_satker' => 'BADAN PUSAT STATISTIK KAB. MESUJI'],
            ['kode_satker' => '428346', 'nama_satker' => 'BADAN PUSAT STATISTIK KAB. LAMPUNG UTARA'],
            ['kode_satker' => '637110', 'nama_satker' => 'BADAN PUSAT STATISTIK KAB. WAY KANAN'],
            ['kode_satker' => '689156', 'nama_satker' => 'BPS KABUPATEN TULANG BAWANG BARAT'],
            ['kode_satker' => '552560', 'nama_satker' => 'BADAN PUSAT STATISTIK KAB. LAMPUNG BARAT'],
            ['kode_satker' => '694893', 'nama_satker' => 'BADAN PUSAT STATISTIK KABUPATEN PESISIR BARAT'],
            ['kode_satker' => '637127', 'nama_satker' => 'BADAN PUSAT STATISTIK KOTA METRO'],
        ];

        $kppnBySatker = [
            '428321' => 'KPPN Bandar Lampung',
            '428330' => 'KPPN Bandar Lampung',
            '428352' => 'KPPN Bandar Lampung',
            '428361' => 'KPPN Bandar Lampung',
            '613640' => 'KPPN Bandar Lampung',
            '613654' => 'KPPN Bandar Lampung',
            '637106' => 'KPPN Bandar Lampung',
            '673538' => 'KPPN Bandar Lampung',
            '682410' => 'KPPN Bandar Lampung',
            '121115' => 'KPPN Kotabumi',
            '428346' => 'KPPN Kotabumi',
            '637110' => 'KPPN Kotabumi',
            '689156' => 'KPPN Kotabumi',
            '552560' => 'KPPN Liwa',
            '694893' => 'KPPN Liwa',
            '637127' => 'KPPN Metro',
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
