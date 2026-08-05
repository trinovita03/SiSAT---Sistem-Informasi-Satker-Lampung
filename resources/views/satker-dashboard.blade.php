<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Satker - {{ $satker->nama_satker }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800">
    <div class="max-w-7xl mx-auto px-6 py-10">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <!-- <p class="text-sm font-semibold uppercase tracking-wide text-blue-600">Dashboard Satker</p> -->
                    <h1 class="text-3xl font-bold mt-2">{{ $satker->nama_satker }}</h1>
                    <p class="text-slate-600 mt-2">{{ $satker->kementerian?->nama_kementerian ?? '-' }} • Kode Satker: {{ $satker->kode_satker }}</p>
                </div>
                <a href="{{ route('dashboard.detail', $satker->kementerian_id) }}" class="inline-flex items-center rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Kembali ke Daftar Satker
                </a>
            </div>

            <div class="mt-8 grid md:grid-cols-3 gap-4">
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">Kode Satker</p>
                    <p class="mt-2 text-xl font-semibold">{{ $satker->kode_satker }}</p>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">KPPN</p>
                    <p class="mt-2 text-xl font-semibold">{{ $satker->kppn ?? $satker->wilayah?->nama_wilayah ?? '-' }}</p>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">Kementerian</p>
                    <p class="mt-2 text-xl font-semibold">{{ $satker->kementerian?->nama_kementerian ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
