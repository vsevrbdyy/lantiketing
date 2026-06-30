<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - {{ $ticket->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: "Inter", sans-serif; }</style>
</head>
<body class="bg-gray-50">
    <x-navbar />
    <div class="max-w-3xl mx-auto px-4 py-16">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-black">Book Your Ticket</h1>
                <p class="text-gray-500 mt-2">{{ $ticket->title }} - {{ $ticket->location }}</p>
            </div>
            <div class="bg-blue-50 rounded-xl p-4 mb-6 flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-600">Price per person</p>
                    <p class="text-2xl font-bold text-[#C89B3C]">Rp {{ number_format($ticket->price, 0, ",", ".") }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600">Available</p>
                    <p class="text-green-600 font-semibold">✓ In Stock</p>
                </div>
            </div>
            <form action="{{ route("booking.store") }}" method="POST">
                @csrf
                <input type="hidden" name="destination_ticket_id" value="{{ $ticket->id }}">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                        <input type="text" name="visitor_name" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Your full name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                        <input type="email" name="visitor_email" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="your@email.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Number *</label>
                        <input type="text" name="visitor_whatsapp" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="08123456789">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Visit Date *</label>
                        <input type="date" name="visit_date" required min="{{ date("Y-m-d", strtotime("+1 day")) }}" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Number of Tickets *</label>
                        <select name="ticket_qty" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }} ticket(s) - Rp {{ number_format($ticket->price * $i, 0, ",", ".") }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Notes (Optional)</label>
                        <textarea name="notes" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Any special requests?"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-[#00A6FF] text-white py-4 rounded-xl font-semibold hover:bg-blue-600 transition">Confirm Booking</button>
                </div>
            </form>
            <p class="text-center text-gray-400 text-sm mt-6">By booking, you agree to our terms and conditions</p>
        </div>
    </div>
    <x-footer />
</body>
</html>
EOF