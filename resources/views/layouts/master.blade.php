<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/css/app.css">
    <title>@yield('title', 'unknown page')</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/65cfe681d2.js" crossorigin="anonymous"></script>

<body>
    <div class="">
        <nav x-data="{ open: false }" class="lg:absolute w-full bg-sent lg:bg-transparent">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="block h-30 w-30" src="/img/logo.svg" alt="logo">
                        </div>

                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex items-center">
                            <div class="hidden sm:block sm:ml-6">
                                <div class="flex space-x-4">
                                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                        {{ __('home') }}
                                    </x-nav-link>
                                    @guest
                                    @if (Route::has('login'))
                                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                        {{ __('Login') }}</x-nav-link>
                                    @endif
                                    @else
                                    <!-- Profile dropdown -->
                                    <div x-data="{ open: false }" x-init="window.addEventListener('click', event => {
                                            if (open && !event.target.closest('.relative')) {
                                                open = false;
                                            }
                                        });" class="ml-3 relative">
                                        <div>
                                            <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" x-ref="button" @click="open = !open">
                                                <span class="sr-only">Open user menu</span>
                                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                                            </button>
                                        </div>

                                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state." role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-slate-600 hover:transition delay-75" x-state:on="Active" x-state:off="Not Active" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-slate-600 hover:transition delay-75" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-slate-600 hover:transition delay-75" role="menuitem" tabindex="-1" id="user-menu-item-1" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>


                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex sm:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
                            <span class="sr-only">Open main menu</span>
                            <svg x-description="Icon when menu is closed Heroicon name: outline/menu" x-state:on="Menu open" x-state:off="Menu closed" class="block h-6 w-6" :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <svg x-description="Icon when menu is open Heroicon name: outline/x" x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-6 w-6" :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div x-description="Mobile menu, show/hide based on menu state." class="sm:hidden" id="mobile-menu" x-show="open">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                    <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>
                    <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>
                    <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-white">Tom Cook</div>
                            <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                        </div>
                        <button type="button" class="ml-auto flex-shrink-0 bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/bell" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 px-2 space-y-1">
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your
                            Profile</a>
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Settings</a>
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign
                            out</a>
                    </div>
                </div>
            </div>
        </nav>

    </div>
    <main>
        @yield('content')
    </main>

    <footer class="w-full py-4 flex-shrink-0 bg-black">
        <div class="container-fluid p-5">
            <div class="flex flex-wrap text-white">
                <div class="w-full lg:w-1/3 md:w-1/2 p-4">
                    <h5 class="mb-3">Quick links</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#">Home</a></li>
                    </ul>
                </div>
                <div class="w-full lg:w-1/3 md:w-1/2 p-4">
                    <h5 class="mb-3">TOP RATED CLASSES</h5>
                    <ul class="list-unstyled text-muted">
                        <li>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour.</li>
                    </ul>
                </div>
                <div class="w-full lg:w-1/3 md:w-1/2 p-4">
                    <h5 class="mb-3">FOR ANY QUERY, PLEASE WRITE TO US</h5>
                    <ul class="list-unstyled text-muted">
                        <li>Location</li>
                        <li>demo@gmail.com</li>
                        <li>Call : +01 1234567890</li>
                    </ul>
                    <form action="#" class="mt-4">
                        <div class="mb-3">
                            <input class="form-control px-3 py-2 border rounded w-full" type="text" placeholder="Enter your email address">
                            <button class="btn sent text-white px-3 pynb bbhjbhbh-2 rounded mt-2" type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-muted mt-8">
                <p>© 2023 All Rights Reserved By GREAT SCHOOL</p>
            </div>
        </div>
    </footer>
    <script src="/js/app.js"></script>
</body>

</html>