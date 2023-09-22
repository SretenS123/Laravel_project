<x-app-layout>
    <h1 style="text-align: center;font-size: 40px;padding: 10px;">ALL FESTIVALS</h1>
    @foreach ($festivals as $festival)
    <div style="display: inline-block;margin: 5px 10px 5px 10px; text-align: center;  width:28%;" class="card min-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        @if ($festival->user->is(auth()->user()))
            <x-dropdown>
                <x-slot name="trigger">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('festivals.edit', $festival)">
                        {{ __('Edit') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('festivals.destroy', $festival) }}">
                        @csrf
                        @method('delete')
                        <x-dropdown-link :href="route('festivals.destroy', $festival)" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Delete') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>

            </x-dropdown>

        @endif
        <img style="padding: 20px;" src='{{$festival->image}}' height="300" width="400" >
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$festival->title}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$festival->description}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$festival->price}}</p>
        <a href="/applications/create/" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Apply
            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
        @unless ($festival->created_at->eq($festival->updated_at))
            <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
        @endunless

    </div>
        @endforeach


</x-app-layout>
