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

    <div class="max-w-2xl mx-auto py-10 px-4 lg:max-w-7xl">
        <div class="bg-white">
            <div class="py-5 max-w-7xl mx-auto">
                <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Students
                    </h3>
                    <div class="mt-3 sm:mt-0 sm:ml-4">
                        <label for="mobile-search-candidate" class="sr-only">Search</label>
                        <label for="desktop-search-candidate" class="sr-only">Search</label>
                        <div class="flex rounded-md shadow-sm">
                            <div class="relative flex-grow focus-within:z-10">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/search"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" name="mobile-search-candidate" id="mobile-search-candidate"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-l-md pl-10 sm:hidden border-gray-300"
                                    placeholder="Search">
                                <input type="text" name="desktop-search-candidate" id="desktop-search-candidate"
                                    class="hidden focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-none rounded-l-md pl-10 sm:block sm:text-sm border-gray-300"
                                    placeholder="Search candidates">
                            </div>
                            <button type="button"
                                class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/sort-ascending"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z">
                                    </path>
                                </svg>
                                <span class="ml-2">Sort</span>
                                <svg class="ml-2.5 -mr-1.5 h-5 w-5 text-gray-400"
                                    x-description="Heroicon name: solid/chevron-down" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:grid-cols-3 lg:gap-x-8">
            @foreach ($students as $student)
                <div class="groupbg-white border border-gray-200 rounded-lg flex flex-col overflow-hidden">
                    <div class="aspect-w-3 aspect-h-4 bg-gray-200 group-hover:opacity-75 sm:aspect-none sm:h-96">
                        <img src="/img/{{ $student->photo }}" alt="student image"
                            class="w-full h-full object-center object-cover sm:w-full sm:h-full">
                    </div>
                    <div class="flex-1 p-4 space-y-2 flex flex-col">
                        <h3 class="text-sm font-medium text-gray-900">
                            {{ $student->name }}
                        </h3>
                        <div class="flex justify-between">
                            <button type="button"
                                class="inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                Marks
                            </button>
                            <button type="button"
                                class="inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Attendance
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
