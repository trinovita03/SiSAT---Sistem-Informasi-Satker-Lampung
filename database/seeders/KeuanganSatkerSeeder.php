<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class KeuanganSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $kementerian = Kementerian::updateOrCreate(
            ['kode_kementerian' => '012'],
            ['nama_kementerian' => 'Kementerian Keuangan']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '125166', 'nama_satker' => 'KANTOR WILAYAH DJBC SUMATERA BAGIAN BARAT', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '506142', 'nama_satker' => 'KANWIL DJKN LAMPUNG DAN BENGKULU', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '500169', 'nama_satker' => 'PENYALUR DANA TRANSFER UMUM', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '600099', 'nama_satker' => 'PENYALUR DANA TRANSFER KHUSUS', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '700289', 'nama_satker' => 'PENYALUR DANA DESA, INSENTIF FISKAL, OTONOMI KHUSUS DAN KEISTIMEWAAN', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '500167', 'nama_satker' => 'PENYALUR DANA TRANSFER UMUM', 'kppn' => 'KPPN Kotabumi'],
            ['kode_satker' => '600097', 'nama_satker' => 'PENYALUR DANA TRANSFER KHUSUS', 'kppn' => 'KPPN Kotabumi'],
            ['kode_satker' => '700287', 'nama_satker' => 'PENYALUR DANA DESA, INSENTIF FISKAL, OTONOMI KHUSUS DAN KEISTIMEWAAN', 'kppn' => 'KPPN Kotabumi'],
            ['kode_satker' => '500168', 'nama_satker' => 'PENYALUR DANA TRANSFER UMUM', 'kppn' => 'KPPN Liwa'],
            ['kode_satker' => '600098', 'nama_satker' => 'PENYALUR DANA TRANSFER KHUSUS', 'kppn' => 'KPPN Liwa'],
            ['kode_satker' => '700288', 'nama_satker' => 'PENYALUR DANA DESA, INSENTIF FISKAL, OTONOMI KHUSUS DAN KEISTIMEWAAN', 'kppn' => 'KPPN Liwa'],
            ['kode_satker' => '500170', 'nama_satker' => 'PENYALUR DANA TRANSFER UMUM', 'kppn' => 'KPPN Metro'],
            ['kode_satker' => '600100', 'nama_satker' => 'PENYALUR DANA TRANSFER KHUSUS', 'kppn' => 'KPPN Metro'],
            ['kode_satker' => '700290', 'nama_satker' => 'PENYALUR DANA DESA, INSENTIF FISKAL, OTONOMI KHUSUS DAN KEISTIMEWAAN', 'kppn' => 'KPPN Metro'],
        ];

        foreach ($satkers as $data) {
            Satker::updateOrCreate(
                ['kode_satker' => $data['kode_satker']],
                [
                    'kementerian_id' => $kementerian->id,
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
