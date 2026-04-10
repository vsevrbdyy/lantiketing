<div class="w-full px-4 py-2 border-b-8 border-gray-200 shadow-xl">
    <nav class="flex justify-between items-center mx-auto max-w-7xl">
       <div class="bg-transparent">
            <img src="{{ asset('images/logo.svg') }}" alt="Lan-Jalan Logo">
    </div>
        
        <ul class="font-bold flex gap-6 cursor-pointer items-center" style="gap: 30px; margin: 0; padding: 0;">
    <li style="margin: 0;">Home</li>
    <li style="margin: 0;">
        <el-dropdown class="inline-block" trigger="click">
            <button class="inline-flex w-full justify-center gap-x-1.5 cursor-pointer">Online Ticket
                <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="-mr-1 size-5 text-gray-400">
                    <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                </svg>
            </button>
            <el-menu anchor="bottom end" popover class="w-56 origin-top-right rounded-md bg-gray-800 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">Account settings</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">Support</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">License</a>
                </div>
            </el-menu>
        </el-dropdown>
    </li>
    <li style="margin: 0;">
        <el-dropdown class="inline-block" trigger="click">
            <button class="inline-flex w-full justify-center gap-x-1.5 cursor-pointer">Booking Ticket
                <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="-mr-1 size-5 text-gray-400">
                    <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                </svg>
            </button>
            <el-menu anchor="bottom end" popover class="w-56 origin-top-right rounded-md bg-gray-800 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">Account settings</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">Support</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">License</a>
                </div>
            </el-menu>
        </el-dropdown>
    </li>
    <li style="margin: 0;"><a href="/contact" class="cursor-pointer no-underline">Contact us</a></li>
    
    @if(Auth::check())
        <li style="margin: 0; color: black;">{{ Auth::user()->name }}</li>
        <li style="margin: 0;">
            <button onclick="showLogoutPopup()" class="outline px-5 py-2 rounded-md font-medium cursor-pointer no-underline" style="background: transparent; border: 1px solid #d1d5db; color: black; border-radius: 8px;">
                Logout
            </button>
        </li>
    @else
        <li style="margin: 0;"><a href="{{ route('login') }}" class="cursor-pointer no-underline">Login</a></li>
        <li style="margin: 0;">
            <a href="{{ route('register') }}" class="outline px-5 py-2 rounded-md font-medium cursor-pointer no-underline" style="border-radius: 8px;">Sign Up</a>
        </li>
    @endif
</ul>
    </nav>
</div>

<script>
function showLogoutPopup() {
    const popup = document.createElement('div');
    popup.innerHTML = `
        <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); display: flex; justify-content: center; align-items: center; z-index: 9999;">
            <div style="background: white; padding: 30px 40px; border-radius: 12px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                <h3 style="color: #1f2937; margin-bottom: 10px;">Yakin ingin keluar?</h3>
                <p style="color: #6b7280; margin-bottom: 25px;">Anda akan keluar dari akun ini.</p>
                <div style="display: flex; gap: 15px; justify-content: center;">
                    <button onclick="this.parentElement.parentElement.parentElement.remove();" style="background: #9ca3af; color: white; border: none; padding: 8px 25px; border-radius: 6px; cursor: pointer;">Batal</button>
                    <button onclick="document.getElementById('logoutForm').submit();" style="background: #1f2937; color: white; border: none; padding: 8px 25px; border-radius: 6px; cursor: pointer;">Ya</button>
                </div>
            </div>
        </div>
    `;
    document.body.appendChild(popup);
}
</script>

<form method="POST" action="{{ route('logout') }}" id="logoutForm" style="display: none;">
    @csrf
</form>

<style>
    nav ul {
        display: flex;
        align-items: center;
        margin: 0;
        padding: 0;
    }
    nav ul li {
        display: flex;
        align-items: center;
    }
    nav ul li a, nav div a, nav ul li button.outline {
        text-decoration: none !important;
    }
    nav ul li a:hover {
        color: #2563eb !important;
    }
    .outline {
        border: 1px solid #d1d5db;
        text-decoration: none !important;
        border-radius: 8px;
    }
    .outline:hover {
        border-color: #2563eb !important;
        color: #2563eb !important;
    }
    nav ul li button.outline:hover {
        border-color: #2563eb !important;
        color: #2563eb !important;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>