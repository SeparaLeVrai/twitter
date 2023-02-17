<x-guest-layout>
    @if ($user->avatar)
        <img src='{{ asset($user->avatar) }}' title="{{ $user->pseudo }}" />
    @endif
    <h1>{{ $user->pseudo }}</h1>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 ">
        @foreach ($user->tweets as $tweet)
            <div class="md:shadow">
                @if ($tweet->img_path)
                    <img src='{{ asset($tweet->img_path) }}' />
                @endif
                <p>{{ $tweet->text }}</p>
            </div>
        @endforeach
    </div>
</x-guest-layout>
