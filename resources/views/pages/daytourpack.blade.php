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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-linear-to-r from-[#EAF1EF] to-[#FFFFFF] min-h-screen">

    <x-navbartrans/>

    <div class="container mx-auto flex justify-center items-center min-h-screen px-4 py-10">
        <div class="bg-white rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.1)] border border-gray-200 p-10 w-full max-w-4xl">

            {{-- Logo --}}
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-16 mx-auto">
                <h3 class="mt-3 text-2xl font-bold text-gray-800">LAN-JALAN</h3>
                <p class="text-gray-500">Destinasi Wisata Bali</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- Content --}}
                <div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-4">Jelajahi Keindahan Bali</h4>
                    <p class="text-gray-600 mb-6">Bali adalah surga tropis yang menawarkan keindahan alam, budaya yang kaya, dan pengalaman tak terlupakan. Dari pantai berpasir putih hingga sawah hijau yang menakjubkan, Bali memiliki segalanya untuk memuaskan hasrat petualangan Anda.</p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li><strong>Pantai Kuta:</strong> Nikmati matahari terbenam yang memukau di Pantai Kuta, tempat yang sempurna untuk bersantai dan menikmati ombak.</li>
                        <li><strong>Ubud:</strong> Temukan keindahan budaya Bali di Ubud, dengan sawah terasering yang menakjubkan dan seni tradisional yang kaya.</li>
                        <li><strong>Pura Besakih:</strong> Kunjungi Pura Besakih, pura terbesar dan paling suci di Bali, yang menawarkan pemandangan spektakuler.</li>
                        <li><strong>Gunung Batur:</strong> Lakukan pendakian pagi hari ke Gunung Batur untuk menyaksikan matahari terbit yang menakjubkan dari