<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class MahkamahAgungSatkerSeeder extends Seeder
{
    public function run(): void
    {
        Kementerian::updateOrCreate(
            ['kode_kementerian' => '046'],
            ['nama_kementerian' => 'Kementerian Ekonomi Kreatif / Badan Ekonomi Kreatif']
        );

        $kementerian = Kementerian::updateOrCreate(
            ['kode_kementerian' => '049'],
            ['nama_kementerian' => 'Mahkamah Agung']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '99031', 'nama_satker' => 'PENGADILAN NEGERI TANJUNG KARANG'],
            ['kode_satker' => '99045', 'nama_satker' => 'PENGADILAN NEGERI METRO'],
            ['kode_satker' => '99052', 'nama_satker' => 'PENGADILAN NEGERI KOTABUMI'],
            ['kode_satker' => '400364', 'nama_satker' => 'PENGADILAN TINGGI TANJUNG KARANG'],
            ['kode_satker' => '400452', 'nama_satker' => 'KANTOR PENGADILAN NEGERI KALIANDA'],
            ['kode_satker' => '401911', 'nama_satker' => 'PENGADILAN NEGERI GEDONG TATAAN'],
            ['kode_satker' => '401950', 'nama_satker' => 'PENGADILAN AGAMA GEDONG TATAAN'],
            ['kode_satker' => '401951', 'nama_satker' => 'PENGADILAN AGAMA PRINGSEWU'],
            ['kode_satker' => '401952', 'nama_satker' => 'PENGADILAN AGAMA MESUJI'],
            ['kode_satker' => '401955', 'nama_satker' => 'PENGADILAN AGAMA TULANG BAWANG TENGAH'],
            ['kode_satker' => '401956', 'nama_satker' => 'PENGADILAN AGAMA SUKADANA'],
            ['kode_satker' => '402324', 'nama_satker' => 'PENGADILAN AGAMA TANJUNG KARANG'],
            ['kode_satker' => '402330', 'nama_satker' => 'PENGADILAN AGAMA KRUI'],
            ['kode_satker' => '402349', 'nama_satker' => 'PENGADILAN AGAMA KOTABUMI'],
            ['kode_satker' => '402355', 'nama_satker' => 'PENGADILAN AGAMA METRO'],
            ['kode_satker' => '402644', 'nama_satker' => 'PENGADILAN AGAMA KALIANDA'],
            ['kode_satker' => '477306', 'nama_satker' => 'PENGADILAN NEGERI KOTA AGUNG'],
            ['kode_satker' => '547678', 'nama_satker' => 'PENGADILAN TINGGI AGAMA BANDAR LAMPUNG'],
            ['kode_satker' => '559840', 'nama_satker' => 'PENGADILAN TATA USAHA NEGARA BANDAR LAMPUNG'],
            ['kode_satker' => '614684', 'nama_satker' => 'PENGADILAN AGAMA TULANG BAWANG'],
            ['kode_satker' => '614691', 'nama_satker' => 'PENGADILAN AGAMA TANGGAMUS'],
            ['kode_satker' => '614883', 'nama_satker' => 'PENGADILAN NEGERI LIWA KABUPATEN LAMPUNG BARAT'],
            ['kode_satker' => '652041', 'nama_satker' => 'PENGADILAN AGAMA GUNUNG SUGIH'],
            ['kode_satker' => '652055', 'nama_satker' => 'PENGADILAN AGAMA BLAMBANGAN UMPU'],
            ['kode_satker' => '663026', 'nama_satker' => 'PENGADILAN NEGERI MENGGALA'],
            ['kode_satker' => '663030', 'nama_satker' => 'PENGADILAN NEGERI GUNUNG SUGIH'],
            ['kode_satker' => '663047', 'nama_satker' => 'PENGADILAN NEGERI SUKADANA'],
            ['kode_satker' => '663051', 'nama_satker' => 'PENGADILAN NEGERI BLAMBANGAN UMPU'],
            ['kode_satker' => '99236', 'nama_satker' => 'PENGADILAN NEGERI TANJUNG KARANG'],
            ['kode_satker' => '99237', 'nama_satker' => 'PENGADILAN NEGERI METRO'],
            ['kode_satker' => '99238', 'nama_satker' => 'PENGADILAN NEGERI KOTABUMI'],
            ['kode_satker' => '400365', 'nama_satker' => 'PENGADILAN TINGGI TANJUNG KARANG'],
            ['kode_satker' => '400453', 'nama_satker' => 'KANTOR PENGADILAN NEGERI KALIANDA'],
            ['kode_satker' => '402019', 'nama_satker' => 'PENGADILAN NEGERI GEDONG TATAAN'],
            ['kode_satker' => '477307', 'nama_satker' => 'PENGADILAN NEGERI KOTA AGUNG'],
            ['kode_satker' => '614884', 'nama_satker' => 'PENGADILAN NEGERI LIWA KABUPATEN LAMPUNG BARAT'],
            ['kode_satker' => '663027', 'nama_satker' => 'PENGADILAN NEGERI MENGGALA'],
            ['kode_satker' => '663031', 'nama_satker' => 'PENGADILAN NEGERI GUNUNG SUGIH'],
            ['kode_satker' => '663048', 'nama_satker' => 'PENGADILAN NEGERI SUKADANA'],
            ['kode_satker' => '663052', 'nama_satker' => 'PENGADILAN NEGERI BLAMBANGAN UMPU'],
            ['kode_satker' => '402325', 'nama_satker' => 'PENGADILAN AGAMA TANJUNG KARANG'],
            ['kode_satker' => '402331', 'nama_satker' => 'PENGADILAN AGAMA KRUI'],
            ['kode_satker' => '402350', 'nama_satker' => 'PENGADILAN AGAMA KOTABUMI'],
            ['kode_satker' => '402356', 'nama_satker' => 'PENGADILAN AGAMA METRO'],
            ['kode_satker' => '402645', 'nama_satker' => 'PENGADILAN AGAMA KALIANDA'],
            ['kode_satker' => '403413', 'nama_satker' => 'PENGADILAN AGAMA GEDONG TATAAN'],
            ['kode_satker' => '403414', 'nama_satker' => 'PENGADILAN AGAMA PRINGSEWU'],
            ['kode_satker' => '403415', 'nama_satker' => 'PENGADILAN AGAMA MESUJI'],
            ['kode_satker' => '403416', 'nama_satker' => 'PENGADILAN AGAMA TULANG BAWANG TENGAH'],
            ['kode_satker' => '403418', 'nama_satker' => 'PENGADILAN AGAMA SUKADANA'],
            ['kode_satker' => '547679', 'nama_satker' => 'PENGADILAN TINGGI AGAMA BANDAR LAMPUNG'],
            ['kode_satker' => '614685', 'nama_satker' => 'PENGADILAN AGAMA TULANG BAWANG'],
            ['kode_satker' => '614692', 'nama_satker' => 'PENGADILAN AGAMA TANGGAMUS'],
            ['kode_satker' => '652042', 'nama_satker' => 'PENGADILAN AGAMA GUNUNG SUGIH'],
            ['kode_satker' => '652056', 'nama_satker' => 'PENGADILAN AGAMA BLAMBANGAN UMPU'],
            ['kode_satker' => '559841', 'nama_satker' => 'PENGADILAN TATA USAHA NEGARA BANDAR LAMPUNG'],
        ];

        $kppnBandarLampung = [
            '99031', '400364', '400452', '401911', '401950', '401951',
            '402324', '402644', '477306', '547678', '559840', '614691',
            '99236', '400365', '400453', '402019', '477307', '402325',
            '402645', '403413', '403414', '547679', '614692', '559841',
        ];

        $kppnMetro = [
            '99045', '402355', '99237', '402356',
        ];

        $kppnLiwa = [
            '402330', '614883', '614884', '402331',
        ];

        $kppnKotabumi = [
            '99052', '401952', '401955', '401956', '402349', '614684',
            '652041', '652055', '663026', '663030', '663047', '663051',
            '99238', '663027', '663031', '663048', '663052', '402350',
            '403415', '403416', '403418', '614685', '652042', '652056',
        ];

        $kppnBySatker = array_fill_keys($kppnBandarLampung, 'KPPN Bandar Lampung');
        $kppnBySatker += array_fill_keys($kppnMetro, 'KPPN Metro');
        $kppnBySatker += array_fill_keys($kppnLiwa, 'KPPN Liwa');
        $kppnBySatker += array_fill_keys($kppnKotabumi, 'KPPN Kotabumi');

        foreach ($satkers as $data) {
            Satker::updateOrCreate(
                ['kode_satker' => $data['kode_satker']],
                [
                    'kementerian_id' => $kementerian->id,
                    'wilayah_id' => $wilayah->id,
                    'nama_satker' => $data['nama_satker'],
                    'kppn' => $kppnBySatker[$data['kode_satker']] ?? null,
                    'pagu_anggaran' => 0,
                    'realisasi' => 0,
                ]
            );
        }
    }
}
