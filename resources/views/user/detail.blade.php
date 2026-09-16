<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }} - BookStore</title>
    <meta name="description" content="{{ Str::limit($book->description ?? $book->title, 150) }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f7f1e8] font-sans text-gray-900 antialiased min-h-screen flex flex-col justify-between">
    <!-- Header -->
    <header class="fixed inset-x-0 top-0 z-50 border-b border-gray-100 bg-white/95 backdrop-blur">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-8">
            <a href="{{ route('user.index') }}" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-950 text-lg font-bold text-amber-100">B</span>
                <span class="text-lg font-bold leading-none text-[#4A2E1B]">BookStore</span>
            </a>
            <nav class="ml-4 flex min-w-0 flex-1 items-center justify-end gap-4 overflow-x-auto whitespace-nowrap md:flex-none md:gap-7">
                <a href="{{ route('user.index') }}" class="text-sm font-medium text-gray-700 transition hover:text-orange-500">Katalog Buku</a>
                <a href="{{ route('user.keranjang.index') }}" class="text-sm font-medium text-gray-700 transition hover:text-orange-500 flex items-center gap-1.5">
                    <span>Keranjang</span>
                    @if (!empty($cartCount) && $cartCount > 0)
                        <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold leading-none text-white bg-amber-950 rounded-full">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-700">
                        Logout
                    </button>
                </form>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-28 pb-16 flex-1 px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-6xl">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
                <a href="{{ route('user.index') }}" class="hover:text-amber-900 transition">Katalog</a>
                <span>/</span>
                <span class="text-gray-400">{{ $book->category->name ?? 'Buku' }}</span>
                <span>/</span>
                <span class="font-medium text-[#4A2E1B] truncate max-w-xs sm:max-w-md">{{ $book->title }}</span>
            </nav>

            <!-- Success Flash Notification -->
            @if (session('success'))
                <div class="mb-6 rounded-2xl bg-emerald-50 border border-emerald-200 p-4 text-sm font-medium text-emerald-800 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <a href="{{ route('user.keranjang.index') }}" class="text-xs font-bold uppercase tracking-wider text-emerald-700 hover:text-emerald-900 underline">
                        Lihat Keranjang &rarr;
                    </a>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <!-- Kolom Kiri: Cover Gambar -->
                <div class="lg:col-span-5">
                    <div class="rounded-3xl bg-white p-4 shadow-sm ring-1 ring-[#4A2E1B]/10 sticky top-28">
                        <div class="relative aspect-[3/4] w-full overflow-hidden rounded-2xl bg-gray-100 shadow-inner">
                            @php
                                $coverImg = $book->image ?? $book->cover;
                            @endphp
                            @if ($coverImg)
                                <img src="{{ asset('storage/' . $coverImg) }}" 
                                     alt="{{ $book->title }}" 
                                     class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full w-full flex-col items-center justify-center p-6 bg-gradient-to-t from-[#4A2E1B]/80 to-[#1f4d4f] text-white">
                                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-white/70">
                                        {{ $book->category->name ?? 'BookStore' }}
                                    </span>
                                    <h3 class="mt-3 text-2xl font-bold text-center leading-tight">
                                        {{ $book->title }}
                                    </h3>
                                </div>
                            @endif

                            <!-- Kategori Tag -->
                            <span class="absolute top-4 left-4 bg-amber-100 text-amber-900 text-xs font-bold px-3 py-1.5 rounded-lg shadow-xs">
                                {{ $book->category->name ?? 'Umum' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Detail Informasi Buku -->
                <div class="lg:col-span-7 space-y-6">
                    <!-- Judul & Penulis -->
                    <div>
                        <span class="text-xs font-bold uppercase tracking-[0.2em] text-amber-700">
                            {{ $book->category->name ?? 'Koleksi Buku' }}
                        </span>
                        <h1 class="mt-2 text-3xl sm:text-4xl font-bold tracking-tight text-[#4A2E1B]">
                            {{ $book->title }}
                        </h1>
                        <p class="mt-2 text-base text-[#745b48]">
                            Penulis: <span class="font-semibold text-[#4A2E1B]">{{ $book->author }}</span>
                        </p>
                    </div>

                    <!-- Harga & Status Stok -->
                    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-[#4A2E1B]/10 flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <span class="text-xs text-gray-400 block mb-1">Harga Buku</span>
                            <span class="text-3xl font-extrabold text-[#4A2E1B]">
                                Rp {{ number_format($book->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <div>
                            @if ($book->stock > 0)
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3.5 py-1.5 text-xs font-bold text-emerald-700 border border-emerald-200">
                                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                    Tersedia (Sisa {{ $book->stock }} buku)
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3.5 py-1.5 text-xs font-bold text-red-700 border border-red-200">
                                    <span class="h-2 w-2 rounded-full bg-red-500"></span>
                                    Stok Habis
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Indikator Jika Sudah Ada di Keranjang -->
                    @if (!empty($cartItem))
                        <div class="rounded-2xl bg-amber-50/80 border border-amber-200/80 p-4 flex items-center justify-between text-sm text-[#4A2E1B]">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-amber-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span>Buku ini sudah ada di keranjang: <strong>{{ $cartItem->quantity }} buku</strong></span>
                            </div>
                            <a href="{{ route('user.keranjang.index') }}" class="font-bold text-amber-900 hover:underline text-xs">
                                Buka Keranjang &rarr;
                            </a>
                        </div>
                    @endif

                    <!-- Form Tambah ke Keranjang -->
                    @if ($book->stock > 0)
                        <form action="{{ route('user.keranjang.store') }}" method="POST" class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-[#4A2E1B]/10 space-y-4">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">

                            <label class="block text-sm font-semibold text-[#4A2E1B]">Pilih Jumlah Pembelian:</label>
                            
                            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                                <!-- Stepper Jumlah -->
                                <div class="flex items-center justify-between sm:justify-start border border-gray-200 rounded-xl bg-gray-50 p-1.5 w-full sm:w-auto">
                                    <button type="button" 
                                        onclick="let inp = document.getElementById('detailQuantity'); if (parseInt(inp.value) > 1) inp.value = parseInt(inp.value) - 1;" 
                                        class="w-9 h-9 flex items-center justify-center rounded-lg bg-white shadow-xs text-gray-700 font-bold hover:bg-gray-100 transition active:scale-95 text-base">
                                        -
                                    </button>
                                    <input type="number" id="detailQuantity" name="quantity" value="1" min="1" max="{{ $book->stock }}" 
                                        class="w-16 text-center bg-transparent border-0 p-0 text-base font-bold text-[#4A2E1B] focus:ring-0 appearance-none" 
                                        readonly>
                                    <button type="button" 
                                        onclick="let inp = document.getElementById('detailQuantity'); if (parseInt(inp.value) < {{ $book->stock }}) inp.value = parseInt(inp.value) + 1;" 
                                        class="w-9 h-9 flex items-center justify-center rounded-lg bg-white shadow-xs text-gray-700 font-bold hover:bg-gray-100 transition active:scale-95 text-base">
                                        +
                                    </button>
                                </div>

                                <!-- Tombol Submit -->
                                <button type="submit" 
                                    class="flex-1 flex items-center justify-center gap-2 py-3 px-6 rounded-xl bg-amber-950 text-white font-bold hover:bg-amber-800 transition active:scale-95 shadow-md">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
                                    </svg>
                                    <span>+ Tambah ke Keranjang</span>
                                </button>
                            </div>
                        </form>
                    @endif

                    <!-- Detail Spesifikasi Buku -->
                    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-[#4A2E1B]/10 space-y-4">
                        <h2 class="text-lg font-bold text-[#4A2E1B] border-b border-gray-100 pb-3">Informasi Buku</h2>
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3 text-sm">
                            <div>
                                <dt class="text-xs text-gray-400">Judul Lengkap</dt>
                                <dd class="font-semibold text-gray-800 mt-0.5">{{ $book->title }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs text-gray-400">Penulis</dt>
                                <dd class="font-semibold text-gray-800 mt-0.5">{{ $book->author }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs text-gray-400">Kategori</dt>
                                <dd class="font-semibold text-gray-800 mt-0.5">{{ $book->category->name ?? 'Umum' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs text-gray-400">Tahun Terbit</dt>
                                <dd class="font-semibold text-gray-800 mt-0.5">{{ $book->published_year }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs text-gray-400">Stok Tersedia</dt>
                                <dd class="font-semibold text-gray-800 mt-0.5">{{ $book->stock }} eksemplar</dd>
                            </div>
                            <div>
                                <dt class="text-xs text-gray-400">Harga Satuan</dt>
                                <dd class="font-semibold text-[#4A2E1B] mt-0.5">Rp {{ number_format($book->price, 0, ',', '.') }}</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Deskripsi Buku -->
                    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-[#4A2E1B]/10 space-y-3">
                        <h2 class="text-lg font-bold text-[#4A2E1B]">Deskripsi Buku</h2>
                        <div class="text-sm text-[#745b48] leading-relaxed whitespace-pre-line">
                            {{ $book->description ?: 'Belum ada deskripsi untuk buku ini.' }}
                        </div>
                    </div>

                    <!-- Tombol Kembali -->
                    <div>
                        <a href="{{ route('user.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-amber-900 hover:text-amber-700 transition">
                            &larr; Kembali ke Katalog Buku
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
