<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ticket->title ?? 'Detail Destinasi' }} - LAN-JALAN</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-gradient {
            background: linear-gradient(135deg, rgba(0,0,0,0.4), rgba(0,0,0,0.1));
        }
        .card-hover:hover {
            transform: translateY(-4px);
            transition: all 0.3s ease;
        }
        .navbar-blur {
            background: rgba(170, 181, 183, 0.20);
            backdrop-filter: blur(7.5px);
            -webkit-backdrop-filter: blur(7.5px);
        }
    </style>
</head>
<body>

    {{-- HERO --}}
<div class="relative min-h-[550px] items-center overflow-hidden">
    @if($ticket->image)
        <img src="{{ asset('storage/' . $ticket->image) }}" alt="Background" class="absolute inset-0 w-full h-full object-cover blur-sm scale-105">
    @else
        <img src="{{ asset('images/heroexp.svg') }}" alt="Background" class="absolute inset-0 w-full h-full object-cover blur-sm scale-105">
    @endif
    <div class="relative z-20">
            <x-navbartrans />
        </div>
    <div class="absolute inset-0 hero-gradient"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                @if($ticket->image)
                    <img src="{{ asset('storage/' . $ticket->image) }}" alt="{{ $ticket->title }}" class="w-full rounded-3xl shadow-2xl">
                @else
                    <img src="{{ asset('images/heroexp.svg') }}" alt="Hero" class="w-full rounded-3xl shadow-2xl">
                @endif
            </div>

            <div class="text-white">
                {{-- HANYA 1 JUDUL --}}
                <h1 class="text-5xl font-extrabold">{{ $ticket->title }}</h1>
                
                {{-- Lokasi dengan icon --}}
                <p class="text-white/80 text-sm mt-4 flex items-start gap-2">
                    <i class="ti ti-map-pin"></i>
                    <span>{{ $ticket->location }}</span>
                </p>
                <hr class="my-6 border-white/30">
               <div class="bg-white/10 backdrop-blur-md rounded-xl border border-white/20 p-5 inline-block">
                    <p class="text-sm text-white font-medium">Per Person</p>
                    <p class="text-4xl font-bold text-[#FFD700]">Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                </div>
              <a href="{{ route('booking.create', $ticket->slug) }}" class="inline-block mt-6 bg-[#00A6FF] text-white px-8 py-3 rounded-xl hover:bg-blue-600 transition font-medium">
                Book Now
            </a>
            </div>
        </div>
    </div>
</div>

    {{-- DESKRIPSI & PAKET --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold text-black">Description</h3>
                <p class="text-gray-700 leading-relaxed mt-4">{{ $ticket->description }}</p>

                @if($ticket->deskripsi_panjang)
                    <div class="text-gray-700 leading-relaxed prose max-w-none mt-4">
                        {!! $ticket->deskripsi_panjang !!}
                    </div>
                @endif
            </div>

            <div>
                <h3 class="text-2xl font-bold text-black mb-6">Paket & Aktivitas</h3>
                <div class="space-y-4">
                    @foreach($ticket->paket as $paket)
                        <div class="bg-white rounded-xl shadow-md p-5 border border-gray-100 card-hover">
    {{-- TAMPILKAN GAMBAR PAKET --}}
                    @if($paket->image)
                    <img src="{{ asset('storage/' . $paket->image) }}" 
                         alt="{{ $paket->nama }}" 
                         class="w-full h-48 object-cover rounded-lg mb-4">
                        @endif
                            <h4 class="font-bold text-black text-lg">{{ $paket->nama }}</h4>
                            <div class="text-gray-600 text-sm mt-2">{!! $paket->deskripsi !!}</div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="text-sm text-gray-500">Price Per Person</span>
                                <span class="font-bold text-[#C89B3C]">Rp {{ number_format($paket->harga, 0, ',', '.') }}</span>
                            </div>
                           <a href="{{ route('booking.create', $ticket->slug) }}" class="inline-block mt-3 bg-[#00A6FF] text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition text-sm">
                            Book
                        </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- LOCATION & MAPS --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <h3 class="text-2xl font-bold text-black mb-6">Location</h3>
        <div class="relative rounded-xl overflow-hidden shadow-lg">
            @if($ticket->map_embed_url)
                <div class="w-full h-[450px]">
                    {!! $ticket->map_embed_url !!}
                </div>
            @else
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31545.89426996993!2d115.511040!3d-8.710180!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23d7a0d4d7f9f%3A0x9e8b3f9a8e6f6f6f!2sNusa%20Penida!5e0!3m2!1sid!2sid!4v1700000000000"
                    class="w-full h-[450px] border-0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            @endif

            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-white to-transparent p-6">
                <div class="flex items-center gap-3">
                    <i class="ti ti-map-pin text-xl text-[#00A6FF]"></i>
                    <p class="font-bold text-black">{{ $ticket->map_location_text ?? $ticket->location }}</p>
                    <a href="https://www.google.com/maps/search/{{ urlencode($ticket->location) }}" target="_blank" class="ml-auto bg-[#00A6FF] text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                        Open On Maps
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- YOU MAY LIKE --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <h3 class="text-2xl font-bold text-black mb-6">You May Like</h3>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            @php
                $experiences = App\Models\ExperienceTicket::where('is_active', true)
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
            @endphp

            @forelse($experiences as $exp)
                <a href="{{ route('experience.show', $exp->slug ?? $exp->id) }}" class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition card-hover block">
                    <img src="{{ asset('storage/' . $exp->image) }}" class="w-full h-28 object-cover">
                    <div class="p-3">
                        <h4 class="font-bold text-black text-sm">{{ $exp->title }}</h4>
                        <p class="text-gray-400 text-xs italic">{{ $exp->location }}</p>
                        <hr class="my-2 border-gray-200">
                        <p class="text-xs text-gray-500">START FROM</p>
                        <p class="font-bold text-[#C89B3C] text-sm">Rp {{ number_format($exp->price, 0, ',', '.') }}</p>
                        <p class="text-xs text-gray-500">/Person</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-400">No experiences available</p>
            @endforelse
        </div>
    </div>

    <x-footer />

    {{-- SCRIPTS --}}
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        });
    </script>

</body>
</html>