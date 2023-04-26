@extends('layouts.master')

@section('title', 'Student')

@section('content')

    <div class="px-16 py-20 min-h-[22rem]">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Marks</h1>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Material</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Teacher</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Exam 1</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Exam 2</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Exam 3</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Exam Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($Marks as $mark)
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            {{ $mark->teacher->material_study }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                            {{ $mark->teacher->name }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                            {{ $mark->exam1 }}
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                            {{ $mark->exam2 }}
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                            {{ $mark->exam3 }}
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                            {{ number_format(($mark->exam1 + $mark->exam2 + $mark->exam3) / 3, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
