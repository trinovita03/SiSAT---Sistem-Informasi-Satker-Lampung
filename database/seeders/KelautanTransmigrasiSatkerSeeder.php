<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class KelautanTransmigrasiSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $kelautan = Kementerian::updateOrCreate(
            ['kode_kementerian' => '029'],
            ['nama_kementerian' => 'Kementerian Kelautan dan Perikanan']
        );
        $transmigrasi = Kementerian::updateOrCreate(
            ['kode_kementerian' => '041'],
            ['nama_kementerian' => 'Kementerian Transmigrasi']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '427706', 'nama_satker' => 'BALAI BESAR PERIKANAN BUDIDAYA LAUT LAMPUNG', 'kementerian_id' => $kelautan->id, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '652009', 'nama_satker' => 'SEKOLAH USAHA PERIKANAN MENENGAH KOTA AGUNG LAMPUNG', 'kementerian_id' => $kelautan->id, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '649615', 'nama_satker' => 'BALAI PENGENDALIAN DAN PENGAWASAN MUTU HASIL KELAUTAN DAN PERIKANAN LAMPUNG', 'kementerian_id' => $kelautan->id, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '426409', 'nama_satker' => 'BALAI PELAYANAN PELINDUNGAN PEKERJA MIGRAN INDONESIA (BP3MI) LAMPUNG', 'kementerian_id' => $transmigrasi->id, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '694561', 'nama_satker' => 'DINAS PEMBERDAYAAN MASYARAKAT, DESA DAN TRANSMIGRASI PROVINSI LAMPUNG', 'kementerian_id' => $transmigrasi->id, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '691654', 'nama_satker' => 'DINAS TENAGA KERJA DAN TRANSMIGRASI KABUPATEN MESUJI', 'kementerian_id' => $transmigrasi->id, 'kppn' => 'KPPN Kotabumi'],
        ];

        foreach ($satkers as $data) {
            Satker::updateOrCreate(
                ['kode_satker' => $data['kode_satker']],
                [
                    'kementerian_id' => $data['kementerian_id'],
                    'wilayah_id' => $wilayah->id,
                    'nama_satker' => $data['nama_satker'],
                    'kppn' => $data['kppn'],
                    'pagu_anggaran' => 0,
                    'realisasi' => 0,
                ]
            );
        }
    }
}
