<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function showExperience()
    {
        return view('pages.experience');
    }
}