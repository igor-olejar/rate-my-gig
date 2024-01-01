<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Search Results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if ($users->isEmpty())
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        There are no artists, promoters or venues with string <strong>"{{ $search_term }}"</strong> in their name or town.
                    </div>
                </div>
            </div>
        @endif

        @foreach ($users as $user)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ $user->name }} - {{ $user->town }}, {{ $user->county }} 
                        @php $starsCount = $user->avg_rating @endphp
                        @for ($i = 1; $i < 6; $i++)
                            @if ($starsCount > $i)
                                <i class="fa fa-star fa-1x" style="color:orange"></i>
                            @else
                                <i class="fa fa-star fa-1x" style="color:grey"></i>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
