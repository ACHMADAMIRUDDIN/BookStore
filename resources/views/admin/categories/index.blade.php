<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Kategori Buku
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Kelola kategori buku yang tersedia di BookStore.
                </p>
            </div>

            <a href="{{ route('categories.create') }}"
               class="inline-flex items-center rounded-lg bg-gray-800 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
                + Tambah Kategori
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

            {{-- Pesan error --}}
            @if (session('error'))
                <div class="mb-6 rounded-lg bg-red-50 p-4 text-sm text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-xl bg-white shadow-sm">

                <div class="border-b border-gray-200 px-6 py-5">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Daftar Kategori
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">

                        <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                            <tr>
                                <th class="px-6 py-4">No</th>
                                <th class="px-6 py-4">Nama Kategori</th>
                                <th class="px-6 py-4">Jumlah Buku</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">

                            @forelse ($categories as $category)

                                <tr class="hover:bg-gray-50">

                                    <td class="whitespace-nowrap px-6 py-4 text-gray-600">
                                        {{ $categories->firstItem() + $loop->index }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="font-semibold text-gray-800">
                                            {{ $category->name }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
                                            {{ $category->books_count }} Buku
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">

                                            {{-- Edit --}}
                                            <a href="{{ route('categories.edit', $category) }}"
                                               class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600 hover:bg-blue-100">
                                                Edit
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('categories.destroy', $category) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

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
                                    <td colspan="4" class="px-6 py-12 text-center">

                                        <div class="text-gray-400">
                                            Belum ada kategori.
                                        </div>

                                        <a href="{{ route('categories.create') }}"
                                           class="mt-3 inline-block text-sm font-semibold text-gray-800 hover:underline">
                                            Tambah kategori pertama
                                        </a>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>
                </div>

                {{-- Pagination --}}
                @if ($categories->hasPages())
                    <div class="border-t border-gray-200 px-6 py-4">
                        {{ $categories->links() }}
                    </div>
                @endif

            </div>

        </div>
    </div>

</x-app-layout>