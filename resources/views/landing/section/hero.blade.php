<section id="hero" class="relative overflow-hidden pt-32 pb-20 lg:pt-44 lg:pb-32 border-b border-[#ECE4D8]">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
            
            <!-- Kolom Teks Hero -->
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#EADBCC]/60 border border-[#D6C4B0] text-xs font-bold uppercase tracking-wider text-[#382317]">
                    <span class="w-2 h-2 rounded-full bg-[#B85D19]"></span>
                    Koleksi Buku Terpilih & Terpercaya
                </div>

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

                <!-- Keunggulan Toko -->
                <div class="pt-6 border-t border-[#ECE4D8] grid grid-cols-3 gap-4 text-left">
                    <div>
                        <span class="block text-xl font-bold font-serif-title text-[#382317]">100%</span>
                        <span class="text-xs text-[#8C7667]">Buku Original</span>
                    </div>
                    <div>
                        <span class="block text-xl font-bold font-serif-title text-[#382317]">Kurasi</span>
                        <span class="text-xs text-[#8C7667]">Pilihan Kurator</span>
                    </div>
                    <div>
                        <span class="block text-xl font-bold font-serif-title text-[#382317]">Aman</span>
                        <span class="text-xs text-[#8C7667]">Kemasan Rapi</span>
                    </div>
                </div>
            </div>

            <!-- Kolom Showcase Rekomendasi Buku -->
            <div class="lg:col-span-5">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    
                    <!-- Kartu Rekomendasi Bergaya Editorial Toko Buku -->
                    <div class="bg-white rounded-3xl border border-[#EADBCC] p-7 shadow-[0_12px_36px_-12px_rgba(56,35,23,0.1)] space-y-6">
                        <div class="flex items-center justify-between border-b border-[#F2ECE4] pb-4">
                            <div>
                                <span class="text-[11px] font-bold uppercase tracking-wider text-[#B85D19]">Rekomendasi Pekan Ini</span>
                                <h3 class="text-lg font-bold font-serif-title text-[#382317]">Kutipan Inspiratif</h3>
                            </div>
                            <span class="px-2.5 py-1 rounded-full bg-[#FAF7F2] border border-[#EADBCC] text-[11px] font-semibold text-[#8C7667]">
                                BookStore
                            </span>
                        </div>

                        <!-- Quote Box -->
                        <blockquote class="bg-[#FAF7F2] rounded-2xl p-5 border border-[#ECE4D8]">
                            <p class="font-serif-title italic text-sm text-[#382317] leading-relaxed">
                                "Sebuah buku adalah mimpi yang kamu pegang di tanganmu. Membaca memberi kita tempat untuk pergi ketika kita harus tetap berada di tempat kita sekarang."
                            </p>
                            <footer class="mt-3 text-xs font-semibold text-[#8C7667]">
                                &mdash; Neil Gaiman
                            </footer>
                        </blockquote>

                        <!-- Fitur Highlight -->
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 p-3 rounded-xl bg-[#FAF7F2]/60 border border-[#ECE4D8]">
                                <div class="w-8 h-8 rounded-lg bg-[#382317] text-amber-100 flex items-center justify-center shrink-0 font-bold text-xs">
                                    01
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-[#382317]">Koleksi Beragam Kategori</h4>
                                    <p class="text-[11px] text-[#8C7667]">Novel, ensiklopedia, filsafat, hingga bisnis.</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 p-3 rounded-xl bg-[#FAF7F2]/60 border border-[#ECE4D8]">
                                <div class="w-8 h-8 rounded-lg bg-[#382317] text-amber-100 flex items-center justify-center shrink-0 font-bold text-xs">
                                    02
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-[#382317]">Akses Pembaca Mudah</h4>
                                    <p class="text-[11px] text-[#8C7667]">Belanja dengan keranjang terorganisir.</p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('register') }}" class="block w-full py-3 px-4 rounded-xl bg-[#FAF7F2] hover:bg-[#F0ECE7] border border-[#EADBCC] text-center text-xs font-bold text-[#382317] transition">
                            Mulai Berlangganan & Bergabung &rarr;
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
