<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kementerian;
use App\Models\Wilayah;
use App\Models\Satker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Data 48 Kementerian Indonesia
        $kementerianData = [
            ['kode' => '001', 'nama' => 'Sekretariat Negara'],
            ['kode' => '002', 'nama' => 'Sekretariat Kabinet'],
            ['kode' => '003', 'nama' => 'Kantor Staf Presiden'],
            ['kode' => '004', 'nama' => 'Kementerian Dalam Negeri'],
            ['kode' => '005', 'nama' => 'Kementerian Luar Negeri'],
            ['kode' => '006', 'nama' => 'Kementerian Pertahanan'],
            ['kode' => '007', 'nama' => 'Kementerian Keamanan'],
            ['kode' => '008', 'nama' => 'Kementerian Keuangan'],
            ['kode' => '009', 'nama' => 'Kementerian Perencanaan Pembangunan Nasional'],
            ['kode' => '010', 'nama' => 'Kementerian Pendidikan, Kebudayaan, Riset dan Teknologi'],
            ['kode' => '011', 'nama' => 'Kementerian Kesehatan'],
            ['kode' => '012', 'nama' => 'Kementerian Pekerjaan Umum dan Perumahan Rakyat'],
            ['kode' => '013', 'nama' => 'Kementerian Pertanian'],
            ['kode' => '014', 'nama' => 'Kementerian Perindustrian'],
            ['kode' => '015', 'nama' => 'Kementerian Perdagangan'],
            ['kode' => '016', 'nama' => 'Kementerian Pariwisata dan Ekonomi Kreatif'],
            ['kode' => '017', 'nama' => 'Kementerian Komunikasi dan Informatika'],
            ['kode' => '018', 'nama' => 'Kementerian Transportasi'],
            ['kode' => '019', 'nama' => 'Kementerian Energi dan Sumber Daya Mineral'],
            ['kode' => '020', 'nama' => 'Kementerian Lingkungan Hidup dan Kehutanan'],
            ['kode' => '021', 'nama' => 'Kementerian Agraria dan Tata Ruang'],
            ['kode' => '022', 'nama' => 'Kementerian Ketanagakerjaan'],
            ['kode' => '023', 'nama' => 'Kementerian Pemberdayaan Perempuan dan Perlindungan Anak'],
            ['kode' => '024', 'nama' => 'Kementerian Agama'],
            ['kode' => '025', 'nama' => 'Kementerian Sosial'],
            ['kode' => '026', 'nama' => 'Kementerian Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi'],
            ['kode' => '027', 'nama' => 'Kementerian Hukum dan Hak Asasi Manusia'],
            ['kode' => '028', 'nama' => 'Kementerian Riset, Teknologi, dan Pendidikan Tinggi'],
            ['kode' => '029', 'nama' => 'Kementerian Koordinator Bidang Politik, Hukum, dan Keamanan'],
            ['kode' => '030', 'nama' => 'Kementerian Koordinator Bidang Perekonomian'],
            ['kode' => '031', 'nama' => 'Kementerian Koordinator Bidang Pembangunan Manusia dan Kebudayaan'],
            ['kode' => '032', 'nama' => 'Kementerian Koordinator Bidang Infrastruktur'],
            ['kode' => '033', 'nama' => 'Badan Pusat Statistik'],
            ['kode' => '034', 'nama' => 'Badan Standar, Kalibraksi, dan Metrologi'],
            ['kode' => '035', 'nama' => 'Badan Pendidikan dan Pelatihan'],
            ['kode' => '036', 'nama' => 'Badan Pengawasan Keuangan dan Pembangunan'],
            ['kode' => '037', 'nama' => 'Badan Pemeriksa Keuangan'],
            ['kode' => '038', 'nama' => 'Badan Intelijen Negara'],
            ['kode' => '039', 'nama' => 'Badan Nasional Penanggulangan Bencana'],
            ['kode' => '040', 'nama' => 'Badan Siber dan Sandi Negara'],
            ['kode' => '041', 'nama' => 'Lembaga Kebijakan Pengadaan Barang/Jasa Pemerintah'],
            ['kode' => '042', 'nama' => 'Lembaga Layanan Pengadaan Secara Elektronik'],
            ['kode' => '043', 'nama' => 'Ombudsman Republik Indonesia'],
            ['kode' => '044', 'nama' => 'Komisi Ombudsman Nasional'],
            ['kode' => '045', 'nama' => 'Komisi Pemberantasan Korupsi'],
            ['kode' => '046', 'nama' => 'Mahkamah Agung'],
            ['kode' => '047', 'nama' => 'Mahkamah Konstitusi'],
            ['kode' => '048', 'nama' => 'Dewan Perwakilan Rakyat']
        ];

        // 1. Buat Data Kementerian
        $kementerianMap = [];
        foreach ($kementerianData as $kem) {
            $kementerianMap[$kem['kode']] = Kementerian::create([
                'kode_kementerian' => $kem['kode'],
                'nama_kementerian' => $kem['nama']
            ]);
        }

        // 2. Buat Data Wilayah
        $lampung = Wilayah::create([
            'kode_wilayah' => '18', 
            'nama_wilayah' => 'Provinsi Lampung'
        ]);

        // 3. Buat Data Satker (sampel)
        Satker::create([
            'kementerian_id' => $kementerianMap['008']->id,
            'wilayah_id' => $lampung->id,
            'kode_satker' => '415123',
            'nama_satker' => 'Kanwil DJPb Provinsi Lampung',
            'pagu_anggaran' => 15000000000.00,
            'realisasi' => 7500000000.00,
        ]);

        Satker::create([
            'kementerian_id' => $kementerianMap['024']->id,
            'wilayah_id' => $lampung->id,
            'kode_satker' => '415999',
            'nama_satker' => 'Kanwil Kemenag Provinsi Lampung',
            'pagu_anggaran' => 8000000000.00,
            'realisasi' => 6000000000.00,
        ]);
    }
}