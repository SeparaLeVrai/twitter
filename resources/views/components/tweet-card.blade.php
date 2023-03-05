<a href='{{ route('tweet.show', $tweet) }}' class="border p-4">
    <div class="grid grid-cols-3 place-content-start">
        @if ($tweet->user->avatar)
            <img src="{{ asset($tweet->user->avatar) }}" width=100 height=100 class="rounded-full" />
        @endif
        <div class=" text-blue-400 group-hover:text-white">
            {{ $tweet->user->name }}
        </div>
        <div class=" text-blue-700 group-hover:text-white">
            @ {{ $tweet->user->pseudo }}
        </div>
    </div>
    <div class="font-bold text-gray-800 group-hover:text-white
            overflow-hidden p-4">
        {{ Str::limit($tweet->text, 280) }}
    </div>
    <div class="font-bold text-gray-800 group-hover:text-white overflow-hidden">
        @if ($tweet->img_path)
            <img src="{{ asset($tweet->img_path) }}" />
        @endif
    </div>
    <div class="grid grid-cols-4 place-items-center">
        <div class=" text-blue-400 group-hover:text-white">
            {{ $tweet->created_at->diffForHumans() }}
        </div>
        <div class="grid grid-cols-2 p-2">
            <x-heroicon-o-chat-bubble-bottom-center-text class="h-5 w-5 text-gray-500" />
            <div class="text-sm text-blue-700">{{ $tweet->answers_count }}</div>
        </div>
        <div class="grid grid-cols-2 p-2">
            <x-bx-like class="h-5 w-5 text-gray-500" />
            <div class="text-sm text-blue-700">{{ $tweet->likes_count }}</div>
        </div>
        <form method="post" action="{{ route('like') }}"
            class="@if (!Auth::check()) hidden @endif text-blue-700">
            @csrf
            <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
            <input type="submit" value="Like" />
        </form>
    </div>
</a>
