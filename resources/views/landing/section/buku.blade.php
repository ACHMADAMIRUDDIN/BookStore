<section id="buku" class="bg-[#f7f1e8] px-6 py-24 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="max-w-2xl">
            <p class="text-sm font-bold uppercase tracking-[0.25em] text-amber-700">Katalog pilihan</p>
            <h2 class="mt-4 text-3xl font-bold tracking-tight text-[#4A2E1B] sm:text-4xl">Temukan cerita berikutnya.</h2>
            <p class="mt-4 text-base leading-8 text-[#745b48]">Koleksi bacaan pilihan untuk menemani waktu belajar, beristirahat, dan menjelajah dunia baru.</p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @forelse ($books as $book)
                <article class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-[#4A2E1B]/10 transition duration-300 hover:-translate-y-1 hover:shadow-xl flex flex-col justify-between">
                    

                    <div class="relative h-64 w-full bg-[#1f4d4f] overflow-hidden">
                        @if ($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="h-full w-full object-cover transition duration-300 hover:scale-105">
                        @else
                            <!-- Fallback jika buku belum memiliki file cover -->
                            <div class="flex h-full flex-col justify-end p-6 bg-gradient-to-t from-[#4A2E1B]/80 to-[#1f4d4f]">
                                <span class="text-xs font-bold uppercase tracking-[0.2em] text-white/70">
                                    {{ $book->category->name ?? 'BookStore' }}
                                </span>
                                <h3 class="mt-3 text-2xl font-bold leading-tight text-white line-clamp-2">
                                    {{ $book->title }}
                                </h3>
                            </div>
                        @endif
                    </div>


                    <div class="p-5 flex flex-col flex-1 justify-between">
                        <div>
                            @if ($book->image)
                                <span class="text-xs font-bold uppercase tracking-wider text-amber-700 block mb-1">
                                    {{ $book->category->name ?? 'Umum' }}
                                </span>
                                <h3 class="text-lg font-bold text-[#4A2E1B] line-clamp-2">{{ $book->title }}</h3>
                            @endif
                            <p class="text-sm text-[#745b48] mt-1">{{ $book->author }}</p>
                        </div>

                        <div class="mt-5 flex items-center justify-between gap-3 pt-4 border-t border-[#4A2E1B]/5">
                            <strong class="text-lg text-[#4A2E1B]">
                                Rp{{ number_format($book->price, 0, ',', '.') }}
                            </strong>
                        </div>
                    </div>

                </article>
            @empty

                <div class="col-span-full rounded-2xl bg-white/50 p-12 text-center border border-dashed border-[#4A2E1B]/20">
                    <p class="text-lg font-medium text-[#745b48]">Belum ada koleksi buku yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16 rounded-2xl bg-[#4A2E1B] px-6 py-10 text-center sm:px-10">
            <h3 class="text-2xl font-bold text-white">Buku yang kamu cari belum ada?</h3>
            <p class="mt-3 text-amber-50/75">Hubungi kami dan kami bantu mencarikannya.</p>
            <a href="#kontak" class="mt-6 inline-flex rounded-xl bg-amber-500 px-5 py-3 text-sm font-bold text-[#4A2E1B] transition hover:bg-amber-400">Hubungi BookStore</a>
        </div>
    </div>
</section>