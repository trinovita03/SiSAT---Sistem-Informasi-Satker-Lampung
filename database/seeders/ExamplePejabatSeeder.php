<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\SatkerPejabat;
use Illuminate\Database\Seeder;

class ExamplePejabatSeeder extends Seeder
{
    public function run(): void
    {
        $satker = Satker::where('kode_satker', '415123')->firstOrFail();

        $pejabat = [
            ['jenis_jabatan' => 'KPA', 'nama' => 'Dr. Budi Santoso, M.Si.', 'nip' => '196801011990031001', 'jabatan' => 'Kepala Kantor / KPA', 'pangkat_golongan' => 'Pembina Utama Madya / IV D', 'no_wa' => '081234567890', 'email' => 'budi.santoso@example.go.id'],
            ['jenis_jabatan' => 'PPK', 'nama' => 'Siti Rahmawati, S.E.', 'nip' => '197504122000032002', 'jabatan' => 'Pejabat Pembuat Komitmen', 'pangkat_golongan' => 'Pembina / IV A', 'no_wa' => '081234567891', 'email' => 'siti.rahmawati@example.go.id'],
            ['jenis_jabatan' => 'PPSPM', 'nama' => 'Andi Wijaya, S.E.', 'nip' => '198102152005011003', 'jabatan' => 'anggota', 'pangkat_golongan' => 'Penata Tingkat I / III D', 'no_wa' => '081234567892', 'email' => 'andi.wijaya@example.go.id'],
            ['jenis_jabatan' => 'Bendahara Pengeluaran', 'nama' => 'Dewi Lestari', 'nip' => '198506202010012004', 'jabatan' => 'anggota', 'pangkat_golongan' => 'Penata / III C', 'no_wa' => '081234567893', 'email' => 'dewi.lestari@example.go.id'],
            ['jenis_jabatan' => 'Bendahara Penerimaan', 'nama' => 'Fajar Nugroho', 'nip' => '198709182012061005', 'jabatan' => 'anggota', 'pangkat_golongan' => 'Penata Muda Tingkat I / III B', 'no_wa' => '081234567894', 'email' => 'fajar.nugroho@example.go.id'],
            ['jenis_jabatan' => 'Operator', 'nama' => 'Rina Kurnia Sari', 'nip' => '199203252016032006', 'jabatan' => 'Pengelola Administrasi dan Operator', 'pangkat_golongan' => 'Pengatur Tingkat I / II D', 'no_wa' => '081234567895', 'email' => 'rina.kurnia@example.go.id'],
        ];

        foreach ($pejabat as $data) {
            SatkerPejabat::updateOrCreate(
                [
                    'satker_id' => $satker->id,
                    'jenis_jabatan' => $data['jenis_jabatan'],
                ],
                $data
            );
        }
    }
}
