@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <div class="container">
        <header class="header_img flex justify-center text-white items-center">
            <div class="flex flex-col justify-center items-center">
                <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1>
                <h1 class="hero_title">E D U C A T I O N</h1>
                <button class="btn read_more mt-5 py-2 px-4">Read More</button>
            </div>
        </header>
        <div
            class="grid grid-cols-1 py-4 px-4 md:grid-cols-3 text-white rounded-lg center_bar w-4/5 mx-auto divide-x divide-solid my-5">
            <div class="col-span-1 text-center px-5">
                <div class="flex items-center gap-4">
                    <object data="/img/icon-2.svg" width="55" height="55"></object>
                    <h3 class="text-2xl text-left">INDUSTRY LEADERS</h3>
                </div>
                <p class="mt-3 text-primaryClr">Read More</p>
            </div>
            <div class="col-span-1 text-center px-5">
                <div class=" flex items-center gap-4">
                    <object data="/img/icon-1.svg" width="55" height="55"></object>
                    <h3 class="text-2xl text-left">LEARN</h3>
                </div>
                <p class="mt-3 text-primaryClr">Read More</p>
            </div>
            <div class="col-span-1 text-center px-5">
                <div class="flex items-center gap-4">
                    <object data="/img/icon.svg" width="55" height="55"></object>
                    <h3 class="text-2xl text-left">BEST LIBRARY</h3>
                </div>
                <p class="mt-3 text-primaryClr">Read More</p>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div><img src="/img/group.png" alt=""></div>
            <div>
                <h1>About Our College</h1>
                <p>It is a long established fact that a reader will be distracted by the <br> readable content of a page
                    when looking at its layout. The point of <br> using Lorem Ipsum is that it has a more it</p>
                <button class="btn read_more mt-5 py-2 px-4">Read More</button>
            </div>
        </div>
        <div class=" text-center">
            <h1>POPULAR CLASSES</h1>
            <p>It is a long established fact that a reader will be distracted</p>
            <div class="flex items-center justify-center"><img src="/img/group 2.png" alt=""></div>
            <button class="btn read_more mt-5 py-2 px-4">Read More</button>
        </div>
    @endsection
