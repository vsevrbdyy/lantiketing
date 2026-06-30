<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\DestinationTicket;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($slug)
    {
        $ticket = DestinationTicket::where('slug', $slug)->firstOrFail();
        return view('pages.booking-form', compact('ticket'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination_ticket_id' => 'required|exists:destination_tickets,id',
            'visitor_name' => 'required|string|max:255',
            'visitor_email' => 'required|email|max:255',
            'visitor_whatsapp' => 'required|string|max:20',
            'visit_date' => 'required|date|after:today',
            'ticket_qty' => 'required|integer|min:1|max:10',
            'notes' => 'nullable|string',
        ]);

        $ticket = DestinationTicket::findOrFail($request->destination_ticket_id);
        
        $total_price = $ticket->price * $request->ticket_qty;

        $booking = Booking::create([
            'booking_code' => Booking::generateBookingCode(),
            'destination_ticket_id' => $ticket->id,
            'visitor_name' => $request->visitor_name,
            'visitor_email' => $request->visitor_email,
            'visitor_whatsapp' => $request->visitor_whatsapp,
            'visit_date' => $request->visit_date,
            'ticket_qty' => $request->ticket_qty,
            'price_per_ticket' => $ticket->price,
            'total_price' => $total_price,
            'notes' => $request->notes,
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ]);

        return redirect()->route('booking.success', $booking->booking_code)
                         ->with('success', 'Booking berhasil dibuat!');
    }

    public function success($bookingCode)
    {
        $booking = Booking::where('booking_code', $bookingCode)->firstOrFail();
        return view('pages.booking-success', compact('booking'));
    }

    public function show($bookingCode)
    {
        $booking = Booking::where('booking_code', $bookingCode)->firstOrFail();
        return view('pages.booking-detail', compact('booking'));
    }

    public function cancel($bookingCode)
    {
        $booking = Booking::where('booking_code', $bookingCode)->firstOrFail();
        
        if ($booking->status === 'pending') {
            $booking->update([
                'status' => 'cancelled',
                'payment_status' => 'unpaid',
            ]);
            return redirect()->back()->with('success', 'Booking berhasil dibatalkan');
        }

        return redirect()->back()->with('error', 'Booking tidak dapat dibatalkan');
    }

    public function payNow($bookingCode)
    {
        $booking = Booking::where('booking_code', $bookingCode)->firstOrFail();
        
        // Cek apakah booking sudah dibayar
        if ($booking->payment_status === 'paid') {
            return redirect()->back()->with('error', 'Booking sudah dibayar!');
        }

        // Cek apakah booking sudah dibatalkan
        if ($booking->status === 'cancelled') {
            return redirect()->back()->with('error', 'Booking sudah dibatalkan!');
        }

        // Update ALL fields
        $booking->status = 'confirmed';
        $booking->payment_status = 'paid';
        $booking->payment_method = 'simulasi';
        $booking->paid_at = now();
        $booking->save();

        return redirect()->route('booking.show', $booking->booking_code)
                         ->with('success', '✅ Pembayaran berhasil! Booking telah dikonfirmasi.');
    }
}