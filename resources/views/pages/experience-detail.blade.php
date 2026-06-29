<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $ticket->description ? Str::limit($ticket->description, 160) : 'Experience Ticket - Lan-Jalan' }}">
    <title>{{ $ticket->title ?? 'Experience' }} - lan-jalan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-linear-to-r from-[#EAF1EF] to-[#FFFFFF] min-h-screen">

<div class="relative min-h-[950px]">

    {{-- Hero: gunakan gambar ticket sebagai background --}}
    @if($ticket->image)
        <img src="{{ asset('storage/' . $ticket->image) }}"
             alt="{{ $ticket->title }}"
             class="absolute inset-0 w-full object-cover z-0 h-215">
    @else
        <img src="{{ asset('images/heroexp.svg') }}"
             alt="Experience Hero"
             class="absolute inset-0 w-full object-cover z-0 h-215">
    @endif

    <img src="{{ asset('images/Rectangle heroexp.svg') }}"
         alt="Overlay"
         class="absolute inset-0 w-full h-215 object-cover z-0 opacity-65">

    {{-- Navbar --}}
    <div class="relative z-10">
        <x-navbartrans />
    </div>

    {{-- Breadcrumb --}}
    <div class="relative z-10 ml-24 mt-8">
        <nav class="flex items-center gap-2 text-white text-sm opacity-80">
            <a href="{{ route('home') }}" class="hover:text-[#FFD04D] transition-colors">Home</a>
            <span>/</span>
            <a href="{{ route('experience') }}" class="hover:text-[#FFD04D] transition-colors">Experience</a>
            <span>/</span>
            <span class="text-[#FFD04D]">{{ $ticket->title }}</span>
        </nav>
    </div>

    {{-- Hero Text --}}
    <div class="relative ml-24 mt-64">
        <ul class="flex items-center gap-3">
            <li class="list-none">
                <div class="w-10 h-0.5 bg-[#FFD04D]"></div>
            </li>
            <li class="list-none text-[#FFD04D] italic text-2xl">
                EXPERIENCE TICKET
            </li>
        </ul>

        <ul class="mt-3 ml-0">
            <li class="list-none text-white text-4xl font-bold leading-snug">
                {{ $ticket->title }}
            </li>
        </ul>

        <div class="flex items-center mt-4 ml-1 gap-2">
            <i class="material-icons text-white text-base">location_on</i>
            <span class="text-white font-extralight text-lg">{{ $ticket->location }}</span>
        </div>
    </div>

</div>

{{-- ===================== DETAIL CONTENT ===================== --}}
<div class="mx-12 md:mx-20 lg:mx-32 xl:mx-48 mt-10 mb-16">

    <div class="bg-white shadow-lg rounded-[40px] overflow-hidden">

        {{-- Gambar utama --}}
        <div class="w-full h-[420px]">
            <img src="{{ $ticket->image ? asset('storage/' . $ticket->image) : asset('images/default.jpg') }}"
                 alt="{{ $ticket->title }}"
                 class="w-full h-full object-cover">
        </div>

        <div class="p-10">

            {{-- Tags --}}
            @if(!empty($ticket->tags))
                <ul class="flex flex-wrap gap-2 mb-6">
                    @foreach($ticket->tags as $tag)
                        <li class="border border-[#C89B3C] px-4 py-1 rounded-3xl text-sm text-[#C89B3C]">
                            {{ is_array($tag) ? ($tag['tag'] ?? '') : $tag }}
                        </li>
                    @endforeach
                </ul>
            @endif

            {{-- Judul & Lokasi --}}
            <h1 class="text-[42px] font-bold mb-2">{{ $ticket->title }}</h1>
            <div class="flex items-center gap-1 mb-6">
                <i class="material-icons text-gray-600">location_on</i>
                <span class="italic font-semibold text-gray-700">{{ $ticket->location }}</span>
            </div>

            {{-- Divider --}}
            <div class="w-full h-0.5 bg-gray-200 mb-6"></div>

            {{-- Deskripsi --}}
            <div class="prose max-w-none text-gray-700 leading-relaxed text-base italic mb-8">
                {{ $ticket->description }}
            </div>

            {{-- Harga & Tombol --}}
            <div class="w-full h-0.5 bg-black mb-6"></div>
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">START FROM</p>
                    <p class="font-bold text-[#C89B3C] text-3xl">Rp {{ number_format($ticket->price ?? 0, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-500">/Person</p>
                </div>

                <div class="flex gap-4">
                    <a href="{{ route('experience') }}"
                       class="px-8 py-3 rounded-full border-2 border-gray-400 font-semibold text-gray-600 hover:bg-gray-100 transition-all flex items-center gap-2">
                        <i class="material-icons text-base">arrow_back</i>
                        Back
                    </a>
                    <a href="{{ route('app') }}"
                       class="px-8 py-3 rounded-full border-2 border-white bg-[#C89B3C] font-semibold text-white hover:bg-[#a07830] transition-all flex items-center gap-2">
                        Book Now
                        <i class="material-icons text-base">confirmation_number</i>
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- ===================== RELATED ITEMS ===================== --}}
    @if($related->count() > 0)
        <div class="mt-16">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-0.5 bg-[#C89B3C]"></div>
                <h2 class="text-2xl font-bold italic">Other Experiences</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($related as $item)
                    <div class="shadow-lg rounded-[50px] bg-white overflow-hidden flex flex-col hover:shadow-xl transition-shadow duration-300">
                        <div class="w-full">
                            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/default.jpg') }}"
                                 alt="{{ $item->title }}"
                                 class="w-full h-48 object-cover">
                        </div>
                        <div class="p-5 flex-1 flex flex-col">
                            <h3 class="text-xl font-bold mb-1">{{ $item->title }}</h3>
                            <div class="flex items-center gap-1 mb-2">
                                <i class="material-icons text-sm">location_on</i>
                                <span class="italic text-sm text-gray-600">{{ $item->location }}</span>
                            </div>
                            <p class="text-sm italic text-gray-600 line-clamp-2 flex-1">{{ $item->description }}</p>
                            <div class="w-full h-0.5 bg-black mt-4 mb-3"></div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xs">START FROM</p>
                                    <p class="font-bold text-[#C89B3C]">Rp {{ number_format($item->price ?? 0, 0, ',', '.') }}</p>
                                </div>
                                @if($item->slug)
                                    <a href="{{ route('experience.show', $item->slug) }}"
                                       class="px-4 py-2 rounded-full bg-gray-400 font-semibold text-black text-sm hover:bg-[#C89B3C] transition-all flex items-center gap-1">
                                        Visit <i class="material-icons text-sm">arrow_forward</i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</div>
{{-- =================== END DETAIL CONTENT =================== --}}

<x-footer />

</body>
</html>
