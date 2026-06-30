<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Success - LAN-JALAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: "Inter", sans-serif; }</style>
</head>
<body class="bg-gray-50">
    <x-navbar />
    <div class="max-w-2xl mx-auto px-4 py-20">
        <div class="bg-white rounded-2xl shadow-xl p-8 text-center">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="ti ti-check text-4xl text-green-600"></i>
            </div>
            <h1 class="text-3xl font-bold text-black">Booking Successful!</h1>
            <p class="text-gray-500 mt-2">Your booking has been confirmed</p>
            <div class="bg-gray-50 rounded-xl p-6 mt-6 text-left">
                <p class="text-sm text-gray-500">Booking Code</p>
                <p class="text-2xl font-bold text-black">{{ $booking->booking_code }}</p>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <p class="text-sm text-gray-500">Name</p>
                        <p class="font-semibold">{{ $booking->visitor_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Date</p>
                        <p class="font-semibold">{{ $booking->visit_date->format("d M Y") }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tickets</p>
                        <p class="font-semibold">{{ $booking->ticket_qty }} person(s)</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total</p>
                        <p class="font-bold text-[#C89B3C]">Rp {{ number_format($booking->total_price, 0, ",", ".") }}</p>
                    </div>
                </div>
            </div>
            <div class="flex gap-4 mt-6 justify-center">
                <a href="{{ route("booking.show", $booking->booking_code) }}" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition">View Detail</a>
                <a href="{{ url("/") }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-300 transition">Back to Home</a>
            </div>
        </div>
    </div>
    <x-footer />
</body>
</html>
EOF