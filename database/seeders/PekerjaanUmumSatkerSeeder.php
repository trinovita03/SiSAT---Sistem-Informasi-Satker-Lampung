<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class PekerjaanUmumSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $kementerian = Kementerian::updateOrCreate(
            ['kode_kementerian' => '022'],
            ['nama_kementerian' => 'Kementerian Pekerjaan Umum']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '694090', 'nama_satker' => 'DINAS CIPTA KARYA DAN PENGELOLAAN SUMBER DAYA AIR PROVINSI LAMPUNG', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '693844', 'nama_satker' => 'PERENCANAAN DAN PENGAWASAN JALAN NASIONAL PROVINSI LAMPUNG', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '693889', 'nama_satker' => 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI LAMPUNG', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '693890', 'nama_satker' => 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI LAMPUNG', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '693958', 'nama_satker' => 'BALAI PELAKSANAAN JALAN NASIONAL LAMPUNG', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '694035', 'nama_satker' => 'PELAKSANAAN CIPTA KARYA PROVINSI LAMPUNG', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '691291', 'nama_satker' => 'PELAKSANAAN PRASARANA STRATEGIS LAMPUNG', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '694385', 'nama_satker' => 'BALAI PELAKSANA PEMILIHAN JASA KONSTRUKSI WILAYAH LAMPUNG', 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '694089', 'nama_satker' => 'OPERASI DAN PEMELIHARAAN SUMBER DAYA AIR MESUJI SEKAMPUNG', 'kppn' => 'KPPN Kotabumi'],
            ['kode_satker' => '694150', 'nama_satker' => 'SNVT PEMBANGUNAN BENDUNGAN BBWS MESUJI SEKAMPUNG', 'kppn' => 'KPPN Kotabumi'],
            ['kode_satker' => '694199', 'nama_satker' => 'SNVT PELAKSANAAN JARINGAN SUMBER AIR MESUJI-SEKAMPUNG', 'kppn' => 'KPPN Kotabumi'],
            ['kode_satker' => '694200', 'nama_satker' => 'SNVT PELAKSANAAN JARINGAN PEMANFAATAN AIR MESUJI-SEKAMPUNG', 'kppn' => 'KPPN Kotabumi'],
            ['kode_satker' => '694277', 'nama_satker' => 'BALAI BESAR WILAYAH SUNGAI MESUJI - SEKAMPUNG', 'kppn' => 'KPPN Kotabumi'],
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
