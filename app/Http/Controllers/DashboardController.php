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

        $kementerian = $query->get();

        $assetPath = public_path('asset');
        $availableLogos = [];
        if (is_dir($assetPath)) {
            $files = scandir($assetPath);
            foreach ($files as $file) {
                if (preg_match('/^(\d{1,3})\.(jpg|jpeg|png)$/i', $file, $matches)) {
                    $code = $matches[1];
                    if (!isset($availableLogos[$code])) {
                        $availableLogos[$code] = $file;
                    }
                }
            }
        }

        return view('dashboard', compact(
            'kementerian',
            'filterKementerian',
            'availableLogos'
        ));
    }

    public function detail(Request $request, $id)
    {
        $kementerian = Kementerian::findOrFail($id);
        $query = $kementerian->satkers()->with(['kementerian', 'wilayah']);

        $filterNamaSatker = trim((string) $request->input('nama_satker', ''));
        if ($filterNamaSatker !== '') {
            $query->where('nama_satker', 'like', "%{$filterNamaSatker}%");
        }

        $filterKodeSatker = trim((string) $request->input('kode_satker', ''));
        if ($filterKodeSatker !== '') {
            $query->where('kode_satker', 'like', "%{$filterKodeSatker}%");
        }

        $filterKppn = trim((string) $request->input('kppn', ''));
        if ($filterKppn !== '') {
            $query->where(function ($q) use ($filterKppn) {
                $q->where('kppn', 'like', "%{$filterKppn}%")
                    ->orWhereHas('wilayah', function ($wilayahQuery) use ($filterKppn) {
                        $wilayahQuery->where('nama_wilayah', 'like', "%{$filterKppn}%");
                    });
            });
        }

        $kppnOptions = [
            'KPPN Bandar Lampung',
            'KPPN Metro',
            'KPPN Kotabumi',
            'KPPN Liwa',
        ];

        $satkers = $query->paginate(15);

        $assetPath = public_path('asset');
        $availableLogos = [];
        if (is_dir($assetPath)) {
            $files = scandir($assetPath);
            foreach ($files as $file) {
                if (preg_match('/^(\d{1,3})\.(jpg|jpeg|png)$/i', $file, $matches)) {
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
            'filterKppn',
            'kppnOptions',
            'availableLogos'
        ));
    }

    public function showSatkerDashboard($id)
    {
        $satker = Satker::with(['kementerian', 'wilayah', 'pejabat'])->findOrFail($id);

        return view('satker-dashboard', compact('satker'));
    }
}
