<x-guest-layout>
    <ul class="grid grid-cols-3 gap-4">
        @foreach ($users as $user)
            <x-user-card :user="$user" />
        @endforeach
    </ul>
</x-guest-layout>
