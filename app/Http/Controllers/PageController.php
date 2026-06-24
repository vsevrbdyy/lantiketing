<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinationTicket;
use App\Models\ExperienceTicket;
use App\Models\DayTourPackage;

class PageController extends Controller
{
    public function destination()
    {
        $tickets = DestinationTicket::where('is_active', true)->get();
        return view('pages.destination', compact('tickets'));
    }

    public function experience()
    {
        $experiences = ExperienceTicket::where('is_active', true)->get();
        return view('pages.experience', compact('experiences'));
    }

    public function daytour()
    {
        $packages = DayTourPackage::where('is_active', true)->get();
        return view('pages.daytourpack', compact('packages'));
    }
}