@extends('layouts.master')

@section('title', 'Profile')

@section('content')
    {{-- <div class="py-12">
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
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
        <div>
            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                {{ __('Your email address is unverified.') }}

                <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
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
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
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
                    <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('New Password')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </section>

    </div>
</div>
</div>
</div> --}}

    <div class="h-full flex">
        <div class="flex-1 min-w-0 flex flex-col overflow-hidden">
            <main class="flex-1 flex overflow-hidden">
                <!-- Main content -->
                <div class="flex-1 xl:overflow-y-auto mt-16">
                    <div class="max-w-3xl mx-auto py-10 px-5">
                        <h1 class="text-3xl font-extrabold text-blue-gray-900">Account</h1>
                        <div class="mt-6">
                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>
                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')
                                <div class="sm:col-span-6 pt-3 pb-6">
                                    <h2 class="text-xl font-medium text-blue-gray-900">
                                        {{ __('Profile Information') }}
                                    </h2>
                                    <p class="mt-1 text-sm text-blue-gray-500">
                                        {{ __("Update your account's profile information and email address.") }}
                                    </p>
                                </div>

                                <div class="sm:col-span-3 pb-6">
                                    <label for="name" class="block text-sm font-medium text-blue-gray-900">Name</label>
                                    <input id="name" name="name" type="text"
                                        class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                                        value="{{ old('name', $user->name) }}" required autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <div class="sm:col-span-3 pb-6">
                                    <label class="block text-sm font-medium text-blue-gray-900" for="email">Email</label>
                                    <input id="email" name="email" type="email"
                                        class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                                        value="{{ old('email', $user->email) }}" required autocomplete="username" />
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>

                                <div class="flex justify-end">
                                    <button
                                        class="bg-sent inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 focus:ring-1 transition ease-in-out duration-150'">{{ __('Save') }}</button>

                                    @if (session('status') === 'profile-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Saved.') }}
                                        </p>
                                    @endif
                                </div>
                            </form>
                            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('put')

                                <div class="sm:col-span-6">
                                    <h2 class="text-xl font-medium text-blue-gray-900">{{ __('Update Password') }}
                                    </h2>
                                    <p class="mt-1 text-sm text-blue-gray-500">
                                        {{ __('Ensure your account is using a long, random password to stay secure.') }}.
                                    </p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-blue-gray-900"
                                        for="current_password">Current Password</label>
                                    <input id="current_password" name="current_password" type="password"
                                        class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                                        autocomplete="current-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-blue-gray-900" for="password">New
                                        Password</label>
                                    <input id="password" name="password" type="password"
                                        class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                                        autocomplete="new-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-blue-gray-900"
                                        for="password_confirmation">Confirm Password</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                                        autocomplete="new-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="flex justify-end">
                                    <button
                                        class="bg-sent inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 focus:ring-1 transition ease-in-out duration-150'">{{ __('Save') }}</button>

                                    @if (session('status') === 'password-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </form>
                            <div class=" relative -mt-9 flex justify-start">
                                <a href="{{ route('home') }}">
                                    <button type="button"
                                        class="bg-red-600 hover:bg-red-700 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                        Back
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>



@endsection
