<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">E-Commerce</h1>
            <nav class="space-x-4">
                <a href="{{ route('frontend') }}" class="text-gray-600 hover:text-gray-800">Home</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-800">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-800">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-500 text-white py-20 text-center">
        <h2 class="text-4xl font-bold mb-4">Tambahkan Produk Terbaik Untuk Anda</h2>
        <p class="text-lg mb-8">Temukan berbagai produk berkualitas dengan harga terjangkau.</p>
        <a href="#produk" class="bg-white text-blue-500 px-6 py-3 rounded-full hover:bg-gray-200">Lihat Produk</a>
    </section>

    <!-- Produk Section -->
    <section id="produk" class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold text-center mb-8">Produk Unggulan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($produk as $produk)
                <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                    @if($produk->gambar)
                        <img src="{{ asset('storage/'.$produk->gambar) }}" alt="{{ $produk->nama }}" class="w-32 h-32 object-cover mb-2 rounded">
                    @else
                        <div class="w-32 h-32 bg-gray-200 flex items-center justify-center mb-2 rounded">No Image</div>
                    @endif
                    <h3 class="font-semibold text-lg mb-1">{{ $produk->nama }}</h3>
                    <p class="text-blue-600 font-bold mb-1">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-500 mb-2">{{ $produk->kategori->nama ?? '-' }}</p>
                    <a href="#" class="mt-auto bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Detail</a>
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-500">Belum ada produk.</div>
            @endforelse
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-12">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} E-Commerce. Hak Akses Dilindumgi</p>
            <p>Designed by Miaww___7😉</p>
        </div>
</body>
</html>