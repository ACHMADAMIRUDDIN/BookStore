<section id="hero" class="relative overflow-hidden pt-32 pb-20 lg:pt-44 lg:pb-32 border-b border-[#ECE4D8]">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
            <div class="lg:col-span-7 space-y-6">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold font-serif-title text-[#382317] tracking-tight leading-[1.15]">
                    Tempat Buku Terbaik Menemukan Pembacanya.
                </h1>
                <p class="text-base sm:text-lg text-[#6E5A4E] leading-relaxed max-w-xl">
                    Dari fiksi sastra yang menggugah, buku pengembangan diri, hingga literatur bisnis terkini. Kami mengkurasi bacaan bermutu agar setiap halaman membuka ruang pandang baru bagi Anda.
                </p>
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2">
                    <a href="#buku" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#382317] hover:bg-[#4E3120] text-white text-sm font-semibold shadow-xs transition active:scale-95">
                        <span>Jelajahi Katalog Pilihan</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-white hover:bg-[#F2ECE4] border border-[#EADBCC] text-[#382317] text-sm font-semibold shadow-2xs transition">
                        Daftar Akun Gratis
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/Gemini_Generated_Image_p9rsgnp9rsgnp9rs-removebg-preview.png') }}" 
                         alt="Koleksi Buku Pilihan" 
                         class="w-full max-w-sm sm:max-w-md lg:max-w-lg object-contain drop-shadow-[0_20px_35px_rgba(56,35,23,0.18)] select-none transition duration-500 hover:scale-105">
                </div>
            </div>
        </div>
    </div>
</section>
