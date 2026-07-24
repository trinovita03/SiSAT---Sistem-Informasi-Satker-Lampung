<?php

namespace App\Http\Controllers;

use App\Models\Kementerian;
use App\Models\Satker;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Kementerian::query();

        $filterKementerian = trim((string) $request->input('kementerian', ''));
        if ($filterKementerian !== '') {
            $query->where(function ($q) use ($filterKementerian) {
                $q->where('nama_kementerian', 'like', "%{$filterKementerian}%")
                    ->orWhere('kode_kementerian', 'like', "%{$filterKementerian}%");
            });
        }

        $filterKodeSatker = trim((string) $request->input('kode_satker', ''));
        if ($filterKodeSatker !== '') {
            $query->whereHas('satkers', function ($q) use ($filterKodeSatker) {
                $q->where('kode_satker', 'like', "%{$filterKodeSatker}%");
            });
        }

        $filterKppn = trim((string) $request->input('kppn', ''));
        if ($filterKppn !== '') {
            $query->whereHas('satkers', function ($q) use ($filterKppn) {
                $q->whereHas('wilayah', function ($wilayahQuery) use ($filterKppn) {
                    $wilayahQuery->where('nama_wilayah', 'like', "%{$filterKppn}%");
                });
            });
        }

        try {
            // Jika ada filter/pencarian, tampilkan semua hasil
            // Jika tidak ada filter, limit hanya 10 kementerian
            $hasFilter = $filterKementerian !== '' || $filterKodeSatker !== '' || $filterKppn !== '';
            
            if (!$hasFilter) {
                $kementerian = $query->limit(10)->get();
            } else {
                $kementerian = $query->get();
            }
        } catch (\Throwable $e) {
            $kementerian = collect();
        }

        // Generate list of available logo files
        $assetPath = public_path('asset');
        $availableLogos = [];
        if (is_dir($assetPath)) {
            $files = scandir($assetPath);
            foreach ($files as $file) {
                if (preg_match('/^(\d{3})\.(jpg|jpeg|png)$/i', $file, $matches)) {
                    $code = $matches[1];
                    if (!isset($availableLogos[$code])) {
                        $availableLogos[$code] = $file;
                    }
                }
            }
        }

        $kppnOptions = [
            'KPPN Bandar Lampung',
            'KPPN Metro',
            'KPPN Kotabumi',
            'KPPN Liwa',
        ];

        return view('dashboard', compact(
            'kementerian',
            'filterKementerian',
            'filterKodeSatker',
            'filterKppn',
            'kppnOptions',
            'availableLogos'
        ));
    }

    public function detail(Request $request, $id)
    {
        // Ambil data kementerian berdasarkan ID
        $kementerian = Kementerian::findOrFail($id);

        // Query untuk Satker
        $query = $kementerian->satkers();

        // Filter berdasarkan nama satker
        $filterNamaSatker = trim((string) $request->input('nama_satker', ''));
        if ($filterNamaSatker !== '') {
            $query->where('nama_satker', 'like', "%{$filterNamaSatker}%");
        }

        // Filter berdasarkan kode satker
        $filterKodeSatker = trim((string) $request->input('kode_satker', ''));
        if ($filterKodeSatker !== '') {
            $query->where('kode_satker', 'like', "%{$filterKodeSatker}%");
        }

        try {
            $satkers = $query->get();
        } catch (\Throwable $e) {
            $satkers = collect();
        }

        // Generate list of available logo files
        $assetPath = public_path('asset');
        $availableLogos = [];
        if (is_dir($assetPath)) {
            $files = scandir($assetPath);
            foreach ($files as $file) {
                if (preg_match('/^(\d{3})\.(jpg|jpeg|png)$/i', $file, $matches)) {
                    $code = $matches[1];
                    if (!isset($availableLogos[$code])) {
                        $availableLogos[$code] = $file;
                    }
                }
            }
        }

        return view('detail-satker', compact(
            'kementerian',
            'satkers',
            'filterNamaSatker',
            'filterKodeSatker',
            'availableLogos'
        ));
    }
}
