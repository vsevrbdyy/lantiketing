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
            {{-- Konten lain bisa ditambahkan di sini --}}
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

        <div class="relative flex items-center ml-[89px] mt-32 font-extralight text-2xl">
            <ul>
                <li class="text-white">Filter</li>
            </ul>

            <div class="w-[2px] h-12 bg-white ml-3.5"></div>

            {{-- Wrapper overflow-hidden sebagai "pintu" --}}
            <div class="overflow-hidden ml-3.5">
                <div id="filterBox"
                    class="-translate-x-full transition-all duration-700 ease-out text-white flex gap-4">

                    <div class="rounded-2xl border border-white pl-3 pr-3 pt-0.3 text-[20px]">
                        <button>Beach</button>
                    </div>
                    <div class="rounded-2xl border border-white pl-3 pr-3 pt-0.3 text-[20px]">
                        <button>Rice Field</button>
                    </div>
                    <div class="rounded-2xl border border-white pl-3 pr-3 pt-0.3 text-[20px]">
                        <button>Sunset</button>
                    </div>
                    <div class="rounded-2xl border border-white pl-3 pr-3 pt-0.3 text-[20px]">
                        <button>Temple</button>
                    </div>

                </div>
            </div>

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
    </div>

    {{-- LOOP TIKET DENGAN GRID 2 KOLOM --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mx-12 md:mx-20 lg:mx-32 xl:mx-48 mt-10">
        @forelse($tickets as $ticket)
            <div class="shadow-lg rounded-[50px] bg-white overflow-hidden flex flex-col">
                {{-- Gambar --}}
                <div class="w-full">
                    <img src="{{ $ticket->image ? asset('storage/' . $ticket->image) : asset('images/default.jpg') }}" 
                         alt="{{ $ticket->title }}" 
                         class="w-full h-64 object-cover">
                </div>

                {{-- Konten --}}
                <div class="p-6 flex-1 flex flex-col">
                    <h1 class="text-[36px] font-bold">{{ $ticket->title }}</h1>

                    <div class="flex my-2 ml-0">
                        <span class="text-black">
                            <i class="material-icons">location_on</i>
                        </span>
                        <h2 class="italic font-bold ml-1">{{ $ticket->location }}</h2>
                    </div>

                    <div class="text-justify flex-1">
                        <h3 class="leading-relaxed italic text-base">
                            {{ $ticket->description }}
                        </h3>
                    </div>

                    {{-- Tags --}}
                    <ul class="text-black flex flex-wrap ml-0 my-6 gap-2 opacity-30">
                        @foreach($ticket->tags ?? [] as $tag)
                            <li class="border px-3 py-1 rounded-3xl text-sm">{{ is_array($tag) ? ($tag['tag'] ?? '') : $tag }}</li>
                        @endforeach
                    </ul>

                    <div class="w-full h-0.5 bg-black mt-2"></div>

                    <div class="flex justify-between items-center mt-4">
                        <ul class="text-black text-[30px]">
                            <li class="text-sm">START FROM</li>
                            <li class="font-bold text-[#C89B3C]">Rp {{ number_format($ticket->price, 0, ',', '.') }}</li>
                            <li class="text-sm">/Person</li>
                        </ul>

                        <a href="{{ route('register') }}"
                           class="px-8 py-2.5 rounded-full border-2 border-white bg-gray-400 font-semibold text-black hover:bg-[#C89B3C] hover:text-black transition-all flex items-center">
                            Visit
                            <i class="material-icons ml-2 text-black">arrow_forward</i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center py-20 text-gray-500 text-xl">
                Belum ada tiket destinasi yang tersedia.
            </div>
        @endforelse
    </div>

    {{-- Pagination (tetap seperti asli, tapi nanti bisa diganti dengan links()) --}}
    <div class="flex items-center justify-center pt-11 gap-2">
        <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-300 text-gray-600 hover:bg-gray-200 transition">
            &#8249;
        </button>
        <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-gray-300 font-semibold">
            1
        </button>
        <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-300 text-gray-600 hover:bg-gray-200 transition">
            2
        </button>
        <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-300 text-gray-600 hover:bg-gray-200 transition">
            &#8250;
        </button>
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