<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">
                Tambah Kategori
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Tambahkan kategori baru untuk buku.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            <div class="overflow-hidden rounded-xl bg-white shadow-sm">

                <div class="border-b border-gray-200 px-6 py-5">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Form Kategori
                    </h3>
                </div>

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="space-y-6 p-6">

                        {{-- Nama Kategori --}}
                        <div>
                            <label for="name"
                                   class="block text-sm font-medium text-gray-700">
                                Nama Kategori
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                placeholder="Contoh: Pemrograman"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800"
                            >

                            @error('name')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="flex items-center justify-end gap-3 border-t border-gray-200 bg-gray-50 px-6 py-4">

                        <a href="{{ route('categories.index') }}"
                           class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="rounded-lg bg-gray-800 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
                            Simpan Kategori
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>