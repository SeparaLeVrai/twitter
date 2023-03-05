<a href='{{ route('user.show', ['pseudo' => $user->pseudo]) }}' class="border p-4">
    <div class="grid grid-cols-3">
        <div class="font-bold text-gray-800 group-hover:text-white overflow-hidden">
            @if ($user->avatar)
                <img src="{{ asset($user->avatar) }}" class="rounded-full" height=50 width=50 />
            @endif
        </div>
        <div class=" text-blue-400 group-hover:text-white">
            {{ $user->name }}
        </div>
        <div class=" text-blue-700 group-hover:text-white">
            @ {{ $user->pseudo }}
        </div>
    </div>
</a>
