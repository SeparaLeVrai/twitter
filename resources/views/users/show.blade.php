<x-guest-layout>
    <div class="border p-4 mb-10 grid grid-cols-3">
        @if ($user->avatar)
            <img src='{{ asset($user->avatar) }}' title="{{ $user->pseudo }}" class="rounded-full" height=50 width=50 />
        @endif
        <h1 class="text-blue-400">{{ $user->name }}</h1>
        <h2 class="text-blue-700">@ {{ $user->pseudo }}</h2>
    </div>

    @foreach ($user->tweets as $tweet)
        <div class="grid grid-cols-1 gap-4 border p-4 mt-3">
            <a href="{{ route('tweet.show', $tweet) }}">
                @if ($tweet->img_path)
                    <img src='{{ asset($tweet->img_path) }}' />
                @endif
                <p>{{ $tweet->text }}</p>
                <p class="text-blue-400">{{ $tweet->created_at->diffForHumans() }}
            </a>
        </div>
    @endforeach
</x-guest-layout>
