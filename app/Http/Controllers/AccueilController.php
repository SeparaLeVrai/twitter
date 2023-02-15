<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class AccueilController extends Controller
{
    public function index()
    {
        $tweets = Tweet::with('user')->latest()->paginate(12);

        return view('twitter.index', compact('tweets'));
    }
}
