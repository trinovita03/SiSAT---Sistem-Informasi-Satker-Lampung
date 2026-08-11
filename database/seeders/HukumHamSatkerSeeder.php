<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class HukumHamSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $hukum = Kementerian::updateOrCreate(
            ['kode_kementerian' => '013'],
            ['nama_kementerian' => 'Kementerian Hukum']
        );
        $ham = Kementerian::updateOrCreate(
            ['kode_kementerian' => '014'],
            ['nama_kementerian' => 'Kementerian Hak Asasi Manusia']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '692014', 'nama_satker' => 'KANTOR WILAYAH KEMENTERIAN HUKUM LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '693034', 'nama_satker' => 'KANTOR WILAYAH KEMENTERIAN HUKUM LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692054', 'nama_satker' => 'KANTOR WILAYAH KEMENTERIAN HUKUM LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '693001', 'nama_satker' => 'KANTOR WILAYAH KEMENTERIAN HUKUM LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '693102', 'nama_satker' => 'KANTOR WILAYAH KEMENTERIAN HUKUM LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '693136', 'nama_satker' => 'KANTOR WILAYAH KEMENTERIAN HUKUM LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '694833', 'nama_satker' => 'KANTOR WILAYAH KEMENTERIAN HAK ASASI MANUSIA LAMPUNG', 'kementerian' => $ham, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '694853', 'nama_satker' => 'KANTOR WILAYAH KEMENTERIAN HAK ASASI MANUSIA LAMPUNG', 'kementerian' => $ham, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '693068', 'nama_satker' => 'KANTOR WILAYAH KEMENTERIAN HAK ASASI MANUSIA LAMPUNG', 'kementerian' => $ham, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692801', 'nama_satker' => 'KANTOR IMIGRASI KELAS II NON TPI KALIANDA', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692829', 'nama_satker' => 'KANTOR IMIGRASI KELAS I TPI BANDAR LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692881', 'nama_satker' => 'KANWIL DITJEN IMIGRASI LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692096', 'nama_satker' => 'BAPAS KELAS I BANDAR LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692346', 'nama_satker' => 'LAPAS KELAS I BANDAR LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692349', 'nama_satker' => 'RUTAN KELAS II B SUKADANA', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692485', 'nama_satker' => 'LAPAS KELAS II B KOTA AGUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692486', 'nama_satker' => 'LAPAS KELAS II A KALIANDA', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692509', 'nama_satker' => 'KANWIL DITJEN PEMASYARAKATAN LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692573', 'nama_satker' => 'LAPAS KELAS II B WAYKANAN', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692574', 'nama_satker' => 'LAPAS PEREMPUAN KELAS II A BANDAR LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692627', 'nama_satker' => 'BAPAS KELAS II PRINGSEWU', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692694', 'nama_satker' => 'LAPAS NARKOTIKA KELAS II A BANDAR LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692744', 'nama_satker' => 'RUTAN KELAS I BANDAR LAMPUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692750', 'nama_satker' => 'LAPAS KELAS II B GUNUNG SUGIH', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692757', 'nama_satker' => 'RUTAN KELAS II B KOTA AGUNG', 'kementerian' => $hukum, 'kppn' => 'KPPN Bandar Lampung'],
            ['kode_satker' => '692979', 'nama_satker' => 'KANTOR IMIGRASI KELAS II NON TPI KOTABUMI', 'kementerian' => $hukum, 'kppn' => 'KPPN Kotabumi'],
            ['kode_satker' => '692347', 'nama_satker' => 'LAPAS KELAS II A KOTABUMI', 'kementerian' => $hukum, 'kppn' => 'KPPN Kotabumi'],
            ['kode_satker' => '692348', 'nama_satker' => 'RUTAN KELAS II B MENGGALA', 'kementerian' => $hukum, 'kppn' => 'KPPN Kotabumi'],
            ['kode_satker' => '692572', 'nama_satker' => 'RUTAN KELAS II B KOTABUMI', 'kementerian' => $hukum, 'kppn' => 'KPPN Kotabumi'],
            ['kode_satker' => '692626', 'nama_satker' => 'BAPAS KELAS II KOTABUMI', 'kementerian' => $hukum, 'kppn' => 'KPPN Kotabumi'],
            ['kode_satker' => '692350', 'nama_satker' => 'RUTAN KELAS II B KRUI', 'kementerian' => $hukum, 'kppn' => 'KPPN Liwa'],
            ['kode_satker' => '692319', 'nama_satker' => 'LAPAS KELAS II A METRO', 'kementerian' => $hukum, 'kppn' => 'KPPN Metro'],
            ['kode_satker' => '692710', 'nama_satker' => 'BAPAS KELAS II METRO', 'kementerian' => $hukum, 'kppn' => 'KPPN Metro'],
        ];

        foreach ($satkers as $data) {
            Satker::updateOrCreate(
                ['kode_satker' => $data['kode_satker']],
                [
                    'kementerian_id' => $data['kementerian']->id,
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
