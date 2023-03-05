<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetAddRequest;
use App\Models\Answer;
use App\Models\Like;
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
        if (!Auth::check()) {
            return redirect('/');
        } else {
            return view('tweets.add');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TweetAddRequest $request)
    {

        $tweet = Tweet::make();
        $tweet->text = $request->validated()['text'];

        if ($request->hasFile('img_path')) {
            $path = Storage::url($request->file('img_path')->store('media', 'public'));
        } else {
            $path = null;
        }
        $tweet->img_path = $path;

        $tweet->user_id = Auth::id();
        $tweet->save();

        return redirect()->route('accueil');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tweet = Tweet::findOrFail($id);
        $likeCount = Like::where('tweet_id', $id)->count();
        $answerCount = Answer::where('tweet_id', $id)->count();
        $answers = $tweet
            ->answers()
            ->with('user')
            ->orderBy('created_at')
            ->get();

        return view('tweets.show', compact('tweet', 'likeCount', 'answerCount', 'answers'));
    }

    public function addAnswer(Request $request, Tweet $tweet)
    {
        $request->validate([
            'body' => 'required|string|max:280',
        ]);

        $answer = $tweet->answers()->make();
        $answer->body = $request->input('body');
        $answer->user_id = auth()->user()->id;
        $answer->save();

        return redirect()->back();
    }

    public function deleteAnswer(Tweet $tweet, Answer $answer)
    {
        $this->authorize('delete', $answer);

        $answer->delete();

        return redirect()->back();
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
