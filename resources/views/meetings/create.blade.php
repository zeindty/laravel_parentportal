<x-app-layout>
    <form method="POST" action="{{ route('meetings.store') }}">
        @csrf
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Meeting') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                    <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">

                        <!-- Child Name -->
                        <div class="mt-2">
                            <x-input-label for="user_id" :value="__('User')" />
                            <select id="user_id" name="user_id" class="block dark:border-gray-700 mt-1 w-full dark:bg-gray-900 rounded-md">
                                @foreach($users as $user)
                                    <option value="{{ $user->name }}" {{ old('user_id') == $user->name ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>

                        <div class="mt-2">
                            <x-input-label for="teacher_id" :value="__('User')" />
                            <select id="teacher_id" name="teacher_id" class="block dark:border-gray-700 mt-1 w-full dark:bg-gray-900 rounded-md">
                                @foreach($guru as $guru)
                                    <option value="{{ $guru->name }}" {{ old('teacher_id') == $guru->name ? 'selected' : '' }}>{{ $guru->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('teacher_id')" class="mt-2" />
                        </div>

                        <!-- Meeting Date -->
                        <div class="mt-4">
                            <x-input-label for="meeting_date" :value="__('Meeting Date')" />
                            <x-text-input id="meeting_date" class="block mt-1 w-full" type="date" name="meeting_date"
                                :value="old('meeting_date')" required />
                            <x-input-error :messages="$errors->get('meeting_date')" class="mt-2" />
                        </div>

                        <!-- Meeting Date -->
                        <div class="mt-4">
                            <x-input-label for="meeting_time" :value="__('Meeting Time')" />
                            <x-text-input id="meeting_time" class="block mt-1 w-full" type="time" name="meeting_time"
                                :value="old('meeting_time')" required />
                            <x-input-error :messages="$errors->get('meeting_time')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <x-text-input id="status" class="block mt-1 w-full" type="text" name="status"
                                :value="old('status')" required />
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        

                        <div class="flex items-center justify-end mt-4">
                            <x-link-button class="ms-4" href="{{ route('meetings.index') }}">
                                {{ __('Back') }}
                            </x-link-button>
                            <x-primary-button class="ms-4">
                                {{ __('Save Meeting') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
