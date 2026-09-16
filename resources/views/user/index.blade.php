<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore</title>
    <meta name="description" content="Katalog buku pilihan BookStore.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f7f1e8] font-sans text-gray-900 antialiased">
    <header class="fixed inset-x-0 top-0 z-50 border-b border-gray-100 bg-white/95 backdrop-blur">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-8">
            <a href="{{ route('landing') }}" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-950 text-lg font-bold text-amber-100">B</span>
                <span class="text-lg font-bold leading-none text-[#4A2E1B]">BookStore</span>
            </a>
            <nav class="ml-4 flex min-w-0 flex-1 items-center justify-end gap-4 overflow-x-auto whitespace-nowrap md:flex-none md:gap-7">              
                <a href="#keranjang" class="text-sm font-medium text-gray-700 transition hover:text-orange-500">Keranjang</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-700">
                        Logout
                    </button>
                </form>
            </nav>
        </div>
    </header>
<section id="buku" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Katalog Buku</h2>
                <p class="mt-2 text-gray-600">Temukan koleksi buku terbaik untuk menambah wawasanmu.</p>
            </div>

            <form action="{{ route('user.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul atau penulis..." class="w-full sm:w-64 pl-10 pr-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-amber-950 focus:border-amber-950 text-sm">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <button type="submit" class="bg-amber-950 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-amber-800 transition">Cari</button>
            </form>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($books as $book)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 flex flex-col overflow-hidden group">
                    

                    <div class="relative aspect-[3/4] bg-gray-100 overflow-hidden">
                        @php
                            $coverImg = $book->image ?? $book->cover;
                        @endphp
                        @if ($coverImg)
                            <img src="{{ asset('storage/' . $coverImg) }}" 
                                 alt="{{ $book->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                                 onerror="this.onerror=null; this.src='https://placehold.co/600x800?text=No+Cover';">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center p-4 bg-gray-200 text-gray-400">
                                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <span class="text-xs text-center font-medium">Tidak ada cover</span>
                            </div>
                        @endif

                        <span class="absolute top-3 left-3 bg-amber-100 text-amber-900 text-xs font-semibold px-2.5 py-1 rounded-md">
                            {{ $book->category->name ?? 'Umum' }}
                        </span>
                    </div>

                    <div class="p-5 flex flex-col flex-1 justify-between">
                        <div>
                            <p class="text-xs text-gray-500 font-medium mb-1">{{ $book->author }}</p>
                            <h3 class="text-base font-bold text-gray-900 line-clamp-2 hover:text-amber-800 transition">
                                <a href="#">{{ $book->title }}</a>
                            </h3>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                            <div>
                                <span class="text-xs text-gray-400 block">Harga</span>
                                <span class="text-lg font-bold text-amber-950">
                                    Rp {{ number_format($book->price, 0, ',', '.') }}
                                </span>
                            </div>

                            <button type="button" class="p-2.5 rounded-xl bg-gray-100 text-gray-700 hover:bg-amber-950 hover:text-white transition" title="Tambah ke Keranjang">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full py-12 text-center bg-white rounded-2xl border border-dashed border-gray-200">
                    <p class="text-gray-500 font-medium">Buku tidak ditemukan atau belum tersedia.</p>
                </div>
            @endforelse
        </div>
        @if (method_exists($books, 'links'))
            <div class="mt-10">
                {{ $books->links() }}
            </div>
        @endif

    </div>
</section>

  
    @include('user.section.keranjang')

</body>

</html>