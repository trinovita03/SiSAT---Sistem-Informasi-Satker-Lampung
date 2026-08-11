<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kementerian;
use App\Models\Wilayah;
use App\Models\Satker;
use App\Models\SatkerPejabat;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Data 48 Kementerian Indonesia
$kementerianData = [
            ['kode_kementerian' => '001', 'nama_kementerian' => 'Kementerian Koordinator Bidang Politik dan Keamanan'],
            ['kode_kementerian' => '002', 'nama_kementerian' => 'Kementerian Koordinator Bidang Hukum, Hak Asasi Manusia, Imigrasi, dan Pemasyarakatan'],
            ['kode_kementerian' => '003', 'nama_kementerian' => 'Kementerian Koordinator Bidang Perekonomian'],
            ['kode_kementerian' => '004', 'nama_kementerian' => 'Kementerian Koordinator Bidang Pembangunan Manusia dan Kebudayaan'],
            ['kode_kementerian' => '005', 'nama_kementerian' => 'Kementerian Koordinator Bidang Infrastruktur dan Pembangunan Kewilayahan'],
            ['kode_kementerian' => '006', 'nama_kementerian' => 'Kementerian Koordinator Bidang Pemberdayaan Masyarakat'],
            ['kode_kementerian' => '007', 'nama_kementerian' => 'Kementerian Koordinator Bidang Pangan'],
            ['kode_kementerian' => '008', 'nama_kementerian' => 'Kementerian Sekretariat Negara'],
            ['kode_kementerian' => '009', 'nama_kementerian' => 'Kementerian Dalam Negeri'],
            ['kode_kementerian' => '010', 'nama_kementerian' => 'Kementerian Luar Negeri'],
            ['kode_kementerian' => '011', 'nama_kementerian' => 'Kementerian Pertahanan'],
            ['kode_kementerian' => '012', 'nama_kementerian' => 'Kementerian Keuangan'],
            ['kode_kementerian' => '013', 'nama_kementerian' => 'Kementerian Hukum'],
            ['kode_kementerian' => '014', 'nama_kementerian' => 'Kementerian Hak Asasi Manusia'],
            ['kode_kementerian' => '015', 'nama_kementerian' => 'Kementerian Imigrasi dan Pemasyarakatan'],
            ['kode_kementerian' => '016', 'nama_kementerian' => 'Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi'],
            ['kode_kementerian' => '017', 'nama_kementerian' => 'Kementerian Perencanaan Pembangunan Nasional / Bappenas'],
            ['kode_kementerian' => '018', 'nama_kementerian' => 'Kementerian Energi dan Sumber Daya Mineral'],
            ['kode_kementerian' => '019', 'nama_kementerian' => 'Kementerian Perindustrian'],
            ['kode_kementerian' => '020', 'nama_kementerian' => 'Kementerian Perdagangan'],
            ['kode_kementerian' => '021', 'nama_kementerian' => 'Kementerian Perhubungan'],
            ['kode_kementerian' => '022', 'nama_kementerian' => 'Kementerian Pekerjaan Umum'],
            ['kode_kementerian' => '023', 'nama_kementerian' => 'Kementerian Perumahan dan Kawasan Permukiman'],
            ['kode_kementerian' => '024', 'nama_kementerian' => 'Kementerian Badan Usaha Milik Negara'],
            ['kode_kementerian' => '025', 'nama_kementerian' => 'Kementerian Investasi dan Hilirisasi / BKPM'],
            ['kode_kementerian' => '026', 'nama_kementerian' => 'Kementerian Pertanian'],
            ['kode_kementerian' => '027', 'nama_kementerian' => 'Kementerian Kehutanan'],
            ['kode_kementerian' => '028', 'nama_kementerian' => 'Kementerian Lingkungan Hidup / Badan Pengendalian Dampak Lingkungan'],
            ['kode_kementerian' => '029', 'nama_kementerian' => 'Kementerian Kelautan dan Perikanan'],
            ['kode_kementerian' => '030', 'nama_kementerian' => 'Kementerian Agraria dan Tata Ruang / Badan Pertanahan Nasional'],
            ['kode_kementerian' => '031', 'nama_kementerian' => 'Kementerian Agama'],
            ['kode_kementerian' => '032', 'nama_kementerian' => 'Kementerian Sosial'],
            ['kode_kementerian' => '033', 'nama_kementerian' => 'Kementerian Pemberdayaan Perempuan dan Perlindungan Anak'],
            ['kode_kementerian' => '034', 'nama_kementerian' => 'Kementerian Kesehatan'],
            ['kode_kementerian' => '035', 'nama_kementerian' => 'Kementerian Pendidikan Dasar dan Menengah'],
            ['kode_kementerian' => '036', 'nama_kementerian' => 'Kementerian Pendidikan Tinggi, Sains, dan Teknologi'],
            ['kode_kementerian' => '037', 'nama_kementerian' => 'Kementerian Kebudayaan'],
            ['kode_kementerian' => '038', 'nama_kementerian' => 'Kementerian Ketenagakerjaan'],
            ['kode_kementerian' => '039', 'nama_kementerian' => 'Kementerian Perlindungan Pekerja Migran Indonesia'],
            ['kode_kementerian' => '040', 'nama_kementerian' => 'Kementerian Desa dan Pembangunan Daerah Tertinggal'],
            ['kode_kementerian' => '041', 'nama_kementerian' => 'Kementerian Transmigrasi'],
            ['kode_kementerian' => '042', 'nama_kementerian' => 'Kementerian Komunikasi dan Digital'],
            ['kode_kementerian' => '043', 'nama_kementerian' => 'Kementerian Koperasi'],
            ['kode_kementerian' => '044', 'nama_kementerian' => 'Kementerian Usaha Mikro, Kecil, dan Menengah'],
            ['kode_kementerian' => '045', 'nama_kementerian' => 'Kementerian Pariwisata'],
            ['kode_kementerian' => '046', 'nama_kementerian' => 'Kementerian Ekonomi Kreatif / Badan Ekonomi Kreatif'],
            ['kode_kementerian' => '047', 'nama_kementerian' => 'Kementerian Pemuda dan Olahraga'],
            ['kode_kementerian' => '048', 'nama_kementerian' => 'Kementerian Kependudukan dan Pembangunan Keluarga'],
        ];

