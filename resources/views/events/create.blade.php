<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 sm:rounded-lg">
                    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Nama Event -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Event Name</label>
                            <input type="text" id="name" name="name" required 
                                class="w-full px-4 py-2 mt-1 border rounded-md dark:bg-gray-700 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="Enter event name">
                        </div>

                        <!-- Tanggal Event -->
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Event Date</label>
                            <input type="date" id="date" name="date" required 
                                class="w-full px-4 py-2 mt-1 border rounded-md dark:bg-gray-700 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Kategori Event -->
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                            <select id="category" name="category" required 
                                class="w-full px-4 py-2 mt-1 border rounded-md dark:bg-gray-700 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="academic">Academic</option>
                                <option value="school_event">School Event</option>
                                <option value="holiday">Holiday</option>
                            </select>
                        </div>

                        <!-- Deskripsi Event -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea id="description" name="description" rows="4" 
                                class="w-full px-4 py-2 mt-1 border rounded-md dark:bg-gray-700 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter event description"></textarea>
                        </div>

                        <!-- Gambar Event -->
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Event Image</label>
                            <input type="file" id="image" name="image" accept="image/*" 
                                class="w-full px-4 py-2 mt-1 border rounded-md dark:bg-gray-700 dark:text-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex justify-end">
                            <button type="submit" 
                                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save Event</button>
                            <a href="{{ route('events.index') }}" 
                                class="ml-2 px-4 py-2 text-gray-700 bg-gray-300 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

