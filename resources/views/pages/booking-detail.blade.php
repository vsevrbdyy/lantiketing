<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Detail - LAN-JALAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50">
    <x-navbar />
    <div class="max-w-3xl mx-auto px-4 py-16">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
                {{ session('error') }}
            </div>
        @endif
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-blue-200 text-sm">Booking Code</p>
                        <p class="text-2xl font-bold text-white">{{ $booking->booking_code }}</p>
                    </div>
                    <span class="px-4 py-2 rounded-full text-sm font-semibold
                        @if($booking->status == 'confirmed') bg-green-500 text-white
                        @elseif($booking->status == 'cancelled') bg-red-500 text-white
                        @else bg-yellow-500 text-white @endif">
                        {{ ucfirst($booking->status) }}
                    </span>
                </div>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm text-gray-500">Full Name</p>
                        <p class="font-semibold text-lg">{{ $booking->visitor_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="font-semibold">{{ $booking->visitor_email }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">WhatsApp</p>
                        <p class="font-semibold">{{ $booking->visitor_whatsapp }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Visit Date</p>
                        <p class="font-semibold">{{ $booking->visit_date->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tickets</p>
                        <p class="font-semibold">{{ $booking->ticket_qty }} person(s)</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Price per Ticket</p>
                        <p class="font-semibold">Rp {{ number_format($booking->price_per_ticket, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Payment Status</p>
                        <p class="font-semibold">
                            @if($booking->payment_status == 'paid')
                                <span class="text-green-500">✅ Paid</span>
                            @elseif($booking->payment_status == 'unpaid')
                                <span class="text-red-500">❌ Unpaid</span>
                            @else
                                <span class="text-yellow-500">⏳ {{ $booking->payment_status }}</span>
                            @endif
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Payment Method</p>
                        <p class="font-semibold">{{ $booking->payment_method ?? '-' }}</p>
                    </div>
                </div>
                <div class="border-t mt-6 pt-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">Total Payment</p>
                            <p class="text-3xl font-bold text-[#C89B3C]">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                        </div>
                        @if($booking->notes)
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Notes</p>
                                <p class="text-gray-700">{{ $booking->notes }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- TOMBOL PAY NOW --}}
                @if($booking->status == 'pending' && $booking->payment_status == 'unpaid')
                    <div class="mt-6 flex gap-4">
                        <form action="{{ route('booking.payNow', $booking->booking_code) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full bg-[#00A6FF] text-white py-3 rounded-xl hover:bg-blue-700 transition font-semibold">
                                💳 Pay Now
                            </button>
                        </form>
                        <form action="{{ route('booking.cancel', $booking->booking_code) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-6 py-3 border border-red-500 text-red-500 rounded-xl hover:bg-red-50 transition">
                                Cancel Booking
                            </button>
                        </form>
                    </div>
                @elseif($booking->status == 'confirmed' && $booking->payment_status == 'paid')
                    <div class="mt-6 bg-green-50 border border-green-200 rounded-xl p-4 text-center">
                        <p class="text-green-600 font-semibold">✅ Booking sudah dikonfirmasi dan lunas!</p>
                    </div>
                @elseif($booking->status == 'cancelled')
                    <div class="mt-6 bg-red-50 border border-red-200 rounded-xl p-4 text-center">
                        <p class="text-red-600 font-semibold">❌ Booking sudah dibatalkan!</p>
                    </div>
                @endif

                <div class="mt-6 text-center">
                    <a href="{{ url('/') }}" class="text-blue-600 hover:underline">← Back to Home</a>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</body>
</html>