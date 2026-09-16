<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore - Toko Buku & Bacaan Pilihan</title>
    <meta name="description" content="Temukan koleksi buku pilihan terbaik di BookStore. Nikmati pengalaman belanja buku yang nyaman, cepat, dan terpercaya.">
    
    <!-- Google Fonts: Plus Jakarta Sans & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-serif-title {
            font-family: 'Playfair Display', Georgia, serif;
        }
    </style>
</head>

<body class="bg-[#FAF7F2] text-[#2C2420] antialiased selection:bg-[#EADBCC] selection:text-[#382317]">

    <!-- Navbar Sticky -->
    <header class="fixed inset-x-0 top-0 z-50 bg-[#FAF7F2]/90 backdrop-blur-md border-b border-[#ECE4D8] transition-all">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-8">
            <a href="{{ route('landing') }}" class="flex items-center gap-3 group">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#382317] text-amber-100 text-xl font-serif-title font-bold shadow-xs transition group-hover:bg-[#4E3120]">
                    B
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold tracking-tight text-[#382317] leading-none">BookStore</span>
                    <span class="text-[11px] text-[#8C7667] font-medium tracking-wide mt-0.5">Toko Buku Pilihan</span>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-8">
                <a href="#hero" class="text-sm font-semibold text-[#6E5A4E] hover:text-[#382317] transition">Beranda</a>
                <a href="#buku" class="text-sm font-semibold text-[#6E5A4E] hover:text-[#382317] transition">Katalog Pilihan</a>
                <a href="#aboutus" class="text-sm font-semibold text-[#6E5A4E] hover:text-[#382317] transition">Tentang Kami</a>
                <a href="#kontak" class="text-sm font-semibold text-[#6E5A4E] hover:text-[#382317] transition">Kontak</a>
            </nav>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('user.index') }}" class="rounded-xl bg-[#382317] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#4E3120] shadow-xs">
                        Buka Dashboard &rarr;
                    </a>
                @else
                    <a href="{{ route('login') }}" class="rounded-xl px-4 py-2 text-sm font-semibold text-[#6E5A4E] hover:text-[#382317] hover:bg-black/5 transition">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="rounded-xl bg-[#382317] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#4E3120] shadow-xs">
                        Daftar Akun
                    </a>
                @endauth
            </div>
        </div>
    </header>


    <main>
        @include('landing.section.hero')
        @include('landing.section.buku')
        @include('landing.section.aboutus')
        @include('landing.section.kontak')
    </main>

  
    <footer class="border-t border-[#ECE4D8] bg-[#FAF7F2] py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-6 text-xs text-[#8C7667]">
            <div class="flex items-center gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#382317] text-amber-100 text-sm font-serif-title font-bold">
                    B
                </div>
                <span>&copy; {{ date('Y') }} BookStore. Menghadirkan bacaan bermutu untuk setiap pembaca.</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="#hero" class="hover:text-[#382317] transition">Beranda</a>
                <a href="#buku" class="hover:text-[#382317] transition">Katalog</a>
                <a href="#aboutus" class="hover:text-[#382317] transition">Tentang</a>
                <a href="#kontak" class="hover:text-[#382317] transition">Kontak</a>
            </div>
        </div>
    </footer>


</body>

</html>