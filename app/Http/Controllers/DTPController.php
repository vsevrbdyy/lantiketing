<?php

namespace App\Http\Controllers;

use App\Models\DayTourPackage;
use Illuminate\Http\Request;

class DTPController extends Controller
{
    public function showDayTourPack(Request $request)
    {
        $category = $request->query('category');
        $search   = $request->query('search');

        $tickets = DayTourPackage::where('is_active', true)
            ->byCategory($category)
            ->search($search)
            ->latest()
            ->paginate(6);

        return view('pages.daytourpack', compact('tickets', 'category', 'search'));
    }

    public function show($slug)
    {
        $ticket = DayTourPackage::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $related = DayTourPackage::where('is_active', true)
            ->where('id', '!=', $ticket->id)
            ->latest()
            ->limit(3)
            ->get();

        return view('pages.daytourpack-detail', compact('ticket', 'related'));
    }
}
