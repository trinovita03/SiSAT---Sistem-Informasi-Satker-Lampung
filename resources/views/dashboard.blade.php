<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiSAT - Sistem Informasi Satker</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    <style>
        * {
            scroll-behavior: smooth;
        }

        body{
            background:#f5f7fb;
        }

        .hero-overlay{
            background: rgba(13,37,79,0.80);
        }

        .card-kementerian:hover{
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        /* Sticky Header */
        .sticky-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .sticky-header.scrolled {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        /* Parallax effect */
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Scroll indicator */
        .scroll-indicator {
            animation: bounce 2s infinite;
            cursor: pointer;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        /* Button glow effect */
        .btn-glow:hover {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }
    </style>
</head>
<body>

<!-- HERO SECTION -->
<section class="relative h-[650px]">

    <!-- Background -->
    <img
        src="{{ asset('asset/bg-kanwil.jpg') }}"
        class="absolute inset-0 w-full h-full object-cover"
        alt="">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Content -->
    <div class="relative max-w-7xl mx-auto h-full px-8 flex items-center">

        <div class="grid lg:grid-cols-2 gap-10 items-center w-full">

            <!-- Kiri -->
            <div>
                <!-- <img
                    src="{{ asset('asset/logo-sisat.png') }}"
                    class="w-90 mb-50"> -->
            </div>

            <!-- Kanan -->
            <div class="text-white">

                <h1 class="text-6xl font-bold leading-tight">
                    Sistem Informasi Satker
                </h1>

                <p class="text-2xl mt-4">
                    Monitoring dan Informasi Satuan Kerja
                </p>

                <p class="mt-4 text-blue-200">
                    Kanwil DJPb Provinsi Lampung
                </p>

            </div>

        </div>

    </div>


            </form>

        </div>

    </div>

</section>

<!-- FILTER -->
<section class="max-w-7xl mx-auto px-6 mt-10">

    <div class="bg-white rounded-xl shadow-md p-6" data-aos="fade-up" data-aos-duration="800">

        <form method="GET">

            <div class="grid md:grid-cols-4 gap-4">

                <div>
                    <label class="block mb-2 text-sm font-semibold">
                        Kementerian
                    </label>

                    <input
                        type="text"
                        name="kementerian"
                        value="{{ $filterKementerian ?? '' }}"
                        class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        placeholder="Nama kementerian"
                        spellcheck="false">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold">
                        Kode Satker
                    </label>

                    <input
                        type="text"
                        name="kode_satker"
                        value="{{ $filterKodeSatker ?? '' }}"
                        class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        placeholder="Kode Satker"
                        spellcheck="false">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold">
                        Wilayah KPPN
                    </label>

                    <select
                        name="kppn"
                        class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">

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
                        Filter
                    </button>

                    <a
                        href="/"
                        class="border border-gray-300 px-6 py-3 rounded-lg text-center w-full hover:bg-gray-50 transition duration-300">
                        Reset
                    </a>

                </div>

            </div>

        </form>

    </div>

</section>

<!-- JUDUL -->
<section class="max-w-7xl mx-auto px-6 mt-12">

    <div class="text-center mb-10" data-aos="fade-up" data-aos-duration="800">

        <h2 class="text-4xl font-bold text-gray-800">
            Pilih Kementerian / Lembaga
        </h2>

    </div>

</section>

<!-- CARD KEMENTERIAN -->
<section class="max-w-7xl mx-auto px-6 pb-16">

    @if($kementerian->isEmpty())

        <div class="bg-white rounded-xl shadow p-10 text-center" data-aos="fade-up">

            Tidak ada data ditemukan.

        </div>

    @else

        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8">

            @foreach($kementerian as $kem)

            <a href="#"
               class="card-kementerian bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 overflow-hidden"
               data-aos="fade-up"
               data-aos-duration="800"
               data-aos-delay="{{ $loop->index * 100 }}">

                <!-- Gambar -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 relative">
                    
                    <!-- Tambahkan teks kode di sudut kiri atas seperti pada gambar Anda (opsional) -->
                    <span class="absolute top-3 left-4 text-sm font-bold text-gray-700">
                        {{ $kem->kode_kementerian }}
                    </span>

                    <!-- Panggil gambar secara dinamis berdasarkan kode -->
                    @php
                        $logoFile = $availableLogos[$kem->kode_kementerian] ?? null;
                    @endphp
                    
                    @if($logoFile)
                        <img 
                            src="{{ asset('asset/' . $logoFile) }}" 
                            class="w-28 h-28 object-contain mx-auto hover:scale-110 transition-transform duration-300"
                            alt="Logo {{ $kem->nama_kementerian }}">
                    @else
                        <div class="w-28 h-28 mx-auto flex items-center justify-center text-gray-400 text-3xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0z" />
                            </svg>
                        </div>
                    @endif
                        
                </div>

                <!-- Isi -->
                <div class="p-5">

                    <h3 class="font-bold text-gray-800 text-center text-sm min-h-[48px]">

                        {{ $kem->nama_kementerian }}

                    </h3>

                    <div class="mt-4 text-center">

                        <!-- <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold hover:bg-blue-200 transition">
                            Kode {{ $kem->kode_kementerian }}
                        </span> -->

                    </div>

                    <div class="mt-5 text-center">

                        <span class="text-blue-700 font-semibold text-sm hover:text-blue-900 transition">
                            Lihat Dashboard →
                        </span>

                    </div>

                </div>

            </a>

            @endforeach

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

    // Sticky Header Effect
    const stickyHeader = document.querySelector('.sticky-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            stickyHeader.classList.add('scrolled');
        } else {
            stickyHeader.classList.remove('scrolled');
        }
    });

    // Smooth scroll untuk scroll indicator
    document.querySelector('.scroll-indicator')?.addEventListener('click', () => {
        document.querySelector('.sticky-header').scrollIntoView({ behavior: 'smooth' });
    });
</script>

</body>
</html>
