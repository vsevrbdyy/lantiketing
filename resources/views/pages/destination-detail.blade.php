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
        
       @if($ticket->image)
            <img src="{{ asset('storage/' . $ticket->image) }}"
                alt="{{ $ticket->title }}"
                class="absolute inset-0 w-full object-cover z-0 h-215 blur-xs">
        @else
            <img src="{{ asset('images/heroexp.svg') }}"
                alt="Experience Hero"
                class="absolute inset-0 w-full object-cover z-0 h-215">
        @endif
            
        {{-- Konten di depan gambar --}}
        <div class="relative z-10">
            <x-navbartrans />
        </div>

        <div>
            <div class="pt-32 pl-16 z-10">
            @if($ticket->image)
                <img src="{{ asset('storage/' . $ticket->image) }}"
                    alt="{{ $ticket->title }}"
                    class="absolute w-[730px] h-[378px] object-cover rounded-3xl ">
            @endif
            </div>

            
        </div>

    </div>

    <div>test</div>

</body>