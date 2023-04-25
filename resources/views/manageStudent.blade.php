@extends('layouts.master')

@section('title', 'Student')

@section('content')
    <div class="h-full">
        <main class="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
            @include('components.alert')
            <div class="lg:mt-10">
                <div class="px-6 py-6 bg-gray-100 flex items-center">
                    <img class="w-16 h-16 rounded-full" src="/img/{{ $student->photo }}" alt="">
                    <h1 class="pl-6 text-xl font-semibold text-gray-900">{{ $student->name }}</h1>
                </div>
                <!-- Attendance -->
                <section>
                    <div class="bg-white pt-6 shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 sm:px-6">
                            <h1 class="text-xl font-semibold text-gray-900">Absences</h1>
                        </div>
                        <div class="mt-6 flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden border-t border-gray-200">
                                        <table class="min-w-full divide-y divide-gray-300">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                        Name</th>
                                                    <th scope="col"
                                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                        Absence Date</th>
                                                    <th scope="col"
                                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                        Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-white">
                                                @foreach ($absences as $absence)
                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                            <div class="flex items-center">
                                                                <div class="font-medium text-gray-900">
                                                                    {{ $absence->user->name }}</div>
                                                            </div>
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            <div class="text-gray-900">{{ $absence->absenceDate }}</div>
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            @if ($absence->status == 'Justified')
                                                                <span
                                                                    class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Justified</span>
                                                            @else
                                                                <span
                                                                    class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">Not
                                                                    Justified</span>
                                                            @endif
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
                </section>
            </div>
            <section>
                <form action="{{ route('absence', $student->id) }}" method="POST">
                    @csrf
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="bg-white py-6 px-4 sm:p-6">
                            <div>
                                <h2 id="" class="text-lg leading-6 font-medium text-gray-900">Absence details</h2>
                            </div>
                            <div class="mt-6 grid grid-cols-4 gap-6">
                                <div class="col-span-4 sm:col-span-2">
                                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                    <input type="date" name="date" id="date" min="{{ date('Y-m-d') }}"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                        required>
                                </div>

                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                Add
                            </button>
                        </div>
                    </div>
                </form>
            </section>

            <!-- Marks -->
            <section aria-labelledby="plan-heading">

                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <form action="{{ route('mark', $student->id) }}" method="POST">
                        @csrf
                        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                            <div class="bg-white py-10">
                                <div class="mx-auto max-w-7xl">
                                    <div class="sm:flex sm:items-center">
                                        <div class="sm:flex-auto">
                                            <h1 class="text-xl font-semibold text-gray-900">Marks</h1>
                                        </div>
                                    </div>
                                    <div class="-mx-4 mt-8 flex flex-col sm:-mx-6 md:mx-0">
                                        <table class="min-w-full divide-y divide-gray-300">
                                            <thead>
                                                <tr>
                                                    <th scope="col"
                                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">
                                                        Exames</th>
                                                    <th scope="col"
                                                        class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900 sm:pr-6 md:pr-0">
                                                        Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="border-b border-gray-200">
                                                    <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                                                        <div class="font-medium text-gray-900">Exame 1</div>
                                                    </td>
                                                    <td id="exam"
                                                        class="hidden py-4 px-3 text-right text-sm text-gray-500 sm:table-cell">
                                                        @if ($marks)
                                                            {{ $marks->exam1 }}
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr class="border-b border-gray-200">
                                                    <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                                                        <div class="font-medium text-gray-900">Exame 2</div>
                                                    </td>
                                                    <td id="exam"
                                                        class="hidden py-4 px-3 text-right text-sm text-gray-500 sm:table-cell">
                                                        @if ($marks)
                                                            {{ $marks->exam2 }}
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr class="border-b border-gray-200">
                                                    <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                                                        <div class="font-medium text-gray-900">Exame 3</div>
                                                    </td>
                                                    <td id="exam"
                                                        class="hidden py-4 px-3 text-right text-sm text-gray-500 sm:table-cell">
                                                        @if ($marks)
                                                            {{ $marks->exam3 }}
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="row"
                                                        class="hidden pl-4 pt-4 text-right text-sm font-semibold text-gray-900 sm:table-cell md:pl-0">
                                                        Total</th>
                                                    <td id="total"
                                                        class="pr-4 pt-4 text-right text-sm font-semibold text-gray-900 sm:pr-6 md:pr-0">
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="mt-6 grid grid-cols-4 gap-6">
                                        <div class="col-span-4 sm:col-span-2">
                                            <label for="exam"
                                                class="block text-sm font-medium text-gray-700">Exam</label>
                                            <select name="exam" id="exams"
                                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                                required>
                                                <option value="" selected>Select Exam</option>
                                                <option value="exam1">Exam 1</option>
                                                <option value="exam2">Exam 2</option>
                                                <option value="exam3">Exam 3</option>
                                            </select>
                                        </div>
                                        <div class="col-span-4 sm:col-span-2">
                                            <label for="mark"
                                                class="block text-sm font-medium text-gray-700">Mark</label>
                                            <input type="number" step="0.01" name="mark" id="mark"
                                                min="0" max="20"
                                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

            </section>

        </main>
    </div>
@endsection
