<?php

namespace App\Http\Controllers;

use App\Models\ExperienceTicket;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function showExperience(Request $request)
    {
        $category = $request->query('category');
        $search   = $request->query('search');

        $tickets = ExperienceTicket::where('is_active', true)
            ->byCategory($category)
            ->search($search)
            ->latest()
            ->paginate(6);

        return view('pages.experience', compact('tickets', 'category', 'search'));
    }

    public function show($slug)
    {
        $ticket = ExperienceTicket::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $related = ExperienceTicket::where('is_active', true)
            ->where('id', '!=', $ticket->id)
            ->latest()
            ->limit(3)
            ->get();

        return view('pages.experience-detail', compact('ticket', 'related'));
    }
}
