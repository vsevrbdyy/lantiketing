<div class="w-full">
    <nav class="mx-auto bg-[#AAB5B7]/20 px-8 py-5 shadow-md">
       <div class="flex items-center justify-between max-w-430 mx-auto">

            <div class="bg-transparent">
                <img src="{{ asset('images/logo.svg') }}" 
                     alt="Lan-Jalan Logo"
                     class="invert">
            </div>

            <ul class="flex items-center gap-10 text-base font-semibold text-white">
                
                <li>
                    <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Home</a>
                </li>

                <li class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button 
                        @click="open = !open"
                        class="inline-flex items-center gap-1 hover:text-blue-600 transition-colors">
                        Our Services
                        <svg :class="open ? 'rotate-180' : ''" 
                            class="w-4 h-4 transition-transform" 
                            fill="none" 
                            stroke="currentColor" 
                            stroke-width="3" 
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div 
                        x-show="open"
                        x-transition
                        class="absolute left-0 mt-3 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50">
                        <a href="{{ route('experience') }}" class="block px-6 py-3 hover:bg-gray-50 text-black text-sm">Experience Ticket</a>
                        <a href="{{ route('destination') }}" class="block px-6 py-3 hover:bg-gray-50 text-black text-sm">Destination Ticket</a>
                        <a href="{{ route('daytourpack') }}" class="block px-6 py-3 hover:bg-gray-50 text-black text-sm">Day Tour Package</a>
                    </div>
                </li>

                <li>
                    <a href="{{ route('contact') }}" class="hover:text-blue-600 transition-colors">Contact us</a>
                </li>

                @if(Auth::check())
                    <li class="font-medium">{{ Auth::user()->name }}</li>
                    <li>
                        <button onclick="showLogoutPopup()" 
                                class="px-6 py-2 rounded-full border border-gray-300 hover:border-red-500 hover:text-red-600 transition-colors">
                            Logout
                        </button>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" 
                        class="hover:text-blue-600 transition-colors">
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" 
                        class="px-6 py-2.5 rounded-full border-2 border-white font-semibold hover:bg-white hover:text-gray-900 transition-all">
                            Sign up
                        </a>
                    </li>
                @endif

            </ul>
        </div>
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