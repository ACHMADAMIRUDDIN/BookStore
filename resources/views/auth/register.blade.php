<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-[#4A2E1B]">Buat Akun Baru</h2>
        <p class="mt-1 text-xs text-gray-500">Bergabunglah dengan BookStore untuk menjelajahi & memesan koleksi buku pilihan</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" value="Nama Lengkap" class="font-semibold text-gray-700" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Nama lengkap Anda" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Alamat Email" class="font-semibold text-gray-700" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="nama@email.com" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" value="Kata Sandi" class="font-semibold text-gray-700" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="Minimal 8 karakter"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi" class="font-semibold text-gray-700" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"
                            placeholder="Ulangi kata sandi"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full">
                Daftar Sekarang
            </x-primary-button>
        </div>
    </form>

    <div class="mt-8 pt-6 border-t border-gray-100 text-center text-xs text-gray-600">
        Sudah memiliki akun?
        <a href="{{ route('login') }}" class="font-bold text-amber-950 hover:text-amber-800 transition">
            Masuk
        </a>
    </div>
</x-guest-layout>

