<x-guest-layout>
    <ul class="grid xs:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-4 grid-rows-3 gap-4">
        @foreach ($users as $user)
            <x-user-card :user="$user" />
        @endforeach
    </ul>
</x-guest-layout>
