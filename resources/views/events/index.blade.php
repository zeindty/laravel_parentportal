<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Calendar Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between py-5 mb-5">
                        <div class="md:mt-0 sm:flex-none w-72">
                            <form action="{{ route('events.index') }}" method="GET">
                                <input type="text" name="search" placeholder="Search for events"
                                    class="w-full relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300" />
                            </form>
                        </div>
                        <div class="sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('events.create') }}"
                                class="relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                                + Add New Event
                            </a>
                        </div>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-sm text-gray-700 uppercase bg-white dark:bg-gray-800">
                                <tr class="bg-white border-t border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="col" class="px-6 py-3 text-center">NO</th>
                                    <th scope="col" class="px-6 py-3 text-center">Event Name</th>
                                    <th scope="col" class="px-6 py-3 text-center">Date</th>
                                    <th scope="col" class="px-6 py-3 text-center">Category</th>
                                    <th scope="col" class="px-6 py-3 text-center">Description</th>
                                    <th scope="col" class="px-6 py-3 text-center">Image</th>
                                    <th scope="col" class="px-6 py-3 text-center">Status</th>
                                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($events as $event)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 text-center">{{ $events->firstItem() + $loop->index }}</td>

                                        <td class="px-6 py-2 text-center">{{ $event->name }}</td>
                                        <td class="px-6 py-2 text-center">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</td>
                                        <td class="px-6 py-2 text-center">{{ $event->category }}</td>
                                        <td class="px-6 py-2 text-center">{{ $event->description }}</td>
                                        <td class="px-6 py-2 text-center">
                                            @if ($event->image)
                                                <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="w-16 h-16 object-cover rounded">
                                            @else
                                                <span class="text-gray-500">No Image</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-2 text-center">{{ $event->status }}</td>
                                        <td class="px-6 py-2 text-center">
                                            <div class="flex justify-center space-x-2">
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('events.edit', $event->id) }}" 
                                                   class="focus:outline-none text-gray-50 bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-5 py-2.5 dark:focus:ring-yellow-900">
                                                    EDIT
                                                </a>
                                                <!-- Tombol Delete -->
                                                <form onsubmit="return confirm('Are you sure?');" action="{{ route('events.destroy', $event->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                        DELETE
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-2">No events available!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="relative p-3">
                            {{ $events->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- FullCalendar Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm w-full max-w-7xl mx-auto">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Calendar</h3>
                    <div id="calendar" class="calendar-container"></div> <!-- FullCalendar will render here -->
                </div>
            </div>

            <style>
                .calendar-container {
                    height: 300px;
                }
            </style>

        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.0/dist/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: {!! json_encode($events->map(function($event) {
                    return [
                        'title' => $event->name,
                        'start' => \Carbon\Carbon::parse($event->date)->format('Y-m-d'),
                        'description' => $event->description,
                    ];
                })) !!},
                // Additional FullCalendar options here
            });
        });
    </script>
    
    @endpush
</x-app-layout>
