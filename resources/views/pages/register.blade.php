<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - LAN-JALAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans">
    <div class="min-h-screen flex justify-center items-center px-4 py-10">
        <div class="bg-white rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.1)] border border-gray-200 p-10 w-full max-w-md">
 
            {{-- Logo --}}
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-16 mx-auto">
                <h3 class="mt-3 text-2xl font-bold text-gray-800">LAN-JALAN</h3>
                <p class="text-gray-500">Daftar Akun Baru</p>
            </div>
 
            {{-- Alert Success --}}
            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-green-800 font-bold ml-4">&times;</button>
                </div>
            @endif
 
            {{-- Alert Error --}}
            @if($errors->any())
                <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 rounded-lg">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 
            <form method="POST" action="{{ route('register.submit') }}">
                @csrf
 
                <div class="mb-4">
                    <label for="name" class="block text-sm font-bold text-gray-800 mb-1">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-gray-400
                               @error('name') border-red-400 bg-red-50 @else border-gray-200 @enderror">
                </div>
 
                <div class="mb-4">
                    <label for="email" class="block text-sm font-bold text-gray-800 mb-1">Alamat Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-gray-400
                               @error('email') border-red-400 bg-red-50 @else border-gray-200 @enderror">
                </div>
 
                <div class="mb-4">
                    <label for="password" class="block text-sm font-bold text-gray-800 mb-1">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-gray-400
                               @error('password') border-red-400 bg-red-50 @else border-gray-200 @enderror">
                    <small class="text-gray-400 text-xs mt-1 block">Minimal 6 karakter</small>
                </div>
 
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-800 mb-1">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-400">
                </div>
 
                <button type="submit"
                    class="w-full bg-gray-800 hover:bg-gray-700 text-white font-medium py-3 rounded-lg text-base transition-colors duration-200">
                    Daftar Sekarang
                </button>
 
                <div class="text-center mt-6">
                    <p class="text-gray-500">Sudah punya akun?
                        <a href="{{ route('login') }}" class="font-bold text-gray-800 hover:text-blue-600 transition-colors duration-200">
                            Login di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
 
