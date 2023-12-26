<div class="mt-16">
    <form method="POST" action="{{ route('search') }}">
        @csrf

        <div>
            <x-input-label class="dark:text-white" for="search_term" :value="__('Enter Search Term')" />
            <x-text-input id="search_term" class="block mt-1 w-full" name="search_term" required autofocus autocomplete="search_term" />
        </div>

        <x-primary-button class="ms-3">
            {{ __('Search') }}
        </x-primary-button>
    </form>
</div>