<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('festivals.store') }}">
            @csrf

            <h1 style="font-size: 35px;font-stretch: expanded; margin: 5%;"> Create Application</h1>
            <input style="margin: 5%;"
                name="title"
                placeholder="{{ __('Enter title') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                type="text"
            >{{ old('title') }}</input>
            <input style="margin: 5%;"
                name="image"
                placeholder="{{ __('Enter imageUrl') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                type="text"
            >{{ old('image') }}</input>
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
            <input style="margin: 5%;"
                name="description"
                placeholder="{{ __('Enter description') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                type="text"
            >{{ old('description') }}</input>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <input style="margin: 5%;"
                name="price"
                placeholder="{{ __('Enter price') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                type="number"
            >{{ old('price') }}</input>
            <x-input-error :messages="$errors->get('price')" class="mt-2" />



            <x-primary-button  style="margin: 5%;" class="mt-4">{{ __('Create') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
