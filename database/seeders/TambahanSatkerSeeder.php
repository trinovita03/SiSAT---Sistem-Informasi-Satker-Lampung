<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class TambahanSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_kementerian' => '009', 'nama_kementerian' => 'Kementerian Dalam Negeri', 'kode_satker' => '613629', 'nama_satker' => 'BALAI PEMERINTAHAN DESA LAMPUNG'],
            ['kode_kementerian' => '034', 'nama_kementerian' => 'Kementerian Kesehatan', 'kode_satker' => '632174', 'nama_satker' => 'POLITEKNIK KESEHATAN TANJUNGKARANG'],
            ['kode_kementerian' => '042', 'nama_kementerian' => 'Kementerian Komunikasi dan Digital', 'kode_satker' => '694712', 'nama_satker' => 'BALAI MONITOR SPEKTRUM FREKUENSI RADIO KELAS II LAMPUNG'],
            ['kode_kementerian' => '045', 'nama_kementerian' => 'Kementerian Pariwisata', 'kode_satker' => '694491', 'nama_satker' => 'DINAS PARIWISATA PROVINSI LAMPUNG'],
            ['kode_kementerian' => '043', 'nama_kementerian' => 'Kementerian Koperasi', 'kode_satker' => '694506', 'nama_satker' => 'DINAS KOPERASI DAN USAHA MIKRO KECIL DAN MENENGAH PROVINSI LAMPUNG'],
        ];

        foreach ($satkers as $data) {
            $kementerian = Kementerian::updateOrCreate(
                ['kode_kementerian' => $data['kode_kementerian']],
                ['nama_kementerian' => $data['nama_kementerian']]
            );

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
