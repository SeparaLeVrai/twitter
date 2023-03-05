<x-guest-layout>
    <div class="text-xl p-4 border">
        <div class="grid grid-cols-3 place-content-start">
            @if ($tweet->user->avatar)
                <img src="{{ asset($tweet->user->avatar) }}" width=100 height=100 class="rounded-full" />
            @endif
            <h1 class="place-self-center text-blue-400">{{ $tweet->user->name }}</h1>
            <a href="{{ route('user.show', $tweet->user->pseudo) }}" class="place-self-center text-blue-700">@
                {{ $tweet->user->pseudo }}</a>
        </div>
        @if ($tweet->img_path)
            <img src='{{ asset($tweet->img_path) }}' width="200" height="200" />
        @endif
        <p>{{ $tweet->text }}</p>
        <div class="grid grid-cols-2 place-items-center pt-3">
            <div class="grid grid-cols-2">
                <x-bx-like class="h-5 w-5 text-gray-500" />
                <p>{{ $likeCount }}</p>
            </div>
            <div class="grid grid-cols-2">
                <x-heroicon-o-chat-bubble-bottom-center-text class="h-5 w-5 text-gray-500" />
                <p>{{ $answerCount }}</p>
            </div>
        </div>
    </div>
    @forelse ($tweet->answers as $answer)
        <div class="border p-4 ml-8 mt-4 relative">
            <div class="grid grid-cols-3 place-content-start">
                @if ($answer->user->avatar)
                    <img src="{{ asset($answer->user->avatar) }}" width=100 height=100 class="rounded-full" />
                @endif
                <h1 class="place-self-center text-blue-400">{{ $answer->user->name }}</h1>
                <a href="{{ route('user.show', $answer->user->pseudo) }}" class="place-self-center text-blue-700">@
                    {{ $answer->user->pseudo }}</a>
            </div>
            <p>{{ $answer->body }}</p>
            <div class="absolute bottom-5 right-5 bg-red-500">
                @can('delete', $answer)
                    <button x-data="{ id: {{ $answer->id }} }"
                        x-on:click.prevent="window.selected = id; $dispatch('open-modal', 'confirm-comment-deletion');"
                        type="submit" class="font-bold bg-red-500 px-4 py-2 rounded shadow">
                        <x-heroicon-o-trash class="h-5 w-5 text-white" />
                    </button>
                @endcan
            </div>
        </div>
    @empty
        <p class="text-red-400 text-center">
            Aucun commentaire pour l'instant
        </p>
    @endforelse
    @auth
        <form action="{{ route('answers.add', $tweet) }}" method="POST" class="ml-8">
            @csrf
            <div>
                <div class="text-blue-700">@ {{ auth()->user()->pseudo }}</div>
                <div class="text-gray-700">
                    <textarea name="body" id="body" rows="4"></textarea>
                </div>
                <div class="text-gray-700 mt-2">
                    <button type="submit" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow">
                        Ajouter un commentaire
                    </button>
                </div>
            </div>
        </form>
    @else
        <div class="bg-white rounded-md shadow p-4 text-gray-700">
            <span> Vous devez être connecté pour ajouter un commentaire </span>
            <a href="{{ route('login') }}" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow-md">Se
                connecter</a>
        </div>
    @endauth
    </div>
    <x-modal name="confirm-comment-deletion" focusable>
        <form method="post" onsubmit="event.target.action= '/tweets/{{ $tweet->id }}/answers/' + window.selected"
            class="p-6">
            @csrf @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Êtes-vous sûr de vouloir supprimer ce commentaire ?
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Cette action est irréversible. Toutes les données seront supprimées.
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Annuler
                </x-secondary-button>

                <x-danger-button class="ml-3" type="submit">
                    Supprimer
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</x-guest-layout>
