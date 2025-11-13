<?php

namespace App\Http\Controllers;

use App\Models\Story;

class HomeController extends Controller
{
    public function index()
    {
        $stories = Story::with('user')->latest()->get();
        return view('home', compact('stories'));
    }
}
