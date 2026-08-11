<?php

namespace Database\Seeders;

use App\Models\Kementerian;
use App\Models\Satker;
use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class PolriSatkerSeeder extends Seeder
{
    public function run(): void
    {
        $kementerian = Kementerian::updateOrCreate(
            ['kode_kementerian' => '60'],
            ['nama_kementerian' => 'Kepolisian Negara Republik Indonesia / POLRI']
        );

        $wilayah = Wilayah::where('kode_wilayah', '18')->firstOrFail();

        $satkers = [
            ['kode_satker' => '120917', 'nama_satker' => 'POLRES PESAWARAN'],
            ['kode_satker' => '121116', 'nama_satker' => 'POLRES MESUJI'],
            ['kode_satker' => '352641', 'nama_satker' => 'POLRES PRINGSEWU'],
            ['kode_satker' => '352642', 'nama_satker' => 'POLRES TULANG BAWANG BARAT'],
            ['kode_satker' => '536729', 'nama_satker' => 'BIDKUM POLDA'],
            ['kode_satker' => '536730', 'nama_satker' => 'BIDHUMAS POLDA'],
            ['kode_satker' => '641724', 'nama_satker' => 'SPRIPIM POLDA LAMPUNG'],
            ['kode_satker' => '641731', 'nama_satker' => 'ROOPS POLDA LAMPUNG'],
            ['kode_satker' => '641745', 'nama_satker' => 'YANMA POLDA LAMPUNG'],
            ['kode_satker' => '641752', 'nama_satker' => 'DITINTELKAM POLDA LAMPUNG'],
            ['kode_satker' => '641766', 'nama_satker' => 'DITRESKRIMUM POLDA LAMPUNG'],
            ['kode_satker' => '641770', 'nama_satker' => 'DITSAMAPTA POLDA LAMPUNG'],
            ['kode_satker' => '641787', 'nama_satker' => 'DITLANTAS POLDA LAMPUNG'],
            ['kode_satker' => '641792', 'nama_satker' => 'RUMKIT BHAYANGKARA BANDAR LAMPUNG'],
            ['kode_satker' => '641809', 'nama_satker' => 'RO SDM POLDA LAMPUNG'],
            ['kode_satker' => '641834', 'nama_satker' => 'ROLOG POLDA LAMPUNG'],
            ['kode_satker' => '641841', 'nama_satker' => 'SATBRIMOB POLDA LAMPUNG'],
            ['kode_satker' => '641855', 'nama_satker' => 'DITPOLAIRUD POLDA LAMPUNG'],
            ['kode_satker' => '641862', 'nama_satker' => 'BIDKEU POLDA LAMPUNG'],
            ['kode_satker' => '641876', 'nama_satker' => 'BIDDOKKES POLDA LAMPUNG'],
            ['kode_satker' => '641880', 'nama_satker' => 'POLRESTA BANDAR LAMPUNG'],
            ['kode_satker' => '641897', 'nama_satker' => 'POLRES LAMPUNG SELATAN'],
            ['kode_satker' => '641902', 'nama_satker' => 'POLRES METRO'],
            ['kode_satker' => '641919', 'nama_satker' => 'POLRES LAMPUNG UTARA'],
            ['kode_satker' => '641923', 'nama_satker' => 'POLRES LAMPUNG BARAT'],
            ['kode_satker' => '641930', 'nama_satker' => 'POLRES TULANG BAWANG'],
            ['kode_satker' => '641944', 'nama_satker' => 'POLRES TANGGAMUS'],
            ['kode_satker' => '650864', 'nama_satker' => 'BIDPROPAM POLDA LAMPUNG'],
            ['kode_satker' => '650875', 'nama_satker' => 'BID TIK POLDA LAMPUNG'],
            ['kode_satker' => '650896', 'nama_satker' => 'SPN POLDA LAMPUNG'],
            ['kode_satker' => '650918', 'nama_satker' => 'POLRES LAMPUNG TIMUR'],
            ['kode_satker' => '650922', 'nama_satker' => 'POLRES WAY KANAN'],
            ['kode_satker' => '665992', 'nama_satker' => 'POLRES LAMPUNG TENGAH'],
            ['kode_satker' => '669521', 'nama_satker' => 'DITRESNARKOBA POLDA LAMPUNG'],
            ['kode_satker' => '678384', 'nama_satker' => 'ITWASDA POLDA LAMPUNG'],
            ['kode_satker' => '678391', 'nama_satker' => 'RORENA POLDA LAMPUNG'],
            ['kode_satker' => '678406', 'nama_satker' => 'DITBINMAS POLDA LAMPUNG'],
            ['kode_satker' => '679504', 'nama_satker' => 'DITRESKRIMSUS POLDA LAMPUNG'],
            ['kode_satker' => '679511', 'nama_satker' => 'DITPAMOBVIT POLDA LAMPUNG'],
            ['kode_satker' => '970106', 'nama_satker' => 'POLRES PESISIR BARAT'],
        ];

        $kppnBandarLampung = [
            '120917', '352641', '536729', '536730', '641724', '641731',
            '641745', '641752', '641766', '641770', '641787', '641792',
            '641809', '641834', '641841', '641855', '641862', '641876',
            '641880', '641897', '650864', '650875', '650896', '650918',
            '665992', '669521', '678384', '678391', '678406', '679504',
            '679511',
        ];

        $kppnMetro = [
            '641902',
        ];

        $kppnLiwa = [
            '641923', '970106',
        ];

        $kppnKotabumi = [
            '121116', '352642', '641919', '641930', '641944', '650922',
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
