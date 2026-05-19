<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lan-jalan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800">
 
    <x-navbar />
    
    <div class="group flex max-md:flex-col justify-center gap-2">
        <article class="group/article relative w-full rounded-xl overflow-hidden md:group-hover:not-[&:hover]:w-[20%] md:group-focus-within:not-[&:focus-within:not(&:hover)]:w-[20%] transition-all duration-300 ease-[cubic-bezier(.5,.85,.25,1.15)] before:absolute before:inset-x-0 before:bottom-0 before:h-1/3 before:bg-linear-to-t before:from-black/50 before:transition-opacity md:before:opacity-0 md:hover:before:opacity-100 focus-within:before:opacity-100 after:opacity-0 md:group-hover:not-[&:hover]:after:opacity-100 md:group-focus-within:not-[&:focus-within:not(&:hover)]:after:opacity-100 after:absolute after:inset-0 after:bg-white/30 after:backdrop-blur after:transition-all focus-within:ring focus-within:ring-indigo-300">
            <a class="absolute inset-0 text-white z-10" href="#0">
                <span class="absolute inset-x-0 bottom-0 text-lg font-medium p-6 md:px-12 md:py-8 md:whitespace-nowrap md:truncate md:opacity-0 group-hover/article:opacity-100 group-focus-within/article:opacity-100 md:translate-y-2 group-hover/article:translate-y-0 group-focus-within/article:translate-y-0 transition duration-200 ease-[cubic-bezier(.5,.85,.25,1.8)] group-hover/article:delay-300 group-focus-within/article:delay-300">"Diamond Beach adalah pantai eksotis di Nusa Penida dengan pasir putih bersih dan tebing karang berbentuk berlian yang ikonik, air lautnya jernih kebiruan, aksesnya menuruni tebing dengan pemandangan spektakuler."</span>
            </a>
            <img class="object-cover h-96 md:h-132 w-full md:group-hover:not-[&:hover]:scale-150 md:hover:scale-100 origin-center transition-transform duration-500 ease-[cubic-bezier(.5,.85,.25,1.15)]" src="images/pantai.jpg" width="960" height="480" alt="Image 01">
        </article>
        <article class="group/article relative w-full rounded-xl overflow-hidden md:group-hover:not-[&:hover]:w-[20%] md:group-focus-within:not-[&:focus-within:not(&:hover)]:w-[20%] transition-all duration-300 ease-[cubic-bezier(.5,.85,.25,1.15)] before:absolute before:inset-x-0 before:bottom-0 before:h-1/3 before:bg-linear-to-t before:from-black/50 before:transition-opacity md:before:opacity-0 md:hover:before:opacity-100 focus-within:before:opacity-100 after:opacity-0 md:group-hover:not-[&:hover]:after:opacity-100 md:group-focus-within:not-[&:focus-within:not(&:hover)]:after:opacity-100 after:absolute after:inset-0 after:bg-white/30 after:backdrop-blur after:transition-all focus-within:ring focus-within:ring-indigo-300">
            <a class="absolute inset-0 text-white z-10" href="#0">
                <span class="absolute inset-x-0 bottom-0 text-lg font-medium p-6 md:px-12 md:py-8 md:whitespace-nowrap md:truncate md:opacity-0 group-hover/article:opacity-100 group-focus-within/article:opacity-100 md:translate-y-2 group-hover/article:translate-y-0 group-focus-within/article:translate-y-0 transition duration-200 ease-[cubic-bezier(.5,.85,.25,1.8)] group-hover/article:delay-300 group-focus-within/article:delay-300">"Pura Ulun Danu Bratan adalah pura air yang ikonik di tepi Danau Beratan Bedugul, arsitekturnya megah dengan latar gunung dan danau, terkenal sebagai salah satu landmark wisata paling populer di Bali."</span>
            </a>
            <img class="object-cover h-96 md:h-132 w-full md:group-hover:not-[&:hover]:scale-150 md:hover:scale-100 origin-center transition-transform duration-500 ease-[cubic-bezier(.5,.85,.25,1.15)]" src="images/pura.jpg" width="960" height="480" alt="Image 02">
        </article>
        <article class="group/article relative w-full rounded-xl overflow-hidden md:group-hover:not-[&:hover]:w-[20%] md:group-focus-within:not-[&:focus-within:not(&:hover)]:w-[20%] transition-all duration-300 ease-[cubic-bezier(.5,.85,.25,1.15)] before:absolute before:inset-x-0 before:bottom-0 before:h-1/3 before:bg-linear-to-t before:from-black/50 before:transition-opacity md:before:opacity-0 md:hover:before:opacity-100 focus-within:before:opacity-100 after:opacity-0 md:group-hover:not-[&:hover]:after:opacity-100 md:group-focus-within:not-[&:focus-within:not(&:hover)]:after:opacity-100 after:absolute after:inset-0 after:bg-white/30 after:backdrop-blur after:transition-all focus-within:ring focus-within:ring-indigo-300">
            <a class="absolute inset-0 text-white z-10" href="#0">
                <span class="absolute inset-x-0 bottom-0 text-lg font-medium p-6 md:px-12 md:py-8 md:whitespace-nowrap md:truncate md:opacity-0 group-hover/article:opacity-100 group-focus-within/article:opacity-100 md:translate-y-2 group-hover/article:translate-y-0 group-focus-within/article:translate-y-0 transition duration-200 ease-[cubic-bezier(.5,.85,.25,1.8)] group-hover/article:delay-300 group-focus-within/article:delay-300">"Tegalalang adalah destinasi sawah terasering paling terkenal di Ubud, hamparan hijau bertingkat yang membentang di lembah perbukitan, cocok untuk bersantai sambil menikmati keindahan alam khas pedesaan Bali."</span>
            </a>
            <img class="object-cover h-96 md:h-132 w-full md:group-hover:not-[&:hover]:scale-150 md:hover:scale-100 origin-center transition-transform duration-500 ease-[cubic-bezier(.5,.85,.25,1.15)]" src="images/sawah.jpg" width="960" height="480" alt="Image 03">
        </article>                                
    </div>

    <div class="w-full py-16 px-4 bg-white">
        <div class="max-w-300 mx-auto flex flex-col gap-16">

            <div class="flex items-center gap-12">

                <div class="flex gap-4 shrink-0">
                    <img
                        src="{{ asset('images/nusapenida1.svg') }}"
                        alt="Nusa Penida 1"
                        class="w-59 h-47 object-cover rounded-[25px] shadow-md"
                    >
                    <img
                        src="{{ asset('images/nusapenida2.svg') }}"
                        alt="Nusa Penida 2"
                        class="w-59 h-47 object-cover rounded-[25px] shadow-md"
                    >
                    <img
                        src="{{ asset('images/nusapenida3.svg') }}"
                        alt="Nusa Penida 3"
                        class="w-59 h-47 object-cover rounded-[25px] shadow-md"
                    >
                </div>

                <div class="flex flex-col gap-4">
                    <h2 class="text-2xl font-bold text-black m-0">NUSA PENIDA</h2>
                    <p class="text-base text-black font-normal max-w-95 leading-relaxed m-0">
                        Nusa Penida menawarkan pantai yang menakjubkan,
                        dan tempat religius untuk petualangan dan eksplorasi budaya.
                    </p>
                    <div>
                        <a
                            href="#"
                            class="inline-flex items-center gap-3 px-6 py-4 bg-white border border-[#6b6b6b] rounded-[14px] text-base text-black font-normal no-underline hover:border-gray-900 hover:shadow-md transition-all duration-200"
                        >
                            Kunjungi Nusa Penida
                            <svg class="w-4 h-4" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 8H13M13 8L8.5 3.5M13 8L8.5 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>

            <hr class="border-t border-gray-200 m-0">

            <div class="flex items-center gap-12">

                <div class="flex flex-col gap-4 shrink-0">
                    <h2 class="text-2xl font-bold text-black text-right m-0">Ulun Danu Batur</h2>
                    <p class="text-base text-black font-normal max-w-95 text-right leading-relaxed m-0">
                        Ulun Danu Batur menawarkan explorasi religi yang menakjubkan,
                        serta pemandangan alam yang asri untuk petualangan dan eksplorasi budaya.
                    </p>
                    <div class="flex justify-end">
                        <a
                            href="#"
                            class="inline-flex items-center gap-3 px-6 py-4 bg-white border border-[#6b6b6b] rounded-[14px] text-base text-black font-normal no-underline hover:border-gray-900 hover:shadow-md transition-all duration-200"
                        >
                            Kunjungi Ulun Danu Batur
                            <svg class="w-4 h-4" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 8H13M13 8L8.5 3.5M13 8L8.5 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="flex gap-4 shrink-0">
                    <img
                        src="{{ asset('images/ulundanu1.svg') }}"
                        alt="Ulun Danu Batur 1"
                        class="w-59 h-47 object-cover rounded-[25px] shadow-md"
                    >
                    <img
                        src="{{ asset('images/ulundanu2.svg') }}"
                        alt="Ulun Danu Batur 2"
                        class="w-59 h-47 object-cover rounded-[25px] shadow-md"
                    >
                    <img
                        src="{{ asset('images/ulundanu3.svg') }}"
                        alt="Ulun Danu Batur 3"
                        class="w-59 h-47 object-cover rounded-[25px] shadow-md"
                        >
                </div>

            </div>

            <hr class="border-t border-gray-200 m-0">

            <div class="flex items-center gap-12">

                <div class="flex gap-4 shrink-0">
                    <img
                        src="{{ asset('images/tegallalang1.svg') }}"
                        alt="Tegallalang 1"
                        class="w-59 h-47 object-cover rounded-[25px] shadow-md"
                    >
                    <img
                        src="{{ asset('images/tegallalang2.svg') }}"
                        alt="Tegallalang 2"
                        class="w-59 h-47 object-cover rounded-[25px] shadow-md"
                    >
                    <img
                        src="{{ asset('images/tegallalang3.svg') }}"
                        alt="Tegallalang 3"
                        class="w-59 h-47 object-cover rounded-[25px] shadow-md"
                    >
                </div>

                <div class="flex flex-col gap-4">
                    <h2 class="text-2xl font-bold text-black m-0">TEGALLALANG</h2>
                    <p class="text-base text-black font-normal max-w-95 leading-relaxed m-0">
                    Tegallalang menawarkan sistem pertanian tradisional asal bali
                    dengan sejarah yang sudah dilestarikan ribuan tahun.
                    </p>
                    <div>
                        <a
                        href="#"
                        class="inline-flex items-center gap-3 px-6 py-4 bg-white border border-[#6b6b6b] rounded-[14px] text-base text-black font-normal no-underline hover:border-gray-900 hover:shadow-md transition-all duration-200"
                    >
                        Kunjungi Tegallalang
                            <svg class="w-4 h-4" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 8H13M13 8L8.5 3.5M13 8L8.5 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>

            <hr class="border-t border-[6B6B6B]">

        </div>
    </div>
</body>
</html>