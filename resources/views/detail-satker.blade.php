<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail {{ $kementerian->nama_kementerian }} - SiSAT</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    <style>
        * {
            scroll-behavior: smooth;
        }

        body {
            background: #f5f7fb;
        }

        .btn-glow:hover {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }

        .table-row:hover {
            background-color: #f3f4f6;
        }
    </style>
</head>
<body>

<!-- HEADER SECTION -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-8">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center gap-6 mb-6">

            <!-- Logo Kementerian -->
            <div class="bg-white rounded-lg p-4 w-24 h-24 flex items-center justify-center">
                @php
                    $logoFile = $availableLogos[$kementerian->kode_kementerian] ?? null;
                @endphp
                
                @if($logoFile)
                    <img 
                        src="{{ asset('asset/' . $logoFile) }}" 
                        class="w-20 h-20 object-contain"
                        alt="Logo {{ $kementerian->nama_kementerian }}">
                @else
                    <div class="w-12 h-12 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0z" />
                        </svg>
                    </div>
                @endif
            </div>

            <!-- Info Kementerian -->
            <div>
                <p class="text-blue-100 text-sm mb-2">Kode: {{ $kementerian->kode_kementerian }}</p>
                <h1 class="text-4xl font-bold">{{ $kementerian->nama_kementerian }}</h1>
                <p class="text-blue-200 mt-2">Detail Satuan Kerja (Satker)</p>
            </div>

        </div>

        <!-- Tombol Kembali -->
        <div>
            <a href="/" class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-400 text-white px-4 py-2 rounded-lg transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Kembali ke Beranda
            </a>
        </div>

    </div>

</section>

<!-- FILTER SECTION -->
<section class="max-w-7xl mx-auto px-6 mt-10">

    <div class="bg-white rounded-xl shadow-md p-6" data-aos="fade-up" data-aos-duration="800">

        <form method="GET" class="space-y-4">

            <div class="grid md:grid-cols-4 gap-4">

                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Nama Satker
                    </label>

                    <input
                        type="text"
                        name="nama_satker"
                        value="{{ $filterNamaSatker ?? '' }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        placeholder="Cari nama satker..."
                        spellcheck="false">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Kode Satker
                    </label>

                    <input
                        type="text"
                        name="kode_satker"
                        value="{{ $filterKodeSatker ?? '' }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        placeholder="Cari kode satker..."
                        spellcheck="false">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        KPPN
                    </label>

                    <select
                        name="kppn"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">

                        <option value="">
                            Semua KPPN
                        </option>

                        @foreach($kppnOptions as $option)
                            <option
                                value="{{ $option }}"
                                @selected(($filterKppn ?? '') == $option)>
                                {{ $option }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="flex items-end gap-3">

                    <button
                        class="btn-glow bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-lg font-semibold w-full transition duration-300">
                        Cari
                    </button>

                    <a
                        href="{{ route('dashboard.detail', $kementerian->id) }}"
                        class="border border-gray-300 px-6 py-3 rounded-lg text-center hover:bg-gray-50 transition duration-300">
                        Reset
                    </a>

                </div>

            </div>

        </form>

    </div>

</section>

<!-- TABLE SECTION -->
<section class="max-w-7xl mx-auto px-6 py-10">

    @if($satkers->isEmpty())

        <div class="bg-white rounded-xl shadow p-10 text-center" data-aos="fade-up">
            <p class="text-gray-500 text-lg">Tidak ada data Satker ditemukan.</p>
        </div>

    @else

        <div class="bg-white rounded-xl shadow-md overflow-hidden" data-aos="fade-up" data-aos-duration="800">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-blue-50">

                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Kode Satker</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama Satker</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama Kementerian</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">KPPN</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>

                    </thead>

                    <tbody class="bg-white divide-y divide-gray-100">

                        @foreach($satkers as $satker)

                            <tr class="table-row transition">

                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $satkers->firstItem() + $loop->index }}
                                </td>

                                <td class="px-6 py-4 text-sm font-medium text-blue-600">
                                    {{ $satker->kode_satker }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-800">
                                    {{ $satker->nama_satker }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $satker->kementerian?->nama_kementerian ?? $kementerian->nama_kementerian }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $satker->kppn ?? $satker->wilayah?->nama_wilayah ?? '-' }}
                                </td>

                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ route('satker.dashboard', $satker->id) }}"
                                       class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white transition hover:bg-blue-700">
                                        Lihat Dashboard
                                    </a>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="border-t border-gray-200 bg-gray-50 px-6 py-4">
                <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                    <p class="text-sm text-gray-600">
                        Menampilkan {{ $satkers->firstItem() ?? 0 }}-{{ $satkers->lastItem() ?? 0 }} dari {{ $satkers->total() }} satker
                    </p>
                    <div class="text-sm">
                        {{ $satkers->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>

        </div>

    @endif

</section>

<!-- FOOTER -->
<footer class="bg-[#0d254f] text-white py-8 mt-20">

    <div class="max-w-7xl mx-auto px-6 text-center" data-aos="fade-up" data-aos-duration="800">

        <h3 class="font-bold text-lg">
            SiSAT
        </h3>

        <p class="text-blue-200 mt-2">
            Sistem Informasi Satker
        </p>

        <p class="text-sm text-gray-300 mt-3">
            © {{ date('Y') }} Kanwil DJPb Provinsi Lampung
        </p>

    </div>

</footer>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    // Initialize AOS (Animate On Scroll)
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: false,
        mirror: true
    });
</script>

</body>
</html>
