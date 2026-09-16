<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-5 py-3 bg-amber-950 hover:bg-amber-900 active:bg-amber-950 border border-transparent rounded-xl font-bold text-sm text-white transition duration-200 shadow-md shadow-amber-950/10 focus:outline-none focus:ring-2 focus:ring-amber-950 focus:ring-offset-2 disabled:opacity-50']) }}>
    {{ $slot }}
</button>

