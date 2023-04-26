@extends('layouts.master')

@section('title', 'Teacher')

@section('content')
    <div class="hero">
        <div class="max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Welcome Back</h1>
            <h2 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">{{ Auth::user()->name }}
            </h2>
        </div>
    </div>

    <livewire:search :data="$students" />

@endsection
