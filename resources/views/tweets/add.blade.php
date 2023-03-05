<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between mt-8">
                <div class=" text-2xl">
                    Nouveau Tweet
                </div>
            </div>

            <form method="POST" action="{{ route('add') }}" class="flex flex-col space-y-4 text-gray-500"
                enctype="multipart/form-data">

                @csrf

                <div>
                    <x-input-label for="text" :value="__('Tweet (280 caractères maximum)')" />
                    <x-text-input id="text" class="block mt-1 w-full" type="text" name="text"
                        :value="old('text')" autofocus />
                    <x-input-error :messages="$errors->get('text')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="img" :value="__('Media')" />
                    <x-text-input id="img" class="block mt-1 w-full" type="file" name="img_path" />
                    <x-input-error :messages="$errors->get('img_path')" class="mt-2" />
                </div>

                <div class="flex justify-end">
                    <x-primary-button type="submit">
                        {{ __('Tweeter') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
