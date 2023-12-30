<div class="mt-16">
    <form method="POST" action="{{ route('search') }}">
        @csrf

        <div class="text-center dark:text-white">
            <div style="margin-bottom: 1.24em">
                <x-input-label for="search_term" :value="__('Enter Search Term')" />
            </div>
            <x-text-input id="search_term" class="block mt-1 w-full" name="search_term" required autofocus autocomplete="search_term" />
        </div>

        <x-primary-button class="ms-3 dark:text-white">
            {{ __('Search') }}
        </x-primary-button>
    </form>
</div>