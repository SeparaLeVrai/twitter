<x-guest-layout>
    <h1 class="text-center">Tweets</h1>
    <ul class="grid 2xl:grid-cols-4 grid-rows-3 gap-4">
        @foreach ($tweets as $tweet)
            <x-tweet-card :tweet="$tweet" />
        @endforeach
    </ul>

    <div class="mt-8">
        {{ $tweets->links() }}
    </div>
</x-guest-layout>
