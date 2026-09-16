<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku - BookStore</title>
    <meta name="description" content="Jelajahi koleksi buku pilihan terbaik di BookStore.">
    
    <!-- Google Fonts: Plus Jakarta Sans & Playfair Display untuk sentuhan tipografi toko buku autentik -->
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

<body class="bg-[#FAF7F2] text-[#2C2420] antialiased min-h-screen flex flex-col justify-between selection:bg-[#EADBCC] selection:text-[#382317]">

    <!-- Header / Navbar -->
    <header class="sticky top-0 z-40 bg-[#FAF7F2]/90 backdrop-blur-md border-b border-[#ECE4D8] transition-all">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-8">
            
            <!-- Brand Logo -->
            <a href="{{ route('user.index') }}" class="flex items-center gap-3 group">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#382317] text-amber-100 text-xl font-serif-title font-bold shadow-xs transition group-hover:bg-[#4E3120]">
                    B
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold tracking-tight text-[#382317] leading-none">BookStore</span>
                    <span class="text-[11px] text-[#8C7667] font-medium tracking-wide mt-0.5">Koleksi Pilihan</span>
                </div>
            </a>

            <!-- Navigation Actions -->
            <div class="flex items-center gap-3 sm:gap-6">
                <!-- Tombol Keranjang -->
                <a href="{{ route('user.keranjang.index') }}" 
                   class="relative inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-sm font-semibold text-[#382317] bg-white/70 hover:bg-white border border-[#EADBCC] shadow-2xs transition hover:shadow-xs">
                    <svg class="w-4 h-4 text-[#8C7667]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="hidden sm:inline">Keranjang</span>
                    @if (!empty($cartCount) && $cartCount > 0)
                        <span class="inline-flex items-center justify-center min-w-[20px] h-5 px-1.5 text-xs font-bold leading-none text-white bg-[#B85D19] rounded-full">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

                <!-- User Profile Chip & Logout -->
                <div class="flex items-center gap-2 pl-2 border-l border-[#E2D8CA]">
                    <div class="hidden md:flex flex-col text-right">
                        <span class="text-xs font-bold text-[#382317] leading-none">{{ Auth::user()->name }}</span>
                        <span class="text-[11px] text-[#8C7667] mt-0.5">Pembaca</span>
                    </div>
                    
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" 
                            class="inline-flex items-center justify-center p-2 rounded-xl text-[#8C7667] hover:text-red-700 hover:bg-red-50/80 transition" 
                            title="Keluar / Logout">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </header>

    <!-- Main Content Container -->
    <main class="flex-1 py-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <!-- Toast / Notifikasi Sukses -->
            @if (session('success'))
                <div class="mb-8 rounded-2xl bg-[#F0F7F2] border border-[#C6E6D0] p-4 text-sm font-medium text-[#1E5631] flex items-center justify-between shadow-2xs">
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 rounded-full bg-[#D4EEDC] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-[#1E5631]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span>{{ session('success') }}</span>
                    </div>
                    <a href="{{ route('user.keranjang.index') }}" class="text-xs font-bold text-[#1E5631] hover:underline shrink-0 ml-3">
                        Buka Keranjang &rarr;
                    </a>
                </div>
            @endif

            <!-- Hero Section: Salam & Pencarian -->
            <div class="mb-12 pb-8 border-b border-[#EADBCC]/80 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-[#B85D19]">Ruang Baca Pembaca</span>
                    <h1 class="mt-1 text-3xl sm:text-4xl font-bold font-serif-title text-[#382317] tracking-tight">
                        Temukan Cerita Berikutnya
                    </h1>
                    <p class="mt-2 text-sm sm:text-base text-[#6E5A4E] max-w-xl">
                        Selamat datang kembali, <strong>{{ Auth::user()->name }}</strong>. Koleksi buku pilihan siap menemani hari dan wawasanmu.
                    </p>
                </div>

                <!-- Form Pencarian Bersih & Fungsional -->
                <form action="{{ route('user.index') }}" method="GET" class="w-full md:w-auto">
                    <div class="relative flex items-center">
                        <div class="absolute left-3.5 text-[#A39082] pointer-events-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}" 
                               placeholder="Cari judul atau penulis..." 
                               class="w-full md:w-80 pl-10 pr-24 py-2.5 rounded-xl bg-white border border-[#E2D8CA] text-sm text-[#2C2420] placeholder-[#A39082] shadow-2xs focus:border-[#382317] focus:ring-1 focus:ring-[#382317] transition outline-none">
                        
                        <div class="absolute right-1.5 flex items-center gap-1">
                            @if (request('search'))
                                <a href="{{ route('user.index') }}" 
                                   class="px-2 py-1 text-xs text-[#8C7667] hover:text-[#382317] hover:bg-gray-100 rounded-lg transition" 
                                   title="Reset Pencarian">
                                    &times;
                                </a>
                            @endif
                            <button type="submit" 
                                    class="px-3.5 py-1.5 rounded-lg bg-[#382317] hover:bg-[#4E3120] text-white text-xs font-semibold shadow-2xs transition">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Hasil Pencarian Info Bar (Jika Ada Filter) -->
            @if (request('search'))
                <div class="mb-6 flex items-center justify-between text-xs text-[#6E5A4E] bg-white/70 border border-[#EADBCC] rounded-xl px-4 py-2.5">
                    <span>Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong></span>
                    <a href="{{ route('user.index') }}" class="font-semibold text-[#B85D19] hover:underline">
                        Hapus Filter
                    </a>
                </div>
            @endif

            <!-- Grid Katalog Buku -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-7">
                @forelse ($books as $book)
                    <article class="group bg-white rounded-2xl border border-[#EADBCC] shadow-[0_2px_10px_-4px_rgba(43,27,18,0.05)] hover:shadow-[0_12px_24px_-8px_rgba(43,27,18,0.12)] transition duration-300 flex flex-col justify-between overflow-hidden">
                        
                        <!-- Area Cover Buku -->
                        <div>
                            <a href="{{ route('user.books.detail', $book) }}" class="block relative aspect-[3/4] w-full bg-[#F4EFEA] overflow-hidden">
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

                                <!-- Category Badge -->
                                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[11px] font-bold uppercase tracking-wider bg-white/95 text-[#382317] border border-[#EADBCC]/80 shadow-2xs backdrop-blur-xs">
                                    {{ $book->category->name ?? 'Umum' }}
                                </span>
                            </a>

                            <!-- Detail Buku -->
                            <div class="p-5">
                                <p class="text-xs text-[#8C7667] font-medium">Oleh {{ $book->author }}</p>
                                <h3 class="mt-1 text-base font-bold text-[#382317] line-clamp-2 leading-snug group-hover:text-[#B85D19] transition">
                                    <a href="{{ route('user.books.detail', $book) }}">
                                        {{ $book->title }}
                                    </a>
                                </h3>

                                <!-- Indikator Jika Buku Sudah Berada di Keranjang -->
                                @if (!empty($cartItems[$book->id]))
                                    <div class="mt-2.5 inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-[#EBF5EE] border border-[#CDE7D4] text-[11px] font-semibold text-[#25633C]">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>{{ $cartItems[$book->id] }} di keranjang</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Footer Kartu: Harga & Aksi Beli -->
                        <div class="px-5 pb-5 pt-3 border-t border-[#F2ECE4] space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-[11px] uppercase tracking-wider text-[#8C7667]">Harga</span>
                                <span class="text-lg font-bold text-[#382317]">
                                    Rp {{ number_format($book->price, 0, ',', '.') }}
                                </span>
                            </div>

                            @if ($book->stock > 0)
                                <form action="{{ route('user.keranjang.store') }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">

                                    <!-- Stepper Jumlah Buku -->
                                    <div class="flex items-center border border-[#E2D8CA] rounded-xl bg-[#FAF7F2] p-1">
                                        <button type="button" 
                                            onclick="let inp = this.nextElementSibling; if (parseInt(inp.value) > 1) inp.value = parseInt(inp.value) - 1;" 
                                            class="w-7 h-7 flex items-center justify-center rounded-lg bg-white shadow-2xs text-[#382317] font-bold hover:bg-[#EADBCC] transition active:scale-95 text-sm"
                                            title="Kurangi kuantitas">
                                            -
                                        </button>
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $book->stock }}" 
                                            class="w-9 text-center bg-transparent border-0 p-0 text-xs font-bold text-[#382317] focus:ring-0 appearance-none select-none pointer-events-none" 
                                            readonly>
                                        <button type="button" 
                                            onclick="let inp = this.previousElementSibling; if (parseInt(inp.value) < {{ $book->stock }}) inp.value = parseInt(inp.value) + 1;" 
                                            class="w-7 h-7 flex items-center justify-center rounded-lg bg-white shadow-2xs text-[#382317] font-bold hover:bg-[#EADBCC] transition active:scale-95 text-sm"
                                            title="Tambah kuantitas">
                                            +
                                        </button>
                                    </div>

                                    <!-- Tombol Tambah ke Keranjang -->
                                    <button type="submit" 
                                        class="flex-1 flex items-center justify-center gap-1.5 py-2 px-3 rounded-xl bg-[#382317] hover:bg-[#4E3120] text-white text-xs font-semibold transition active:scale-95 shadow-xs" 
                                        title="Tambahkan buku ke keranjang belanja">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                        <span>Beli</span>
                                    </button>
                                </form>
                            @else
                                <div class="text-center py-2 rounded-xl bg-[#F0ECE7] text-xs font-semibold text-[#8C7667]">
                                    Stok Habis
                                </div>
                            @endif
                        </div>

                    </article>
                @empty
                    <!-- State Buku Kosong / Tidak Ditemukan -->
                    <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-[#DED4C7] max-w-xl mx-auto px-6">
                        <div class="w-14 h-14 mx-auto rounded-full bg-[#FAF7F2] border border-[#EADBCC] flex items-center justify-center text-[#8C7667] mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#382317]">Buku Belum Ditemukan</h3>
                        <p class="mt-1 text-sm text-[#6E5A4E]">
                            @if (request('search'))
                                Tidak ada judul atau penulis yang sesuai dengan "{{ request('search') }}".
                            @else
                                Saat ini belum ada data buku yang tersedia di katalog.
                            @endif
                        </p>
                        @if (request('search'))
                            <a href="{{ route('user.index') }}" 
                               class="mt-5 inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#382317] text-white text-xs font-semibold hover:bg-[#4E3120] transition">
                                Lihat Semua Buku
                            </a>
                        @endif
                    </div>
                @endforelse
            </div>

            <!-- Pagination (Jika Digunakan) -->
            @if (method_exists($books, 'links') && $books->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $books->links() }}
                </div>
            @endif

        </div>
    </main>

    <!-- Footer Sederhana & Hangat -->
    <footer class="border-t border-[#ECE4D8] bg-[#FAF7F2] py-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#8C7667]">
            <p>&copy; {{ date('Y') }} BookStore. Hak cipta dilindungi.</p>
            <div class="flex items-center gap-6">
                <a href="{{ route('user.index') }}" class="hover:text-[#382317] transition">Katalog</a>
                <a href="{{ route('user.keranjang.index') }}" class="hover:text-[#382317] transition">Keranjang</a>
                <a href="{{ route('landing') }}" class="hover:text-[#382317] transition">Halaman Utama</a>
            </div>
        </div>
    </footer>

</body>

</html>