// 1. Buat Data Kementerian
        $kementerianMap = [];
        foreach ($kementerianData as $kem) {
            // Ubah menjadi 'kode_kementerian' dan 'nama_kementerian'
            $kementerianMap[$kem['kode_kementerian']] = Kementerian::create([
                'kode_kementerian' => $kem['kode_kementerian'],
                'nama_kementerian' => $kem['nama_kementerian']
            ]);
        }

        // 2. Buat Data Wilayah
        $lampung = Wilayah::create([
            'kode_wilayah' => '18', 
            'nama_wilayah' => 'Provinsi Lampung'
        ]);

        // 3. Buat Data Satker (sampel)
        $satkerContoh = Satker::create([
            'kementerian_id' => $kementerianMap['012']->id, // 012 = Kementerian Keuangan
            'wilayah_id' => $lampung->id,
            'kode_satker' => '415123',
            'nama_satker' => 'Kanwil DJPb Provinsi Lampung',
            'kppn' => 'KPPN Bandar Lampung', // Ditambahkan untuk kebutuhan filter
            'pagu_anggaran' => 15000000000.00,
            'realisasi' => 7500000000.00,
        ]);

        foreach ([
            ['jenis_jabatan' => 'KPA', 'nama' => 'Dr. Budi Santoso, M.Si.', 'nip' => '196801011990031001', 'jabatan' => 'Kepala Kantor / KPA', 'pangkat_golongan' => 'Pembina Utama Madya / IV D', 'no_wa' => '081234567890', 'email' => 'budi.santoso@example.go.id'],
            ['jenis_jabatan' => 'PPK', 'nama' => 'Siti Rahmawati, S.E.', 'nip' => '197504122000032002', 'jabatan' => 'Pejabat Pembuat Komitmen', 'pangkat_golongan' => 'Pembina / IV A', 'no_wa' => '081234567891', 'email' => 'siti.rahmawati@example.go.id'],
            ['jenis_jabatan' => 'PPSPM', 'nama' => 'Andi Wijaya, S.E.', 'nip' => '198102152005011003', 'jabatan' => 'PPSPM', 'pangkat_golongan' => 'Penata Tingkat I / III D', 'no_wa' => '081234567892', 'email' => 'andi.wijaya@example.go.id'],
            ['jenis_jabatan' => 'Bendahara Pengeluaran', 'nama' => 'Dewi Lestari', 'nip' => '198506202010012004', 'jabatan' => 'Bendahara Pengeluaran', 'pangkat_golongan' => 'Penata / III C', 'no_wa' => '081234567893', 'email' => 'dewi.lestari@example.go.id'],
            ['jenis_jabatan' => 'Bendahara Penerimaan', 'nama' => 'Fajar Nugroho', 'nip' => '198709182012061005', 'jabatan' => 'Bendahara Penerimaan', 'pangkat_golongan' => 'Penata Muda Tingkat I / III B', 'no_wa' => '081234567894', 'email' => 'fajar.nugroho@example.go.id'],
            ['jenis_jabatan' => 'Operator', 'nama' => 'Rina Kurnia Sari', 'nip' => '199203252016032006', 'jabatan' => 'Pengelola Administrasi dan Operator', 'pangkat_golongan' => 'Pengatur Tingkat I / II D', 'no_wa' => '081234567895', 'email' => 'rina.kurnia@example.go.id'],
        ] as $dataPejabat) {
            SatkerPejabat::create(array_merge($dataPejabat, [
                'satker_id' => $satkerContoh->id,
            ]));
        }

        Satker::create([
            'kementerian_id' => $kementerianMap['031']->id, // 031 = Kementerian Agama
            'wilayah_id' => $lampung->id,
            'kode_satker' => '415999',
            'nama_satker' => 'Kanwil Kemenag Provinsi Lampung',
            'kppn' => 'KPPN Bandar Lampung', // Ditambahkan untuk kebutuhan filter
            'pagu_anggaran' => 8000000000.00,
            'realisasi' => 6000000000.00,
        ]);
    }
}