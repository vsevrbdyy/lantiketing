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
        
        <img src="{{ asset('images/heroexp.svg') }}" 
            alt="herodes"
            class="absolute inset-0 w-full object-cover z-0 h-215">

        <img src="{{ asset('images/Rectangle heroexp.svg') }}" 
            alt="Rectangle Herodes"
            class="absolute inset-0 w-full h-215 object-cover z-0 opacity-65">
            
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
                    EXPERIENCE TICKET
                </li>
            </ul>

            <ul class="mt-3 ml-0">
                <li class="list-none text-white text-lg italic leading-snug">
                    Discover Extraordinary<br>
                    Experiences
                </li>
            </ul>

            <ul class="mt-4 ml-8">
                <li class="list-none text-white font-extralight text-lg leading-relaxed">
                    Explore handpicked local experiences and iconic destinations<br>
                    across Bali. 
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

    <div class="shadow-lg mb-13.5 mx-80 rounded-[50px] bg-white flex">
        <div>
            <img src="{{ asset('images/snorkling.svg') }}" alt="Snorkling">
        </div>

        <div class="p-12">
            <h1 class="font-extrabold text-[40px]">SNORKELING</h1>

            <div class="flex my-3 ml-7">
                <span class="text-black">
                    <i class="material-icons">location_on</i>
                </span>

                <h2 class="italic font-bold">Nusa Penida, Klungkung, Bali</h2>
            </div>

            <div class="text-justify max-w-xl ml-7">
                <h3 class="leading-relaxed italic">
                    Explore the breathtaking marine life of Nusa Penida. Swim with giant
                    Manta Rays, discover pristine coral reefs at Crystal Bay, and enjoy a
                    hassle-free trip with all equipment and boat transfers included.
                </h3>
            </div>

            <ul class="text-black flex ml-7 my-8 gap-3 opacity-30">
                <li class="border px-3 py-1 rounded-3xl">Manta Ray Encounter</li>
                <li class="border px-3 py-1 rounded-3xl">Underwater Photography</li>
                <li class="border px-3 py-1 rounded-3xl">Top Rated</li>
            </ul>

            <div class="w-full h-0.5 bg-black mt-6"></div>
            
            <div class="flex">
                <ul class="text-black mt-8 text-[30px]">
                    <li>START FROM</li>
                    <li class="font-bold text-[#C89B3C]">Rp 200.000</li>
                    <li>/Person</li>
                </ul>

                <ul>
                    <li class="ml-[200px] mt-20">
                        <a href="{{ route('register') }}"
                        class="px-14 py-2.5 rounded-full border-2 border-white bg-gray-400 font-semibold text-black hover:bg-[#C89B3C] hover:text-black transition-all flex items-center">
                            Visit

                            <i class="material-icons ml-[20px] text-black">arrow_forward</i>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="flex justify-center gap-10.25">
        <div class="shadow-lg rounded-[50px] bg-white">
            <div>
                <img src="{{ asset('images/horse ride.svg') }}" alt="horse ride">
            </div>

            <h1 class="text-[36px] font-bold ml-7">HORSE RIDING</h1>

            <div class="flex ml-7">
                <span class="text-black">
                    <i class="material-icons">location_on</i>
                </span>

                <h2 class="italic font-bold">Seminyak, Badung, Bali</h2>
            </div>

            <div class="text-justify max-w-xl px-14">
                <h3 class="leading-relaxed italic">
                    Experience the magic of Bali with a breathtaking horseback
                    ride along the golden sands of Seminyak Beach. Feel the
                    sea breeze and listen to the crashing waves as you ride
                    into the stunning sunset. 
                </h3>
            </div>

            <ul class="text-black flex ml-14 my-8 gap-3 opacity-30">
                <li class="border px-3 py-1 rounded-3xl">Sunset Ride</li>
                <li class="border px-3 py-1 rounded-3xl">Beachfront Tail</li>
                <li class="border px-3 py-1 rounded-3xl">Professional Guide</li>
            </ul>

            <div class="w-[100] h-0.5 bg-black mt-6 mx-8"></div>

            <div class="flex mb-11 ml-8">
                <ul class="text-black mt-8 text-[30px]">
                    <li>START FROM</li>
                    <li class="font-bold text-[#C89B3C]">Rp 250.000</li>
                    <li>/Person</li>
                </ul>

                <ul>
                    <li class="ml-[200px] mt-20">
                        <a href="{{ route('register') }}"
                        class="px-14 py-2.5 rounded-full border-2 border-white bg-gray-400 font-semibold text-black hover:bg-[#C89B3C] hover:text-black transition-all flex items-center">
                            Visit

                            <i class="material-icons ml-[20px] text-black">arrow_forward</i>

                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="shadow-lg rounded-[50px] bg-white">
            <div>
                <img src="{{ asset('images/surfing.svg') }}" alt="Surfing">
            </div>

            <h1 class="text-[36px] font-bold ml-7">SURFING</h1>

            <div class="flex ml-7">
                <span class="text-black">
                    <i class="material-icons">location_on</i>
                </span>

                <h2 class="italic font-bold">Seminyak, Badung, Bali</h2>
            </div>

            <div class="text-justify max-w-xl px-14">
                <h3 class="leading-relaxed italic">
                    Catch your very first wave in the beautiful waters of
                    Seminyak. Whether you are an absolute beginner or looking
                    to polish your skills, our instructors will guide you step-by-
                    step in a safe and fun environment. Ride the waves, feel the
                    thrill, and experience Bali’s legendary surf culture firsthand
                    heritage.
                </h3>
            </div>

            <ul class="text-black flex ml-14 my-8 gap-3 opacity-30">
                <li class="border px-3 py-1 rounded-3xl">Surfboard Rental</li>
                <li class="border px-3 py-1 rounded-3xl">Private & Group Session</li>
            </ul>

            <div class="w-[100] h-0.5 bg-black mt-6 mx-8"></div>

            <div class="flex mb-11 ml-8">
                <ul class="text-black mt-8 text-[30px]">
                    <li>START FROM</li>
                    <li class="font-bold text-[#C89B3C]">Rp 220.000</li>
                    <li>/Person</li>
                </ul>

                <ul>
                    <li class="ml-[200px] mt-20">
                        <a href="{{ route('register') }}"
                        class="px-14 py-2.5 rounded-full border-2 border-white bg-gray-400 font-semibold text-black hover:bg-[#C89B3C] hover:text-black transition-all flex items-center">
                            Visit

                            <i class="material-icons ml-[20px] text-black">arrow_forward</i>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="flex justify-center gap-10.25 mt-13.5">
        <div class="shadow-lg rounded-[50px] bg-white">
            <div>
                <img src="{{ asset('images/canoeing.svg') }}" alt="Canoeing">
            </div>

            <h1 class="text-[36px] font-bold ml-7">CANOEING</h1>

            <div class="flex ml-7">
                <span class="text-black">
                    <i class="material-icons">location_on</i>
                </span>

                <h2 class="italic font-bold">Ulun Danu Batur, Kintamani, Bangli</h2>
            </div>

            <div class="text-justify max-w-xl px-14">
                <h3 class="leading-relaxed italic">
                    Experience Kintamani’s natural beauty from the water. Rent
                    a private canoe and glide across the calm surface of Lake
                    Batur. Enjoy stunning 360-degree volcano views, cool
                    mountain breezes, and a relaxing workout in one of Bali's
                    most iconic landscapes.
                </h3>
            </div>

            <ul class="text-black flex ml-14 my-8 gap-3 opacity-30">
                <li class="border px-3 py-1 rounded-3xl">Sunrise Session</li>
                <li class="border px-3 py-1 rounded-3xl">Photogenic Views</li>
                <li class="border px-3 py-1 rounded-3xl">Self-Guided Paddle</li>
            </ul>

            <div class="w-[100] h-0.5 bg-black mt-6 mx-8"></div>

            <div class="flex mb-11 ml-8">
                <ul class="text-black mt-8 text-[30px]">
                    <li>START FROM</li>
                    <li class="font-bold text-[#C89B3C]">Rp 115.000</li>
                    <li>/Person</li>
                </ul>

                <ul>
                    <li class="ml-[200px] mt-20">
                        <a href="{{ route('register') }}"
                        class="px-14 py-2.5 rounded-full border-2 border-white bg-gray-400 font-semibold text-black hover:bg-[#C89B3C] hover:text-black transition-all flex items-center">
                            Visit

                            <i class="material-icons ml-[20px] text-black">arrow_forward</i>

                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="shadow-lg rounded-[50px] bg-white">
            <div>
                <img src="{{ asset('images/swing.svg') }}" alt="Swing">
            </div>

            <h1 class="text-[36px] font-bold ml-7">SWING EXPERIENCE</h1>

            <div class="flex ml-7">
                <span class="text-black">
                    <i class="material-icons">location_on</i>
                </span>

                <h2 class="italic font-bold">Tegallalang, Ubud, Gianyar</h2>
            </div>

            <div class="text-justify max-w-xl px-14">
                <h3 class="leading-relaxed italic">
                    Soar high above the emerald green valleys of Tegalalang on
                    the famous Bali Swing. Feel the thrill of flying over iconic
                    rice terraces and capture that perfect, gravity-defying
                    Instagram photo. 
                </h3>
            </div>

            <ul class="text-black flex ml-14 my-8 gap-3 opacity-30">
                <li class="border px-3 py-1 rounded-3xl">Adrenalin Rush</li>
                <li class="border px-3 py-1 rounded-3xl">Instagrammable</li>
                <li class="border px-3 py-1 rounded-3xl">Safety Included</li>
            </ul>

            <div class="w-[100] h-0.5 bg-black mt-6 mx-8"></div>

            <div class="flex mb-11 ml-8">
                <ul class="text-black mt-8 text-[30px]">
                    <li>START FROM</li>
                    <li class="font-bold text-[#C89B3C]">Rp 150.000</li>
                    <li>/Person</li>
                </ul>

                <ul>
                    <li class="ml-[200px] mt-20">
                        <a href="{{ route('register') }}"
                        class="px-14 py-2.5 rounded-full border-2 border-white bg-gray-400 font-semibold text-black hover:bg-[#C89B3C] hover:text-black transition-all flex items-center">
                            Visit

                            <i class="material-icons ml-[20px] text-black">arrow_forward</i>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="flex ml-[285px] gap-10.25 mt-13.5">
        <div class="shadow-lg rounded-[50px] bg-white">
            <div>
                <img src="{{ asset('images/kecak.svg') }}" alt="Kecak">
            </div>

            <h1 class="text-[36px] font-bold ml-7">KECAK DANCE</h1>

            <div class="flex ml-7">
                <span class="text-black">
                    <i class="material-icons">location_on</i>
                </span>

                <h2 class="italic font-bold">Tanah Lot, Tabanan, Bali</h2>
            </div>

            <div class="text-justify max-w-xl px-14">
                <h3 class="leading-relaxed italic">
                    Extend your magical evening with a captivating live
                    performance of the traditional Kecak and Fire Dance. Set
                    against the backdrop of the crashing ocean waves after
                    twilight.
                </h3>
            </div>

            <ul class="text-black flex ml-14 my-8 gap-3 opacity-30">
                <li class="border px-3 py-1 rounded-3xl">Cultural Show</li>
                <li class="border px-3 py-1 rounded-3xl">Fire Dance</li>
                <li class="border px-3 py-1 rounded-3xl">Traditional Music</li>
            </ul>

            <div class="w-[100] h-0.5 bg-black mt-6 mx-8"></div>

            <div class="flex mb-11 ml-8">
                <ul class="text-black mt-8 text-[30px]">
                    <li>START FROM</li>
                    <li class="font-bold text-[#C89B3C]">Rp 125.000</li>
                    <li>/Person</li>
                </ul>

                <ul>
                    <li class="ml-[200px] mt-20">
                        <a href="{{ route('register') }}"
                        class="px-14 py-2.5 rounded-full border-2 border-white bg-gray-400 font-semibold text-black hover:bg-[#C89B3C] hover:text-black transition-all flex items-center">
                            Visit

                            <i class="material-icons ml-[20px] text-black">arrow_forward</i>

                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="shadow-lg rounded-[50px] bg-white">
            <div>
                <img src="{{ asset('images/trekking.svg') }}" alt="Trekking">
            </div>

            <h1 class="text-[36px] font-bold ml-7">TREKKING</h1>

            <div class="flex ml-7">
                <span class="text-black">
                    <i class="material-icons">location_on</i>
                </span>

                <h2 class="italic font-bold">Sekumpul Waterfall, Buleleng, Bali</h2>
            </div>

            <div class="text-justify max-w-xl px-14">
                <h3 class="leading-relaxed italic">
                    Descend into the heart of Bali's lush northern jungle on a
                    guided medium trek to the magnificent Sekumpul and
                    Hidden Waterfalls. Hike past local clove plantations, cross
                    natural streams, and stand at the base of the island's most
                    spectacular twin falls.
                </h3>
            </div>

            <ul class="text-black flex ml-14 my-8 gap-3 opacity-30">
                <li class="border px-3 py-1 rounded-3xl">Jungle Trekking</li>
                <li class="border px-3 py-1 rounded-3xl">Twin Falls View</li>
                <li class="border px-3 py-1 rounded-3xl">Guide Included</li>
            </ul>

            <div class="w-[100] h-0.5 bg-black mt-6 mx-8"></div>

            <div class="flex mb-11 ml-8">
                <ul class="text-black mt-8 text-[30px]">
                    <li>START FROM</li>
                    <li class="font-bold text-[#C89B3C]">Rp 125.000</li>
                    <li>/Person</li>
                </ul>

                <ul>
                    <li class="ml-[200px] mt-20">
                        <a href="{{ route('register') }}"
                        class="px-14 py-2.5 rounded-full border-2 border-white bg-gray-400 font-semibold text-black hover:bg-[#C89B3C] hover:text-black transition-all flex items-center">
                            Visit

                            <i class="material-icons ml-[20px] text-black">arrow_forward</i>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="flex items-center px-[860px] pt-11 gap-2">
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