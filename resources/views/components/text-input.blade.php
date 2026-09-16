@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-amber-950 focus:ring-2 focus:ring-amber-950/20 rounded-xl shadow-sm text-sm px-4 py-2.5 transition duration-150']) }}>

