<div class="w-full px-4 py-2 border-b-8 border-gray-200 shadow-xl">
    <nav class="flex justify-start gap-32 items-center mx-auto max-w-7xl">

        <div class="bg-transparent">
            <img src="{{ asset('images/logo.svg') }}" alt="Lan-Jalan Logo">
        </div>

        <ul class="font-bold flex gap-8 items-center list-none m-0 p-0">

            <li class="m-0">
                <a href="/" class="no-underline text-black hover:text-blue-600 transition-colors">Home</a>
            </li>

            <li class="m-0" x-data="{ open: false }" @click.outside="open = false">
                <button
                    @click="open = !open"
                    class="inline-flex items-center gap-1 font-bold cursor-pointer bg-transparent border-none p-0 text-black hover:text-blue-600 transition-colors"
                >Online Ticket
                    <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" />
                    </svg>
                </button>
                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute mt-2 w-56 origin-top-left rounded-md bg-gray-800 shadow-lg z-50"
                >
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white transition-colors no-underline">Tiket Masuk</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white transition-colors no-underline">Tiket Wahana</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white transition-colors no-underline">Paket Bundling</a>
                    </div>
                </div>
            </li>

            <li class="m-0 relative" x-data="{ open: false }" @click.outside="open = false">
                <button
                    @click="open = !open"
                    class="inline-flex items-center gap-1 font-bold cursor-pointer bg-transparent border-none p-0 text-black hover:text-blue-600 transition-colors"
                >Booking Tiket
                    <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" />
                    </svg>
                </button>
                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute mt-2 w-56 origin-top-left rounded-md bg-gray-800 shadow-lg z-50"
                >
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white transition-colors no-underline">Hotel</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white transition-colors no-underline">Transportasi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/10 hover:text-white transition-colors no-underline">Paket Wisata</a>
                    </div>
                </div>
            </li>

            <li class="m-0">
                <a href="/contact" class="no-underline text-black hover:text-blue-600 transition-colors">Contact us</a>
            </li>

            @if(Auth::check())
                <li class="m-0 text-black">{{ Auth::user()->name }}</li>
                <li class="m-0">
                    <button
                        onclick="showLogoutPopup()"
                        class="px-5 py-2 rounded-lg border border-gray-300 font-medium text-black bg-transparent cursor-pointer hover:border-blue-600 hover:text-blue-600 transition-colors"
                    >
                        Logout
                    </button>
                </li>
            @else
                <li class="m-0">
                    <a href="{{ route('login') }}" class="no-underline text-black hover:text-blue-600 transition-colors">Login</a>
                </li>
                <li class="m-0">
                    <a href="{{ route('register') }}" class="px-5 py-2 rounded-lg border-2 border-black font-medium text-black no-underline hover:border-blue-600 hover:text-blue-600 transition-colors">
                        Sign Up
                    </a>
                </li>
            @endif

        </ul>
    </nav>
</div>

<script>
function showLogoutPopup() {
    const popup = document.createElement('div');
    popup.className = 'fixed inset-0 bg-black/50 flex justify-center items-center z-[9999]';
    popup.innerHTML = `
        <div class="bg-white px-10 py-8 rounded-xl text-center shadow-2xl">
            <h3 class="text-gray-800 text-lg font-semibold mb-2">Yakin ingin keluar?</h3>
            <p class="text-gray-500 mb-6">Anda akan keluar dari akun ini.</p>
            <div class="flex gap-4 justify-center">
                <button onclick="this.closest('.fixed').remove()"
                    class="bg-gray-400 text-white border-none px-6 py-2 rounded-md cursor-pointer hover:bg-gray-500 transition-colors">
                    Batal
                </button>
                <button onclick="document.getElementById('logoutForm').submit()"
                    class="bg-gray-800 text-white border-none px-6 py-2 rounded-md cursor-pointer hover:bg-gray-900 transition-colors">
                    Ya
                </button>
            </div>
        </div>
    `;
    document.body.appendChild(popup);
}
</script>

<form method="POST" action="{{ route('logout') }}" id="logoutForm" class="hidden">
    @csrf
</form>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>