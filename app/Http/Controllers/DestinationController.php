<?php

namespace App\Http\Controllers;

use App\Models\DestinationTicket;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function showDestination(Request $request)
    {
        $category = $request->query('category'); // null jika tidak ada filter (= All)

        $tickets = DestinationTicket::where('is_active', true)
            ->byCategory($category)   // scope dari Model
            ->latest()
            ->paginate(6);

        return view('pages.destination', compact('tickets', 'category'));
    }
}
