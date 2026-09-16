<section id="buku" class="bg-[#f7f1e8] px-6 py-24 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="max-w-2xl">
            <p class="text-sm font-bold uppercase tracking-[0.25em] text-amber-700">Katalog pilihan</p>
            <h2 class="mt-4 text-3xl font-bold tracking-tight text-[#4A2E1B] sm:text-4xl">Temukan cerita berikutnya.</h2>
            <p class="mt-4 text-base leading-8 text-[#745b48]">Koleksi bacaan pilihan untuk menemani waktu belajar, beristirahat, dan menjelajah dunia baru.</p>
        </div>
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([['title' => 'Laut Bercerita', 'author' => 'Leila S. Chudori', 'price' => 'Rp98.000', 'color' => 'bg-[#1f4d4f]'], ['title' => 'Filosofi Teras', 'author' => 'Henry Manampiring', 'price' => 'Rp89.000', 'color' => 'bg-[#c2763b]'], ['title' => 'Bumi Manusia', 'author' => 'Pramoedya Ananta Toer', 'price' => 'Rp105.000', 'color' => 'bg-[#6b3e4c]'], ['title' => 'Atomic Habits', 'author' => 'James Clear', 'price' => 'Rp115.000', 'color' => 'bg-[#315b83']] as $book)
                <article class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-[#4A2E1B]/10 transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="{{ $book['color'] }} flex h-64 items-end p-6">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-[0.2em] text-white/70">BookStore</span>
                            <h3 class="mt-3 text-2xl font-bold leading-tight text-white">{{ $book['title'] }}</h3>
                        </div>
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-[#745b48]">{{ $book['author'] }}</p>
                        <div class="mt-5 flex items-center justify-between gap-3">
                            <strong class="text-lg text-[#4A2E1B]">{{ $book['price'] }}</strong>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-16 rounded-2xl bg-[#4A2E1B] px-6 py-10 text-center sm:px-10">
            <h3 class="text-2xl font-bold text-white">Buku yang kamu cari belum ada?</h3>
            <p class="mt-3 text-amber-50/75">Hubungi kami dan kami bantu mencarikannya.</p>
            <a href="#kontak" class="mt-6 inline-flex rounded-xl bg-amber-500 px-5 py-3 text-sm font-bold text-[#4A2E1B] transition hover:bg-amber-400">Hubungi BookStore</a>
        </div>
	</div>
</section>
