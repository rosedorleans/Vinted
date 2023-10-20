<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 dark:text-dark-200 leading-tight">
            {{ __('Ads') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-8 dark:text-dark-400">
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
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-8 dark:text-green-400"
        >{{ __('Saved.') }}</p>
    @endif
    @if (session('status') === 'ad-edited')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-8 dark:text-green-400"
        >{{ __('Edited.') }}</p>
    @endif
    @if (session('status') === 'ad-destroyed')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-8 dark:text-green-400"
        >{{ __('Deleted.') }}</p>
    @endif

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($ads as $ad)
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex justify-between">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-dark-900 dark:text-dark-100">
                                {{ $ad->title }}
                                </h2>
                            </header>
                            <div>
                                <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                                    {{ $ad->description }}
                                </p>
                                <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                                    Price : {{ $ad->price }} €
                                </p>
                                <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                                    Condition : {{ $ad->condition->name }}
                                </p>
                                <p class="mt-1 text-sm text-dark-600 dark:text-dark-400">
                                    @if (Auth::user())
                                        @if (Auth::user()->id === $ad->user->id)
                                            Seller : Me
                                        @elseif  (Auth::user()->id === $ad->user->id || Auth::user()->role === "admin")
                                            Seller : {{ $ad->user->name }} <br> 
                                            Contacts : {{ $ad->user->contacts }}
                                        @endif
                                    @else
                                        Seller : {{ $ad->user->name }}
                                    @endif
                                </p>

                                @if ($ad->photos)
                                    <img :href="{{ $ad->photos->path }}">
                                @endif
                            </div>
                        </section>
                    </div>
                    <div class="sm:px-6 lg:px-8 dark:text-dark-400 flex items-center">
                        <x-nav-link :href="route('ad.show', $ad->id)" :active="request()->routeIs('ad.show')">
                            {{ __('Show') }}
                        </x-nav-link>
                        @if (Auth::user())
                            @if (Auth::user()->id === $ad->user->id || Auth::user()->role === "admin")
                                <x-nav-link :href="route('ad.edit', $ad->id)" :active="request()->routeIs('ad.edit')">
                                    {{ __('Edit') }}
                                </x-nav-link>
                                <form method="POST" action="{{route('ad.destroy', [$ad->id])}}">
                                    {{csrf_field()}}
                                    <input type="submit" name="_method" value="Delete" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-dark-500 hover:text-dark-700 hover:border-gray-300 focus:outline-none focus:text-dark-700 focus:border-gray-300 transition duration-150 ease-in-out cursor-pointer">
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
