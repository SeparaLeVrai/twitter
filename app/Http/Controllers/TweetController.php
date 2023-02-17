<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetAddRequest;
use App\Models\Tweet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tweets.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TweetAddRequest $request)
    {
        $tweet = Tweet::make();
        $tweet->text = $request->validated()['text'];

        $path = Storage::url($request->file('img_path')->store('media', 'public'));
        $tweet->img_path = $path;

        $tweet->user_id = Auth::id();
        $tweet->save();

        return redirect()->route('accueil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        //
    }
}
