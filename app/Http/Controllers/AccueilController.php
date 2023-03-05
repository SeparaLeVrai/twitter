<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
    public function index(Request $request)
    {
        $tweets = Tweet::where('text', 'LIKE', '%' . $request->query('search') . '%')
            ->orWhereHas('user', function ($query) use ($request) {
                $query->where('pseudo', 'LIKE', '%' . $request->query('search') . '%');
            })
            ->withCount(['answers', 'likes'])
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('twitter.index', compact('tweets'));
    }
}
