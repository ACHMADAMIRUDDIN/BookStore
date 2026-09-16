<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-[#4A2E1B]">Selamat Datang Kembali</h2>
        <p class="mt-1 text-xs text-gray-500">Masuk ke akun Anda untuk mengakses katalog & layanan BookStore</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Alamat Email" class="font-semibold text-gray-700" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="nama@email.com" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between">
                <x-input-label for="password" value="Kata Sandi" class="font-semibold text-gray-700" />
                @if (Route::has('password.request'))
                    <a class="text-xs text-amber-950 hover:text-amber-800 font-medium transition" href="{{ route('password.request') }}">
                        Lupa kata sandi?
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-amber-950 shadow-sm focus:ring-amber-950 focus:ring-offset-0" name="remember">
                <span class="ms-2 text-sm text-gray-600">Ingat saya</span>
            </label>
        </div>

        <div>
            <x-primary-button class="w-full">
                Masuk
            </x-primary-button>
        </div>
    </form>

    <div class="mt-8 pt-6 border-t border-gray-100 text-center text-xs text-gray-600">
        Belum memiliki akun?
        <a href="{{ route('register') }}" class="font-bold text-amber-950 hover:text-amber-800 transition">
            Daftar Sekarang
        </a>
    </div>
</x-guest-layout>

