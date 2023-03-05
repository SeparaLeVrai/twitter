<x-guest-layout>
    <ul class="grid grid-cols-1 gap-4">
        @foreach ($tweets as $tweet)
            <x-tweet-card :tweet="$tweet" />
        @endforeach
    </ul>

    <div class="mt-8">
        {{ $tweets->links() }}
    </div>
</x-guest-layout>
