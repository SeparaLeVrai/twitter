<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tweet extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likeCount($tweetId)
    {
        return DB::table('likes')->where('tweet_id', $tweetId)->count();
    }

    public function isLiked($userId)
    {
        $user = User::findOrFail($userId);
        if ($user) {
            return $this->likes()->where('user_id', $user->id)->exists();
        }
        return false;
    }
}
