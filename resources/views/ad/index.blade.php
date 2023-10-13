<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ads') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-8 dark:text-gray-400">
        <x-nav-link :href="route('ad.create')" :active="request()->routeIs('ad.create')">
            {{ __('New ad') }}
        </x-nav-link>
    </div>

    @if (session('status') === 'ad-created')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400"
        >{{ __('Saved.') }}</p>
    @endif

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($ads as $ad)
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex justify-between">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    Ad n°{{ $ad->id }}
                                </h2>
                            </header>
                            <div>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $ad->title }}
                                </p>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $ad->description }}
                                </p>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    Author : {{ $ad->author->name }}
                                </p>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    Assignee : {{ $ad->assignee->name }}
                                </p>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $ad->due_date }}
                                </p>
                                @if ($ad->file)
                                    <img :href="{{ $ad->file->path }}">
                                @endif
                            </div>
                        </section>
                    </div>
                    <div class="sm:px-6 lg:px-8 pt-8 dark:text-gray-400">
                        <x-nav-link :href="route('ad.edit', $ad->id)" :active="request()->routeIs('ad.edit')">
                            {{ __('Edit') }}
                        </x-nav-link>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
