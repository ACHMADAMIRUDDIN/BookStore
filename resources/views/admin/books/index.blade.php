
<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Data Buku
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Kelola data buku yang tersedia di BookStore.
                </p>
            </div>

            <a href="{{ route('books.create') }}"
               class="inline-flex items-center rounded-lg bg-gray-800 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
                + Tambah Buku
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Pesan berhasil --}}
            @if (session('success'))
                <div class="mb-6 rounded-lg bg-green-50 p-4 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-xl bg-white shadow-sm">

                <div class="border-b border-gray-200 px-6 py-5">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Daftar Buku
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">

                        <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                            <tr>
                                <th class="px-6 py-4">No</th>
                                <th class="px-6 py-4">Judul Buku</th>
                                <th class="px-6 py-4">Penulis</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Tahun</th>
                                <th class="px-6 py-4">Harga</th>
                                <th class="px-6 py-4">Stok</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">

                            @forelse ($books as $book)

                                <tr class="hover:bg-gray-50">

                                    <td class="whitespace-nowrap px-6 py-4 text-gray-600">
                                        {{ $books->firstItem() + $loop->index }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800">
                                            {{ $book->title }}
                                        </div>

                                        @if ($book->description)
                                            <div class="mt-1 max-w-xs truncate text-xs text-gray-400">
                                                {{ $book->description }}
                                            </div>
                                        @endif
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4 text-gray-600">
                                        {{ $book->author }}
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4">
                                        <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
                                            {{ $book->category->name }}
                                        </span>
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4 text-gray-600">
                                        {{ $book->published_year }}
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-800">
                                        Rp {{ number_format($book->price, 0, ',', '.') }}
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4">
                                        @if ($book->stock > 0)
                                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
                                                {{ $book->stock }}
                                            </span>
                                        @else
                                            <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700">
                                                Habis
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">

                                            <a href="{{ route('books.edit', $book) }}"
                                               class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600 hover:bg-blue-100">
                                                Edit
                                            </a>

                                            <form action="{{ route('books.destroy', $book) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-100">
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8" class="px-6 py-12 text-center">

                                        <div class="text-gray-400">
                                            Belum ada data buku.
                                        </div>

                                        <a href="{{ route('books.create') }}"
                                           class="mt-3 inline-block text-sm font-semibold text-gray-800 hover:underline">
                                            Tambah buku pertama
                                        </a>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>
                </div>

                {{-- Pagination --}}
                @if ($books->hasPages())
                    <div class="border-t border-gray-200 px-6 py-4">
                        {{ $books->links() }}
                    </div>
                @endif

            </div>

        </div>
    </div>

</x-app-layout>

