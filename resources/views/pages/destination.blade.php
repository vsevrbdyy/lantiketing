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
    
    <div class="relative min-h-screen">
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
    </div>