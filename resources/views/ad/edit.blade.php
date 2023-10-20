<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 dark:text-dark-200 leading-tight">
            {{ __('Edit ad') }}
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
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="post" action="{{ route('ad.update', $ad->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $ad->title)" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $ad->description)" required autofocus autocomplete="description" />
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="category_id" :value="__('Category')" />
                            <select id="category_id" name="category_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $ad->category_id === $category->id ? "selected" : "" }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price', $ad->price)" required autofocus autocomplete="price" />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>

                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $ad->address)" required autofocus autocomplete="address" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>

                        <div>
                            <x-input-label for="city_id" :value="__('City')" />
                            <select id="city_id" name="city_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $ad->city_id === $city->id ? "selected" : "" }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="photos" :value="__('Photos')" />
                            <x-text-input id="photos" name="photos" type="file" autofocus autocomplete="photos" :value="old('photos', $ad->photos)" class="block w-full text-sm text-dark-900 border border-gray-300 rounded-lg cursor-pointer dark:text-dark-400 focus:outline-none dark:border-gray-600 dark:placeholder-gray-400" />
                            <x-input-error class="mt-2" :messages="$errors->get('photos')" />
                        </div>

                        <div>
                            <x-input-label for="condition_id" :value="__('Condition')" />
                            <select id="condition_id" name="condition_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                @foreach ($conditions as $condition)
                                    <option value="{{ $condition->id }}" {{ $ad->condition_id === $condition->id ? "selected" : "" }}>
                                        {{ $condition->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="brand" :value="__('Brand')" />
                            <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full" :value="old('brand', $ad->brand)" autofocus autocomplete="brand" />
                            <x-input-error class="mt-2" :messages="$errors->get('brand')" />
                        </div>

                        <div>
                            <x-input-label for="model" :value="__('Model')" />
                            <x-text-input id="model" name="model" type="text" class="mt-1 block w-full" :value="old('model', $ad->model)" autofocus autocomplete="model" />
                            <x-input-error class="mt-2" :messages="$errors->get('model')" />
                        </div>

                        <div>
                            <x-input-label for="year" :value="__('Year')" />
                            <x-text-input id="year" name="year" type="number" class="mt-1 block w-full" :value="old('year', $ad->year)" autofocus autocomplete="year" />
                            <x-input-error class="mt-2" :messages="$errors->get('year')" />
                        </div>

                        <div>
                            <x-input-label for="size" :value="__('Size')" />
                            <x-text-input id="size" name="size" type="text" class="mt-1 block w-full" :value="old('size', $ad->size)" autofocus autocomplete="size" />
                            <x-input-error class="mt-2" :messages="$errors->get('size')" />
                        </div>
                        
                        <div>
                            <x-input-label for="delivery_id" :value="__('Delivery')" />
                            <select id="delivery_id" name="delivery_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                @foreach ($deliveries as $delivery)
                                    <option value="{{ $delivery->id }}" {{ $ad->delivery_id === $delivery->id ? "selected" : "" }}>
                                        {{ $delivery->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="warranty" :value="__('Warranty')" />
                            <x-text-input id="warranty" name="warranty" type="text" class="mt-1 block w-full" :value="old('warranty', $ad->warranty)" autofocus autocomplete="warranty" />
                            <x-input-error class="mt-2" :messages="$errors->get('warranty')" />
                        </div>

                        <div>
                            <x-input-label for="is_exchangeable" :value="__('Is it exchangeable ?')" />
                            <select id="is_exchangeable" name="is_exchangeable">
                                <option value="1" {{ $ad->is_exchangeable === 1 ? "selected" : "" }}>Yes</option>
                                <option value="0" {{ $ad->is_exchangeable === 0 ? "selected" : "" }}>No</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
