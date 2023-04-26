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
                            <input type="text" name="mobile-search-candidate" wire:model="search"
                                id="mobile-search-candidate"
                                class="focus:ring-sent focus:border-place block w-full rounded-md pl-10 sm:hidden border-gray-300"
                                placeholder="Search">
                            <input type="text" name="desktop-search-candidate" wire:model="search"
                                id="desktop-search-candidate"
                                class="hidden focus:ring-sent focus:border-place w-full rounded-md pl-10 sm:block sm:text-sm border-gray-300"
                                placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:grid-cols-4 lg:gap-x-8">
        @forelse ($students as $student)
            <a href="{{ route('manageStudent', $student->id) }}">
                <div class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                    <div class="flex-1 flex flex-col p-8">
                        <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full"
                            src="/img/{{ $student->photo }}"alt="student image">
                        <h3 class="mt-6 text-gray-900 text-sm font-medium">{{ $student->name }}</h3>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-4 p-10">
                <div class="text-center">
                    No Student Found
                </div>
            </div>
        @endforelse
    </div>
</div>
