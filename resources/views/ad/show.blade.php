<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show ad') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-8 dark:text-gray-400">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Back') }}
        </x-nav-link>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="mt-6 space-y-6">

                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ $ad->title }}
                        </h3>
                        <p class="text-l font-medium text-gray-500 dark:text-gray-100">
                            {{ $ad->description }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Category : {{ $ad->category->name }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Price : {{ $ad->price }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Address/City : {{ $ad->address }}, {{ $ad->city->name }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Condition : {{ $ad->condition->name }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Brand : {{ $ad->brand }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Model : {{ $ad->model }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Year : {{ $ad->year }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Size : {{ $ad->size }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Delivery : {{ $ad->delivery->name }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Warranty : {{ $ad->warranty }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Exchangeable : {{ ($ad->is_exchangeable == 0 ? "No" : "Yes") }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Seller : {{ $ad->user->name }}
                        </p>

                        @if ($ad->photos)
                            <img :href="{{ $ad->photos->path }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
