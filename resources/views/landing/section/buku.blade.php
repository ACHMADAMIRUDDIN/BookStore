<section id="buku" class="py-24 border-b border-[#ECE4D8]">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        
        <!-- Header Bagian Katalog -->
        <div class="max-w-2xl">
            <span class="text-xs font-bold uppercase tracking-widest text-[#B85D19]">Katalog Pilihan</span>
            <h2 class="mt-2 text-3xl sm:text-4xl font-bold font-serif-title text-[#382317] tracking-tight">
                Temukan Cerita Berikutnya
            </h2>
            <p class="mt-3 text-base text-[#6E5A4E] leading-relaxed">
                Koleksi buku pilihan kurator kami untuk menemani waktu santai, memperdalam wawasan, dan menjelajahi ide-ide baru.
            </p>
        </div>

        <!-- Grid Buku -->
        <div class="mt-12 grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
            @forelse ($books as $book)
                <article class="group bg-white rounded-2xl border border-[#EADBCC] shadow-[0_2px_10px_-4px_rgba(43,27,18,0.05)] hover:shadow-[0_12px_24px_-8px_rgba(43,27,18,0.12)] transition duration-300 flex flex-col justify-between overflow-hidden">
                    
                    <div>
                        <!-- Cover Buku -->
                        <div class="relative aspect-[3/4] w-full bg-[#F4EFEA] overflow-hidden">
                            @php
                                $coverImg = $book->image ?? $book->cover;
                            @endphp

                            @if ($coverImg)
                                <img src="{{ asset('storage/' . $coverImg) }}" 
                                     alt="{{ $book->title }}" 
                                     class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                     onerror="this.onerror=null; this.src='https://placehold.co/600x800/f4efea/4a3325?text=Buku';">
                            @else
                                <div class="flex h-full w-full flex-col items-center justify-center p-6 text-center bg-[#ECE4D8]">
                                    <svg class="w-10 h-10 text-[#A39082] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    <span class="text-xs font-semibold text-[#8C7667]">Belum ada cover</span>
                                </div>
                            @endif

                            <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[11px] font-bold uppercase tracking-wider bg-white/95 text-[#382317] border border-[#EADBCC]/80 shadow-2xs backdrop-blur-xs">
                                {{ $book->category->name ?? 'Umum' }}
                            </span>
                        </div>

                        <!-- Info Judul & Penulis -->
                        <div class="p-5">
                            <p class="text-xs text-[#8C7667] font-medium">Oleh {{ $book->author }}</p>
                            <h3 class="mt-1 text-base font-bold text-[#382317] line-clamp-2 leading-snug group-hover:text-[#B85D19] transition">
                                {{ $book->title }}
                            </h3>
                        </div>
                    </div>

                    <!-- Footer Kartu: Harga & Tombol -->
                    <div class="px-5 pb-5 pt-3 border-t border-[#F2ECE4] flex items-center justify-between gap-3">
                        <div>
                            <span class="text-[10px] uppercase tracking-wider text-[#8C7667] block">Harga</span>
                            <span class="text-base font-bold text-[#382317]">
                                Rp {{ number_format($book->price, 0, ',', '.') }}
                            </span>
                        </div>

                        @auth
                            <a href="{{ route('user.books.detail', $book) }}" 
                               class="inline-flex items-center gap-1 px-3.5 py-2 rounded-xl bg-[#382317] hover:bg-[#4E3120] text-white text-xs font-semibold shadow-xs transition active:scale-95">
                                <span>Lihat Detail</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                               class="inline-flex items-center gap-1 px-3.5 py-2 rounded-xl bg-[#382317] hover:bg-[#4E3120] text-white text-xs font-semibold shadow-xs transition active:scale-95">
                                <span>Pesan Buku</span>
                            </a>
                        @endauth
                    </div>

                </article>
            @empty
                <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-[#DED4C7] max-w-xl mx-auto px-6">
                    <p class="text-sm font-medium text-[#6E5A4E]">Belum ada koleksi buku yang ditampilkan saat ini.</p>
                </div>
            @endforelse
        </div>

        <!-- Banner Ajakan Bergabung -->
        <div class="mt-16 rounded-3xl bg-[#382317] text-white p-8 sm:p-12 flex flex-col md:flex-row items-center justify-between gap-6 shadow-md">
            <div class="max-w-xl space-y-2 text-center md:text-left">
                <h3 class="text-2xl sm:text-3xl font-bold font-serif-title">Buku yang Kamu Cari Belum Ada?</h3>
                <p class="text-sm sm:text-base text-amber-100/80 leading-relaxed">
                    Daftar akun gratis sekarang untuk mengakses seluruh katalog, menyimpan ke keranjang, atau menghubungi kurator kami.
                </p>
            </div>
            <div class="flex items-center gap-4 shrink-0">
                <a href="{{ route('register') }}" class="px-6 py-3.5 rounded-xl bg-white hover:bg-[#FAF7F2] text-[#382317] text-sm font-bold shadow-xs transition active:scale-95">
                    Daftar Sekarang
                </a>
            </div>
        </div>

    </div>
</section>