<x-guest-layout>
    <ul class="grid xs:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-4 grid-rows-3 gap-4">
        @foreach ($tweets as $tweet)
            <x-tweet-card :tweet="$tweet" />
        @endforeach
    </ul>

    <div class="mt-8">
        {{ $tweets->links() }}
    </div>

    <div class="rounded-full bg-blue-700 fixed bottom-5 right-5 px-10 py-6 hover:bg-blue-900">
        <a href="{{ route('tweets.add') }}" class="text-center text-white text-8xl">+</a>
    </div>
</x-guest-layout>
