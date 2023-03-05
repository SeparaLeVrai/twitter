<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Avatar') }}
        </h2>

        @if ($user->avatar)
            <img src="{{ asset($user->avatar) }}" title='{{ $user->pseudo }}' alt="{{ $user->pseudo }}" />
        @endif
    </header>

    <form method="post" action="{{ route('avatar.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <input id="avatar" name="avatar" type="file" class="mt-1 block w-full" required autofocus
                autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Sauvegardé.') }}</p>
            @endif
        </div>
    </form>
    <section>
