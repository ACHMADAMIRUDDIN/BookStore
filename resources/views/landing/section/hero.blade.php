<section id="hero" class="relative overflow-hidden bg-[#4A2E1B] pt-32 pb-20 lg:pt-40 lg:pb-28">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 lg:grid-cols-2 lg:gap-16 lg:px-8">
        <div class="max-w-2xl">
            <h1 class="text-4xl font-bold leading-tight tracking-tight text-white sm:text-5xl lg:text-6xl">
                Beli Buku <span class="text-amber-700">Lebih Mudah</span> dan Terorganisir.
            </h1>
            <p class="mt-6 max-w-xl text-base leading-8 text-amber-50/80 sm:text-lg">
                Persami membantu mengelola seluruh kebutuhan kegiatan secara lebih sederhana, cepat, dan terstruktur dalam satu platform digital.
            </p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-amber-600 px-6 py-3.5 text-sm font-bold text-[#4A2E1B] transition hover:bg-amber-700">
                    Mulai Sekarang
                </a>
                <a href="#fitur" class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">
                    Lihat Fitur
                </a>
            </div>
            <div class="mt-10 flex flex-wrap items-center gap-x-8 gap-y-4">
                <div class="flex items-center gap-2">
                    <span class="text-sm text-amber-50/80">Mudah digunakan</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-amber-50/80">Terorganisir</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-amber-50/80">Berbasis digital</span>
                </div>
            </div>
        </div>
        <div class="relative flex justify-center lg:justify-end">
            <img src="{{ asset('images/pngtree-scout-people-with-camp-illustration-vector-png-image_3484246-removebg-preview.png') }}" alt="Persami" class="relative z-10 w-full max-w-xl object-contain drop-shadow-2xl">
        </div>
    </div>
</section>
