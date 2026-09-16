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
				<a href="#hero" class="text-sm font-medium text-gray-700 transition hover:text-orange-500">Beranda</a>
				<a href="#buku" class="text-sm font-medium text-gray-700 transition hover:text-orange-500">Katalog</a>
				<a href="#aboutus" class="text-sm font-medium text-gray-700 transition hover:text-orange-500">About Us</a>
				<a href="#keranjang" class="text-sm font-medium text-gray-700 transition hover:text-orange-500">Keranjang</a>
				<a href="#kontak" class="text-sm font-medium text-gray-700 transition hover:text-orange-500">Kontak</a>
			</nav>
			<div class="hidden items-center gap-3 md:flex">
				<a href="{{ route('login') }}" class="rounded-xl px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">Masuk</a>
				<a href="{{ route('register') }}" class="rounded-xl bg-amber-950 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-700">Daftar Sekarang</a>
			</div>
		</div>
	</header>

	@include('landing.section.hero')
	@include('landing.section.buku')
	@include('user.section.aboutus')
	@include('user.section.keranjang')
	@include('user.section.kontak')
</body>

</html>
