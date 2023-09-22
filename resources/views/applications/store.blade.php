<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('applications.store') }}">
            @csrf

            <input
                name="fullName"
                placeholder="{{ __('Enter Full Name') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                type="text"
            >{{ old('fullName') }}</input>
            <input
                name="nights"
                placeholder="{{ __('Enter Days') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                type="number"
            >{{ old('nights') }}</input>
            <x-input-error :messages="$errors->get('nights')" class="mt-2" />

            <input
                name="people"
                placeholder="{{ __('Enter number of people') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                type="number"
            >{{ old('people') }}</input>
            <x-input-error :messages="$errors->get('people')" class="mt-2" />
            <input
                name="ask"
                placeholder="{{ __('Enter question you have') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                type="text"
            >{{ old('ask') }}</input>
            <x-input-error :messages="$errors->get('ask')" class="mt-2" />



            <x-primary-button class="mt-4">{{ __('Send Application') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>

