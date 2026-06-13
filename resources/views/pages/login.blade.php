<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lan-Jalan Ticket Online - Booking Tiket Wisata Bali">
    <title>lan-jalan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-linear-to-r from-[#EAF1EF] to-[#FFFFFF] min-h-screen">
    <div class="min-h-screen flex justify-center items-center px-4">
        <div class="bg-white rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.1)] border border-gray-200 p-10 w-full max-w-md">
 
            {{-- Logo --}}
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-16 mx-auto">
                <h3 class="mt-3 text-2xl font-bold text-gray-800">LAN-JALAN</h3>
                <p class="text-gray-500">Login ke Akun Anda</p>
            </div>
 
            {{-- Alert Error --}}
            @if(session('error'))
                <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif
 
            {{-- Alert Success --}}
            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
 
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
 
                <div class="mb-4">
                    <label for="email" class="block text-sm font-bold text-gray-800 mb-1">Alamat Email</label>
                    <input type="email" id="email" name="email" required autofocus
                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-400">
                </div>
 
                <div class="mb-6">
                    <label for="password" class="block text-sm font-bold text-gray-800 mb-1">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-400">
                </div>
 
                <button type="submit"
                    class="w-full bg-gray-800 hover:bg-gray-700 text-white font-medium py-3 rounded-lg text-base transition-colors duration-200">
                    Login
                </button>
 
                <div class="text-center mt-6">
                    <p class="text-gray-500">Belum punya akun?
                        <a href="{{ route('register') }}" class="font-bold text-gray-800 hover:text-blue-600 transition-colors duration-200">
                            Daftar di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
 
