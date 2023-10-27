<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 dark:text-dark-200 leading-tight">
            {{ __('Show ad') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-8 dark:text-dark-400">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Back') }}
        </x-nav-link>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="mt-6 space-y-6">

                        <h3 class="text-lg font-medium text-dark-900 dark:text-dark-100">
                            {{ $ad->title }}
                        </h3>
                        <p class="text-l font-medium text-dark-500 dark:text-dark-100">
                            {{ $ad->description }}
                        </p>
                        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                            Category : {{ $ad->category->name }}
                        </p>
                        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                            Price : {{ $ad->price }}
                        </p>
                        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                            Address/City : {{ $ad->address }}, {{ $ad->city->name }}
                        </p>
                        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                            Condition : {{ $ad->condition->name }}
                        </p>
                        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                            Brand : {{ $ad->brand }}
                        </p>
                        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                            Model : {{ $ad->model }}
                        </p>
                        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                            Year : {{ $ad->year }}
                        </p>
                        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                            Size : {{ $ad->size }}
                        </p>
                        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                            Delivery : {{ $ad->delivery->name }}
                        </p>
                        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                            Warranty : {{ $ad->warranty }}
                        </p>
                        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                            Exchangeable : {{ ($ad->is_exchangeable == 0 ? "No" : "Yes") }}
                        </p>
                        <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                            <!-- si utilisateur connecté + si c'est son annonce, on affiche pas les infos -->
                            @if (Auth::user())
                                @if (Auth::user()->id === $ad->user->id)
                                    Seller : Me
                                <!-- si c'est son annonce ou si il est admin, afficher les infos -->
                                @elseif  (Auth::user()->id === $ad->user->id || Auth::user()->role === "admin")
                                    Seller : {{ $ad->user->name }} <br> 
                                    Contacts : {{ $ad->user->contacts }}
                                @endif
                            @else
                                Seller : {{ $ad->user->name }}
                            @endif
                        </p>

                        @if ($ad->photos)
                            <img src="../../public/{{ $ad->photos }}" class="ad-photo">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
