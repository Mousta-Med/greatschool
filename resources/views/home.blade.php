@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <div class="">
        @include('components.alert')
        <header class="header_img flex justify-center text-white items-center">
            <div class="flex flex-col justify-center items-center">
                <h1 class="hero_title">E D U C A T I O N</h1>
                <button class="btn read_more mt-5 py-2 px-4">Read More</button>
            </div>
        </header>
        <div
            class="grid grid-cols-1 py-4 px-4 md:grid-cols-3 text-white rounded-lg center_bar w-4/5 mx-auto divide-x divide-solid my-5">
            <div class="col-span-1 text-center px-5 py-5 lg:py-0">
                <div class="flex items-center gap-4">
                    <object data="/img/icon-2.svg" width="55" height="55"></object>
                    <h3 class="text-2xl text-left">INDUSTRY LEADERS</h3>
                </div>
                <p class="mt-3 text-primaryClr">Read More</p>
            </div>
            <div class="col-span-1 text-center px-5 py-5 lg:py-0">
                <div class=" flex items-center gap-4">
                    <object data="/img/icon-1.svg" width="55" height="55"></object>
                    <h3 class="text-2xl text-left">LEARN</h3>
                </div>
                <p class="mt-3 text-primaryClr">Read More</p>
            </div>
            <div class="col-span-1 text-center px-5 py-5 lg:py-0">
                <div class="flex items-center gap-4">
                    <object data="/img/icon.svg" width="55" height="55"></object>
                    <h3 class="text-2xl text-left">BEST LIBRARY</h3>
                </div>
                <p class="mt-3 text-primaryClr">Read More</p>
            </div>
        </div>
        <div class="text-left flex lg:flex-row flex-col justify-center items-center p-7 gap-7">
            <div><img src="/img/group.png" alt=""></div>
            <div>
                <h1 class="text-xl font-bold ">About Our College</h1>
                <p>It is a long established fact that a reader will be distracted by the <br> readable content of a page
                    when looking at its layout. The point of <br> using Lorem Ipsum is that it has a more it</p>
                <button class="btn read_more mt-5 py-2 px-4">Read More</button>
            </div>
        </div>
        <div class="text-center">
            <h1 class="font-bold text-xl">POPULAR CLASSES</h1>
            <p>It is a long established fact that a reader will be distracted</p>
            <div class=" flex flex-col px-5 lg-px-0 lg:flex-row lg:justify-center gap-5 py-7">
                <img src="/img/group 5.png" alt="">
                <img src="/img/group 6.png" alt="">
            </div>
            <div class="flex flex-col px-5 lg-px-0 lg:flex-row lg:justify-center gap-7 pb-7">
                <img src="/img/group 8.png" alt="">
                <img src="/img/group 10.png" alt="">
                <img src="/img/group 7.png" alt="">
            </div>
        </div>
        <div class="login flex justify-center items-center">
            <div class="backdrop-blur-sm bg-white/30 rounded-md w-4/12 px-10 pb-10">
                <h1 class="text-center text-2xl text-white pt-7 font-normal">Login Now</h1>
                <form class="mt-8" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="rounded-md shadow-sm">
                        <div class="pb-5">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input id="email-address" type="email" name="email" value="{{ old('email') }}" required
                                autocomplete="username"
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Email address">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required=""
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="btn read_more mt-5 py-2 px-4">
                            LOGIN
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
