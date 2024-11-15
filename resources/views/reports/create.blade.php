<x-app-layout>
    <form method="POST" action="{{ route('reports.store') }}">
        @csrf
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Report') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                    <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                        
                        <!-- Child Name -->
                        <div>
                            <x-input-label for="child_name" :value="__('Child Name')" />
                            <x-text-input id="child_name" class="block mt-1 w-full" type="text" name="child_name"
                                :value="old('child_name')" required autofocus autocomplete="child_name" />
                            <x-input-error :messages="$errors->get('child_name')" class="mt-2" />
                        </div>

                        <!-- Class -->
                        <div class="mt-4">
                            <x-input-label for="class" :value="__('Class')" />
                            <x-text-input id="class" class="block mt-1 w-full" type="text" name="class"
                                :value="old('class')" required autocomplete="class" />
                            <x-input-error :messages="$errors->get('class')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <x-text-input id="status" class="block mt-1 w-full" type="text" name="status"
                                :value="old('status')" required />
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <!-- Report Date -->
                        <div class="mt-4">
                            <x-input-label for="report_date" :value="__('Report Date')" />
                            <x-text-input id="report_date" class="block mt-1 w-full" type="date" name="report_date"
                                :value="old('report_date')" required />
                            <x-input-error :messages="$errors->get('report_date')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div class="mt-4">
                            <x-input-label for="category" :value="__('Category')" />
                            <x-text-input id="category" class="block mt-1 w-full" type="text" name="category"
                                :value="old('category')" required autocomplete="category" />
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="description" required>{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Teacher Notes -->
                        <div class="mt-4">
                            <x-input-label for="teacher_notes" :value="__('Teacher Notes')" />
                            <textarea id="teacher_notes" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="teacher_notes">{{ old('teacher_notes') }}</textarea>
                            <x-input-error :messages="$errors->get('teacher_notes')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-link-button class="ms-4" href="{{ route('reports.index') }}">
                                {{ __('Back') }}
                            </x-link-button>
                            <x-primary-button class="ms-4">
                                {{ __('Save Report') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
