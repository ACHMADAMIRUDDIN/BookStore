<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">
                Edit Buku
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Perbarui informasi buku.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            <div class="overflow-hidden rounded-xl bg-white shadow-sm">

                <div class="border-b border-gray-200 px-6 py-5">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Form Edit Buku
                    </h3>
                </div>

                <form action="{{ route('books.update', $book) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6 p-6">

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">
                                Judul Buku
                            </label>

                            <input
                                type="text"
                                name="title"
                                id="title"
                                value="{{ old('title', $book->title) }}"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800"
                            >

                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700">
                                Penulis
                            </label>

                            <input
                                type="text"
                                name="author"
                                id="author"
                                value="{{ old('author', $book->author) }}"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800"
                            >

                            @error('author')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">
                                Kategori
                            </label>

                            <select
                                name="category_id"
                                id="category_id"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800"
                            >
                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}"
                                        {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}
                                    >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="published_year" class="block text-sm font-medium text-gray-700">
                                Tahun Terbit
                            </label>

                            <input
                                type="number"
                                name="published_year"
                                id="published_year"
                                value="{{ old('published_year', $book->published_year) }}"
                                min="0"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800"
                            >

                            @error('published_year')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">
                                Harga
                            </label>

                            <input
                                type="number"
                                name="price"
                                id="price"
                                value="{{ old('price', $book->price) }}"
                                min="0"
                                step="0.01"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800"
                            >

                            @error('price')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">
                                Stok
                            </label>

                            <input
                                type="number"
                                name="stock"
                                id="stock"
                                value="{{ old('stock', $book->stock) }}"
                                min="0"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800"
                            >

                            @error('stock')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Deskripsi
                            </label>

                            <textarea
                                name="description"
                                id="description"
                                rows="5"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-800 focus:ring-gray-800"
                            >{{ old('description', $book->description) }}</textarea>

                            @error('description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex items-center justify-end gap-3 border-t border-gray-200 bg-gray-50 px-6 py-4">

                        <a href="{{ route('books.index') }}"
                           class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="rounded-lg bg-gray-800 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>