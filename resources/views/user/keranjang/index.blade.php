<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - BookStore</title>
    <meta name="description" content="Keranjang belanja buku BookStore.">
    
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

<body class="bg-[#FAF7F2] text-[#2C2420] antialiased min-h-screen flex flex-col justify-between selection:bg-[#EADBCC] selection:text-[#382317]">

    <!-- Header / Navbar -->
    <header class="sticky top-0 z-40 bg-[#FAF7F2]/90 backdrop-blur-md border-b border-[#ECE4D8]">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-8">
            <a href="{{ route('user.index') }}" class="flex items-center gap-3 group">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#382317] text-amber-100 text-xl font-serif-title font-bold shadow-xs transition group-hover:bg-[#4E3120]">
                    B
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold tracking-tight text-[#382317] leading-none">BookStore</span>
                    <span class="text-[11px] text-[#8C7667] font-medium tracking-wide mt-0.5">Koleksi Pilihan</span>
                </div>
            </a>

            <div class="flex items-center gap-4 sm:gap-6">
                <a href="{{ route('user.index') }}" class="text-sm font-medium text-[#6E5A4E] hover:text-[#382317] transition">
                    &larr; Katalog Buku
                </a>

                <div class="flex items-center gap-2 pl-3 border-l border-[#E2D8CA]">
                    <span class="text-xs font-bold text-[#382317] hidden sm:inline">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="p-2 rounded-xl text-[#8C7667] hover:text-red-700 hover:bg-red-50 transition" title="Logout">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1 py-10">
        <div class="mx-auto max-w-6xl px-6 lg:px-8">

            <!-- Notifikasi Sukses -->
            @if (session('success'))
                <div class="mb-8 rounded-2xl bg-[#F0F7F2] border border-[#C6E6D0] p-4 text-sm font-medium text-[#1E5631] flex items-center gap-3 shadow-2xs">
                    <div class="w-7 h-7 rounded-full bg-[#D4EEDC] flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-[#1E5631]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Notifikasi Error / Peringatan -->
            @if (session('error'))
                <div class="mb-8 rounded-2xl bg-red-50 border border-red-200 p-4 text-sm font-medium text-red-800 flex items-center gap-3 shadow-2xs">
                    <div class="w-7 h-7 rounded-full bg-red-100 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <div class="mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4 pb-6 border-b border-[#EADBCC]">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-[#B85D19]">Daftar Belanja</span>
                    <h1 class="mt-1 text-3xl font-bold font-serif-title text-[#382317]">Keranjang Saya</h1>
                    <p class="mt-1 text-sm text-[#6E5A4E]">Kelola buku yang akan kamu beli atau ubah jumlah pesanannya.</p>
                </div>
                <a href="{{ route('user.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-[#382317] hover:text-[#B85D19] transition">
                    &larr; Lanjut Pilih Buku Lain
                </a>
            </div>

            @if ($carts->isNotEmpty())
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    
                    <!-- Daftar Buku di Keranjang -->
                    <div class="lg:col-span-8 space-y-4">
                        @php $grandTotal = 0; @endphp
                        @foreach ($carts as $cart)
                            @php
                                $book = $cart->book;
                                $subtotal = ($book->price ?? 0) * $cart->quantity;
                                $grandTotal += $subtotal;
                                $coverImg = $book->image ?? null;
                            @endphp

                            <div class="bg-white rounded-2xl border border-[#EADBCC] p-5 shadow-[0_2px_10px_-4px_rgba(43,27,18,0.04)] flex flex-col sm:flex-row gap-5 items-start sm:items-center justify-between transition hover:border-[#D6C4B0]">
                                
                                <!-- Info Buku -->
                                <div class="flex items-center gap-4 flex-1">
                                    <a href="{{ route('user.books.detail', $book) }}" class="relative h-24 w-18 shrink-0 overflow-hidden rounded-xl bg-[#F4EFEA] border border-[#ECE4D8] aspect-[3/4]">
                                        @if ($coverImg)
                                            <img src="{{ asset('storage/' . $coverImg) }}" alt="{{ $book->title }}" class="h-full w-full object-cover">
                                        @else
                                            <div class="h-full w-full flex items-center justify-center text-[#8C7667] text-[10px] p-1 text-center bg-[#ECE4D8]">
                                                No Cover
                                            </div>
                                        @endif
                                    </a>

                                    <div class="min-w-0 flex-1">
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#B85D19]">
                                            {{ $book->category->name ?? 'Umum' }}
                                        </span>
                                        <h3 class="font-bold text-[#382317] text-base leading-snug hover:text-[#B85D19] transition truncate">
                                            <a href="{{ route('user.books.detail', $book) }}">
                                                {{ $book->title }}
                                            </a>
                                        </h3>
                                        <p class="text-xs text-[#8C7667] mt-0.5">Penulis: {{ $book->author }}</p>
                                        <p class="text-sm font-bold text-[#382317] mt-1.5">
                                            Rp {{ number_format($book->price ?? 0, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Pengatur Kuantitas & Tombol Hapus / Kurang -->
                                <div class="flex items-center justify-between sm:justify-end gap-6 w-full sm:w-auto pt-3 sm:pt-0 border-t sm:border-t-0 border-[#F2ECE4]">
                                    
                                    <!-- Stepper Tambah / Kurang (Misal 2 jadi 1) -->
                                    <div class="flex items-center border border-[#E2D8CA] rounded-xl bg-[#FAF7F2] p-1 shadow-2xs">
                                        
                                        <!-- Tombol Kurang (Jika > 1 jadi berkurang 1, jika 1 terhapus) -->
                                        <form action="{{ route('user.keranjang.kurang', $cart) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                class="w-7 h-7 flex items-center justify-center rounded-lg bg-white shadow-2xs text-[#382317] font-bold hover:bg-[#EADBCC] transition active:scale-95 text-sm"
                                                title="{{ $cart->quantity > 1 ? 'Kurangi 1 buku' : 'Hapus buku dari keranjang' }}">
                                                -
                                            </button>
                                        </form>

                                        <!-- Jumlah Saat Ini -->
                                        <span class="w-10 text-center text-xs font-bold text-[#382317]">
                                            {{ $cart->quantity }}
                                        </span>

                                        <!-- Tombol Tambah (Menambah 1 buku lagi) -->
                                        <form action="{{ route('user.keranjang.tambah', $cart) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                class="w-7 h-7 flex items-center justify-center rounded-lg bg-white shadow-2xs text-[#382317] font-bold hover:bg-[#EADBCC] transition active:scale-95 text-sm"
                                                title="Tambah 1 buku">
                                                +
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Subtotal & Hapus Seluruh Item -->
                                    <div class="text-right flex items-center gap-3">
                                        <div>
                                            <span class="text-[10px] text-[#8C7667] block uppercase tracking-wider">Subtotal</span>
                                            <span class="text-sm font-bold text-[#382317]">
                                                Rp {{ number_format($subtotal, 0, ',', '.') }}
                                            </span>
                                        </div>

                                        <!-- Tombol Hapus Langsung Seluruh Item -->
                                        <form action="{{ route('user.keranjang.destroy', $cart) }}" method="POST" class="inline" onsubmit="return confirm('Hapus {{ $book->title }} dari keranjang?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="p-2 rounded-xl text-[#A39082] hover:text-red-700 hover:bg-red-50 transition" 
                                                title="Hapus buku ini dari keranjang">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    </div>

                    <!-- Ringkasan Pesanan (Sidebar) -->
                    <div class="lg:col-span-4">
                        <div class="rounded-2xl bg-white border border-[#EADBCC] p-6 shadow-sm sticky top-28 space-y-5">
                            <h2 class="text-lg font-bold font-serif-title text-[#382317] border-b border-[#F2ECE4] pb-3">
                                Ringkasan Belanja
                            </h2>
                            
                            <div class="space-y-3 text-sm text-[#6E5A4E]">
                                <div class="flex justify-between">
                                    <span>Total Kuantitas</span>
                                    <span class="font-bold text-[#382317]">{{ $carts->sum('quantity') }} eksemplar</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Total Harga Buku</span>
                                    <span class="font-bold text-[#382317]">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <div class="border-t border-[#F2ECE4] pt-4 flex justify-between items-center text-lg font-bold text-[#382317]">
                                <span>Total Pembayaran</span>
                                <span class="text-xl text-[#382317]">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                            </div>

                            <button type="button" class="w-full py-3.5 px-4 rounded-xl bg-[#382317] hover:bg-[#4E3120] text-white text-sm font-bold shadow-xs transition active:scale-95 text-center">
                                Lanjut ke Pembayaran &rarr;
                            </button>
                        </div>
                    </div>

                </div>
            @else
                <!-- Keranjang Kosong -->
                <div class="rounded-2xl bg-white border border-dashed border-[#DED4C7] px-6 py-16 text-center max-w-md mx-auto">
                    <div class="w-14 h-14 mx-auto rounded-full bg-[#FAF7F2] border border-[#EADBCC] flex items-center justify-center text-[#8C7667] mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#382317]">Keranjang Masih Kosong</h3>
                    <p class="mt-1 text-sm text-[#6E5A4E]">Belum ada buku yang kamu pilih untuk dibeli.</p>
                    <a href="{{ route('user.index') }}" class="mt-6 inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#382317] text-white text-xs font-semibold hover:bg-[#4E3120] transition shadow-xs">
                        Jelajahi Katalog Buku
                    </a>
                </div>
            @endif

        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-[#ECE4D8] bg-[#FAF7F2] py-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#8C7667]">
            <p>&copy; {{ date('Y') }} BookStore. Hak cipta dilindungi.</p>
            <div class="flex items-center gap-6">
                <a href="{{ route('user.index') }}" class="hover:text-[#382317] transition">Katalog</a>
                <a href="{{ route('user.keranjang.index') }}" class="hover:text-[#382317] transition">Keranjang</a>
            </div>
        </div>
    </footer>

</body>

</html>
