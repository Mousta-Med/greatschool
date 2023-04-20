@extends('layouts.master')

@section('title', 'Profile')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Profile Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Update your account's profile information and email address.") }}
                            </p>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    :value="old('email', $user->email)" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                            {{ __('Your email address is unverified.') }}

                                            <button form="send-verification"
                                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Update Password') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Ensure your account is using a long, random password to stay secure.') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <x-input-label for="current_password" :value="__('Current Password')" />
                                <x-text-input id="current_password" name="current_password" type="password"
                                    class="mt-1 block w-full" autocomplete="current-password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password" :value="__('New Password')" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                    autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                    class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'password-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>



    <div class="h-full flex">
        <div class="flex-1 min-w-0 flex flex-col overflow-hidden">
            <main class="flex-1 flex overflow-hidden">
                <!-- Main content -->
                <div class="flex-1 xl:overflow-y-auto">
                    <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:py-12 lg:px-8">
                        <h1 class="text-3xl font-extrabold text-blue-gray-900">Account</h1>

                        <form class="mt-6 space-y-8 divide-y divide-y-blue-gray-200">
                            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-6 sm:gap-x-6">
                                <div class="sm:col-span-6">
                                    <h2 class="text-xl font-medium text-blue-gray-900">Profile</h2>
                                    <p class="mt-1 text-sm text-blue-gray-500">This information will be
                                        displayed publicly so be careful what you share.</p>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-blue-gray-900">
                                        First name
                                    </label>
                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                        class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-blue-gray-900">
                                        Last name
                                    </label>
                                    <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                        class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="username" class="block text-sm font-medium text-blue-gray-900">
                                        Username
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-blue-gray-300 bg-blue-gray-50 text-blue-gray-500 sm:text-sm">
                                            workcation.com/
                                        </span>
                                        <input type="text" name="username" id="username" autocomplete="username"
                                            value="lisamarie"
                                            class="flex-1 block w-full min-w-0 border-blue-gray-300 rounded-none rounded-r-md text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="photo" class="block text-sm font-medium text-blue-gray-900">
                                        Photo
                                    </label>
                                    <div class="mt-1 flex items-center">
                                        <img class="inline-block h-12 w-12 rounded-full"
                                            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;auto=format&amp;fit=facearea&amp;facepad=2.5&amp;w=256&amp;h=256&amp;q=80"
                                            alt="">
                                        <div class="ml-4 flex">
                                            <div
                                                class="relative bg-white py-2 px-3 border border-blue-gray-300 rounded-md shadow-sm flex items-center cursor-pointer hover:bg-blue-gray-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-blue-gray-50 focus-within:ring-blue-500">
                                                <label for="user-photo"
                                                    class="relative text-sm font-medium text-blue-gray-900 pointer-events-none">
                                                    <span>Change</span>
                                                    <span class="sr-only"> user photo</span>
                                                </label>
                                                <input id="user-photo" name="user-photo" type="file"
                                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                            </div>
                                            <button type="button"
                                                class="ml-3 bg-transparent py-2 px-3 border border-transparent rounded-md text-sm font-medium text-blue-gray-900 hover:text-blue-gray-700 focus:outline-none focus:border-blue-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-gray-50 focus:ring-blue-500">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="description" class="block text-sm font-medium text-blue-gray-900">
                                        Description
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="description" name="description" rows="4"
                                            class="block w-full border border-blue-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                                    </div>
                                    <p class="mt-3 text-sm text-blue-gray-500">Brief description for your
                                        profile. URLs are hyperlinked.</p>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="url" class="block text-sm font-medium text-blue-gray-900">
                                        URL
                                    </label>
                                    <input type="text" name="url" id="url"
                                        class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>

                            <div class="pt-8 grid grid-cols-1 gap-y-6 sm:grid-cols-6 sm:gap-x-6">
                                <div class="sm:col-span-6">
                                    <h2 class="text-xl font-medium text-blue-gray-900">Personal Information
                                    </h2>
                                    <p class="mt-1 text-sm text-blue-gray-500">This information will be
                                        displayed publicly so be careful what you share.</p>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="email-address" class="block text-sm font-medium text-blue-gray-900">
                                        Email address
                                    </label>
                                    <input type="text" name="email-address" id="email-address" autocomplete="email"
                                        class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="phone-number" class="block text-sm font-medium text-blue-gray-900">
                                        Phone number
                                    </label>
                                    <input type="text" name="phone-number" id="phone-number" autocomplete="tel"
                                        class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="country" class="block text-sm font-medium text-blue-gray-900">
                                        Country
                                    </label>
                                    <select id="country" name="country" autocomplete="country-name"
                                        class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                                        <option></option>
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
                                    </select>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="language" class="block text-sm font-medium text-blue-gray-900">
                                        Language
                                    </label>
                                    <input type="text" name="language" id="language"
                                        class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <p class="text-sm text-blue-gray-500 sm:col-span-6">This account was created on
                                    <time datetime="2017-01-05T20:35:40">January 5, 2017, 8:35:40 PM</time>.
                                </p>
                            </div>

                            <div class="pt-8 flex justify-end">
                                <button type="button"
                                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-blue-gray-900 hover:bg-blue-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    </main>
    </div>
    </div>

    </div>



@endsection
