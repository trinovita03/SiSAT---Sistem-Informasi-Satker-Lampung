<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Satker - {{ $satker->nama_satker }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100 text-slate-800">
    @php
        $jenisJabatan = [
            'KPA',
            'PPK',
            'PPSPM',
            'Bendahara Pengeluaran',
            'Bendahara Penerimaan',
            'Operator',
        ];
        $pejabatByJenis = $satker->pejabat->keyBy('jenis_jabatan');
    @endphp

    <div class="max-w-7xl mx-auto px-6 py-10">
        <div class="rounded-2xl border border-blue-100 bg-gradient-to-br from-white via-blue-50 to-slate-100 p-8 shadow-lg shadow-blue-100/50">
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
                <div class="rounded-xl border border-blue-100 bg-gradient-to-br from-blue-50 to-white p-4">
                    <p class="text-sm text-slate-500">Kode Satker</p>
                    <p class="mt-2 text-xl font-semibold">{{ $satker->kode_satker }}</p>
                </div>
                <div class="rounded-xl border border-blue-100 bg-gradient-to-br from-blue-50 to-white p-4">
                    <p class="text-sm text-slate-500">KPPN</p>
                    <p class="mt-2 text-xl font-semibold">{{ $satker->kppn ?? $satker->wilayah?->nama_wilayah ?? '-' }}</p>
                </div>
                <div class="rounded-xl border border-blue-100 bg-gradient-to-br from-blue-50 to-white p-4">
                    <p class="text-sm text-slate-500">Kementerian</p>
                    <p class="mt-2 text-xl font-semibold">{{ $satker->kementerian?->nama_kementerian ?? '-' }}</p>
                </div>
            </div>
        </div>

        <section class="mt-8">
            <div class="mb-5">
                <h2 class="mt-1 text-2xl font-bold text-slate-900">Pemegang Jabatan</h2>
                <p class="mt-2 text-slate-600">Informasi pejabat dan petugas pada {{ $satker->nama_satker }}.</p>
            </div>

            <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                @foreach($jenisJabatan as $jenis)
                    @php($pejabat = $pejabatByJenis->get($jenis))
                    <article class="overflow-hidden rounded-2xl border border-blue-100 bg-gradient-to-b from-white via-white to-blue-50 shadow-lg shadow-slate-200/60 transition duration-300 hover:-translate-y-1 hover:shadow-blue-200/70">
                        <div class="flex items-center justify-between border-b border-blue-100 bg-gradient-to-r from-blue-100 to-sky-50 px-5 py-4">
                            <h3 class="font-bold text-blue-900">{{ $jenis }}</h3>
                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-blue-700">{{ $pejabat ? 'Terisi' : 'Belum diisi' }}</span>
                        </div>

                        <div class="p-5">
                            @if($pejabat)
                                @if($pejabat->foto)
                                    <img src="{{ asset('storage/' . ltrim($pejabat->foto, '/')) }}" alt="Foto {{ $pejabat->nama }}" class="mx-auto h-32 w-32 rounded-full object-cover ring-4 ring-blue-50">
                                @else
                                    <div class="mx-auto flex h-32 w-32 items-center justify-center rounded-full bg-slate-100 text-3xl font-bold text-slate-400">{{ strtoupper(substr($pejabat->nama ?: '?', 0, 1)) }}</div>
                                @endif

                                <h4 class="mt-4 text-center text-lg font-bold text-slate-900">{{ $pejabat->nama ?: '-' }}</h4>
                                <p class="mt-1 text-center text-sm text-slate-500">{{ $pejabat->jabatan ?: 'Jabatan belum diisi' }}</p>

                                <dl class="mt-5 space-y-3 border-t border-slate-100 pt-4 text-sm">
                                    <div class="flex justify-between gap-4"><dt class="text-slate-500">NIP</dt><dd class="text-right font-medium text-slate-800">{{ $pejabat->nip ?: '-' }}</dd></div>
                                    <div class="flex justify-between gap-4"><dt class="text-slate-500">Pangkat / Golongan</dt><dd class="text-right font-medium text-slate-800">{{ $pejabat->pangkat_golongan ? preg_replace_callback('/([IVX]+)\.([a-z])/i', fn ($matches) => strtoupper($matches[1] . ' ' . $matches[2]), $pejabat->pangkat_golongan) : '-' }}</dd></div>
                                    <div class="flex justify-between gap-4"><dt class="text-slate-500">No. WA</dt><dd class="text-right font-medium text-slate-800">{{ $pejabat->no_wa ?: '-' }}</dd></div>
                                    <div class="flex justify-between gap-4"><dt class="text-slate-500">Email</dt><dd class="break-all text-right font-medium text-slate-800">{{ $pejabat->email ?: '-' }}</dd></div>
                                </dl>
                            @else
                                <div class="flex min-h-64 flex-col items-center justify-center text-center">
                                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-slate-100 text-2xl text-slate-400">-</div>
                                    <p class="mt-4 font-semibold text-slate-700">Data belum tersedia</p>
                                    <p class="mt-1 text-sm text-slate-500">Informasi {{ $jenis }} belum diinput.</p>
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
</body>
</html>
