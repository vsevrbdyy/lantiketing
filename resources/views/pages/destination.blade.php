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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-linear-to-r from-[#EAF1EF] to-[#FFFFFF] min-h-screen">
    
    <div class="relative min-h-[950px]">
    {{-- Gambar sebagai background di belakang --}}
        
        <img src="{{ asset('images/herodes.svg') }}" 
            alt="herodes"
            class="absolute inset-0 w-full object-cover z-0 h-215">

        <img src="{{ asset('images/Rectangle herodes.svg') }}" 
            alt="Rectangle Herodes"
            class="absolute inset-0 w-full h-215 object-cover z-0 opacity-55">
            
        {{-- Konten di depan gambar --}}
        <div class="relative z-10">
            <x-navbartrans />
        </div>

        <div class="relative ml-24 mt-80">

            <ul class="flex items-center gap-3">
                <li class="list-none">
                    <div class="w-10 h-0.5 bg-[#FFD04D]"></div>
                </li>

                <li class="list-none text-[#FFD04D] italic text-2xl">
                    DESTINATION TICKET
                </li>
            </ul>

            <ul class="mt-3 ml-0">
                <li class="list-none text-white text-lg italic leading-snug">
                    Explore Bali<br>
                    Finest Destination
                </li>
            </ul>

            <ul class="mt-4 ml-8">
                <li class="list-none text-white font-extralight text-lg leading-relaxed">
                    Discover unforgettable experiences in iconic Bali destinations.<br>
                    Book your tickets now.
                </li>
            </ul>

        </div>

        {{-- ===================== FILTER BAR ===================== --}}
        <div class="relative flex items-center ml-[89px] mt-32 font-extralight text-2xl">
            <ul>
                <li class="text-white">Filter</li>
            </ul>

            <div class="w-[2px] h-12 bg-white ml-3.5"></div>

            {{-- Wrapper overflow-hidden sebagai "pintu" animasi slide --}}
            <div class="overflow-hidden ml-3.5">
                <div id="filterBox"
                    class="-translate-x-full transition-all duration-700 ease-out text-white flex gap-4">

                    {{-- ALL --}}
                    <a href="{{ route('destination') }}"
                       class="rounded-2xl border border-white pl-3 pr-3 pt-0.3 text-[20px] transition-colors
                              {{ !$category ? 'bg-[#FFD04D] text-[#1A2A44] border-[#FFD04D] font-semibold' : 'hover:bg-white/20' }}">
                        All
                    </a>

                    {{-- BEACH --}}
                    <a href="{{ route('destination', ['category' => 'beach']) }}"
                       class="rounded-2xl border border-white pl-3 pr-3 pt-0.3 text-[20px] transition-colors
                              {{ $category === 'beach' ? 'bg-[#FFD04D] text-[#1A2A44] border-[#FFD04D] font-semibold' : 'hover:bg-white/20' }}">
                        Beach
                    </a>

                    {{-- RICE FIELD --}}
                    <a href="{{ route('destination', ['category' => 'rice field']) }}"
                       class="rounded-2xl border border-white pl-3 pr-3 pt-0.3 text-[20px] transition-colors
                              {{ $category === 'rice field' ? 'bg-[#FFD04D] text-[#1A2A44] border-[#FFD04D] font-semibold' : 'hover:bg-white/20' }}">
                        Rice Field
                    </a>

                    {{-- SUNSET --}}
                    <a href="{{ route('destination', ['category' => 'sunset']) }}"
                       class="rounded-2xl border border-white pl-3 pr-3 pt-0.3 text-[20px] transition-colors
                              {{ $category === 'sunset' ? 'bg-[#FFD04D] text-[#1A2A44] border-[#FFD04D] font-semibold' : 'hover:bg-white/20' }}">
                        Sunset
                    </a>

                    {{-- TEMPLE --}}
                    <a href="{{ route('destination', ['category' => 'temple']) }}"
                       class="rounded-2xl border border-white pl-3 pr-3 pt-0.3 text-[20px] transition-colors
                              {{ $category === 'temple' ? 'bg-[#FFD04D] text-[#1A2A44] border-[#FFD04D] font-semibold' : 'hover:bg-white/20' }}">
                        Temple
                    </a>

                </div>
            </div>

            {{-- Search bar (dipertahankan seperti asli) --}}
            <div class="flex rounded-full border-white border ml-[900px] bg-[#D9D9D9]">
                <button>
                    <span class="w-auto flex justify-end items-center text-[#1A2A44] p-2">
                        <i class="material-icons text-3xl">search</i>
                    </span>
                </button>
                <input class="w-44 rounded mr-4 text-[#000000] text-center" 
                       type="text"
                       placeholder="Search...">
            </div>
        </div>
        {{-- =================== END FILTER BAR =================== --}}

    </div>

    {{-- ===================== GRID TIKET ===================== --}}
    <div class="mx-12 md:mx-20 lg:mx-32 xl:mx-48 mt-10">

        @forelse($tickets as $index => $ticket)

            {{-- ===== FEATURED CARD (tiket pertama di setiap halaman) ===== --}}
            @if($index === 0)
                <div class="shadow-lg rounded-[40px] bg-white overflow-hidden flex flex-row mb-10 min-h-[280px]">

                    {{-- Gambar kiri --}}
                    <div class="w-[38%] flex-shrink-0">
                        <img src="{{ $ticket->image ? asset('storage/' . $ticket->image) : asset('images/default.jpg') }}"
                             alt="{{ $ticket->title }}"
                             class="w-full h-full object-cover">
                    </div>

                    {{-- Konten kanan --}}
                    <div class="p-8 flex-1 flex flex-col justify-between">
                        <div>
                            <h1 class="text-[38px] font-bold tracking-wide">{{ $ticket->title }}</h1>

                            <div class="flex items-center my-2">
                                <span class="text-black"><i class="material-icons text-base">location_on</i></span>
                                <h2 class="italic font-bold ml-1 text-sm">{{ $ticket->location }}</h2>
                            </div>

                            <p class="text-justify italic text-sm leading-relaxed text-gray-700 mt-2 line-clamp-4">
                                {{ $ticket->description }}
                            </p>

                            {{-- Tags --}}
                            <ul class="flex flex-wrap gap-2 mt-4 opacity-30">
                                @foreach($ticket->tags ?? [] as $tag)
                                    <li class="border border-black px-3 py-0.5 rounded-3xl text-xs">{{ is_array($tag) ? ($tag['tag'] ?? '') : $tag }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div>
                            <div class="w-full h-0.5 bg-black mt-4 mb-4"></div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xs">START FROM</p>
                                    <p class="font-bold text-[#C89B3C] text-2xl">Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                                    <p class="text-xs">/Person</p>
                                </div>
                                <a href="{{ route('destinasi.show', $ticket->slug) }}"
                                   class="px-8 py-2.5 rounded-full border-2 border-white bg-gray-400 font-semibold text-black hover:bg-[#C89B3C] hover:text-black transition-all flex items-center">
                                    Visit
                                    <i class="material-icons ml-2 text-black text-base">arrow_forward</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            {{-- ===== REGULAR GRID: buka wrapper grid sebelum kartu kedua ===== --}}
            @elseif($index === 1)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    {{-- Kartu kedua dan seterusnya masuk ke sini --}}
                    <div class="shadow-lg rounded-[50px] bg-white overflow-hidden flex flex-col">
                        <div class="w-full">
                            <img src="{{ $ticket->image ? asset('storage/' . $ticket->image) : asset('images/default.jpg') }}"
                                 alt="{{ $ticket->title }}"
                                 class="w-full h-64 object-cover">
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h1 class="text-[32px] font-bold">{{ $ticket->title }}</h1>
                            <div class="flex items-center my-2">
                                <span class="text-black"><i class="material-icons">location_on</i></span>
                                <h2 class="italic font-bold ml-1">{{ $ticket->location }}</h2>
                            </div>
                            <p class="text-justify italic text-base leading-relaxed flex-1">{{ $ticket->description }}</p>
                            <ul class="flex flex-wrap gap-2 my-6 opacity-30">
                                @foreach($ticket->tags ?? [] as $tag)
                                    <li class="border px-3 py-1 rounded-3xl text-sm">{{ is_array($tag) ? ($tag['tag'] ?? '') : $tag }}</li>
                                @endforeach
                            </ul>
                            <div class="w-full h-0.5 bg-black mt-2"></div>
                            <div class="flex justify-between items-center mt-4">
                                <div>
                                    <p class="text-sm">START FROM</p>
                                    <p class="font-bold text-[#C89B3C] text-2xl">Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                                    <p class="text-sm">/Person</p>
                                </div>
                                <a href="{{ route('destinasi.show', $ticket->slug) }}"
                                   class="px-8 py-2.5 rounded-full border-2 border-white bg-gray-400 font-semibold text-black hover:bg-[#C89B3C] hover:text-black transition-all flex items-center">
                                    Visit
                                    <i class="material-icons ml-2 text-black">arrow_forward</i>
                                </a>
                            </div>
                        </div>
                    </div>

            {{-- ===== KARTU KE-3 DAN SETERUSNYA (tetap di dalam grid) ===== --}}
            @else
                    <div class="shadow-lg rounded-[50px] bg-white overflow-hidden flex flex-col">
                        <div class="w-full">
                            <img src="{{ $ticket->image ? asset('storage/' . $ticket->image) : asset('images/default.jpg') }}"
                                 alt="{{ $ticket->title }}"
                                 class="w-full h-64 object-cover">
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h1 class="text-[32px] font-bold">{{ $ticket->title }}</h1>
                            <div class="flex items-center my-2">
                                <span class="text-black"><i class="material-icons">location_on</i></span>
                                <h2 class="italic font-bold ml-1">{{ $ticket->location }}</h2>
                            </div>
                            <p class="text-justify italic text-base leading-relaxed flex-1">{{ $ticket->description }}</p>
                            <ul class="flex flex-wrap gap-2 my-6 opacity-30">
                                @foreach($ticket->tags ?? [] as $tag)
                                    <li class="border px-3 py-1 rounded-3xl text-sm">{{ is_array($tag) ? ($tag['tag'] ?? '') : $tag }}</li>
                                @endforeach
                            </ul>
                            <div class="w-full h-0.5 bg-black mt-2"></div>
                            <div class="flex justify-between items-center mt-4">
                                <div>
                                    <p class="text-sm">START FROM</p>
                                    <p class="font-bold text-[#C89B3C] text-2xl">Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                                    <p class="text-sm">/Person</p>
                                </div>
                                <a href="{{ route('destinasi.show', $ticket->slug) }}"
                                   class="px-8 py-2.5 rounded-full border-2 border-white bg-gray-400 font-semibold text-black hover:bg-[#C89B3C] hover:text-black transition-all flex items-center">
                                    Visit
                                    <i class="material-icons ml-2 text-black">arrow_forward</i>
                                </a>
                            </div>
                        </div>
                    </div>
            @endif

        @empty
            <div class="col-span-2 text-center py-20 text-gray-500 text-xl">
                @if($category)
                    Tidak ada tiket dengan kategori <strong>{{ ucwords($category) }}</strong>.
                @else
                    Belum ada tiket destinasi yang tersedia.
                @endif
            </div>
        @endforelse

        {{-- Tutup div grid jika ada lebih dari 1 tiket --}}
        @if($tickets->count() > 1)
            </div>
        @endif

    </div>
    {{-- =================== END GRID TIKET =================== --}}

    {{-- Pagination — tetap mempertahankan query string kategori --}}
    <div class="flex items-center justify-center pt-11 gap-2">
        {{ $tickets->appends(request()->query())->links() }}
    </div>

    <x-footer />
</body>

<script>
    window.addEventListener("load", () => {
        requestAnimationFrame(() => {
            document.getElementById("filterBox").classList.remove("-translate-x-full");
        });
    });
</script>
