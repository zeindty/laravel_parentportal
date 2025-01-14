<x-app-layout>
    <form method="POST" action="{{ route('childs.update', $child->id) }}">
        @csrf
        @method('PUT') <!-- Use PUT method for form edit -->

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Child Data') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                    <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">

                        <!-- Child Name -->
                        <div class="mt-2">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" 
                                :value="old('name', $child->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- NISN -->
                        <div class="mt-2">
                            <x-input-label for="NISN" :value="__('NISN')" />
                            <x-text-input id="NISN" class="block mt-1 w-full" type="text" name="NISN" 
                                :value="old('NISN', $child->NISN)" required />
                            <x-input-error :messages="$errors->get('NISN')" class="mt-2" />
                        </div>

                        <!-- Class -->
                        <div class="mt-2">
                            <x-input-label for="class" :value="__('Class')" />
                            <select id="class" name="class" class="block mt-1 w-full border-gray-300 focus:border-gray-800 focus:ring-indigo-500 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-200 dark:border-gray-600">
                                <option value="A" {{ old('class', $child->class) == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ old('class', $child->class) == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ old('class', $child->class) == 'C' ? 'selected' : '' }}>C</option>
                            </select>
                            <x-input-error :messages="$errors->get('class')" class="mt-2" />
                        </div>

                        <!-- Gender -->
                        <div class="mt-2">
                            <x-input-label for="gender" :value="__('Gender')" />
                            <select id="gender" name="gender" class="block mt-1 w-full border-gray-300 focus:border-gray-800 focus:ring-indigo-500 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-200 dark:border-gray-600">
                                <option value="male" {{ old('gender', $child->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $child->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>

                        <!-- Birth Date -->
                        <div class="mt-2">
                            <x-input-label for="birth" :value="__('Birth Date')" />
                            <x-text-input id="birth" class="block mt-1 w-full" type="date" name="birth" 
                                :value="old('birth', $child->birth)" required />
                            <x-input-error :messages="$errors->get('birth')" class="mt-2" />
                        </div>

                        <!-- Parent -->
                        <div class="mt-2">
                            <x-input-label for="parent" :value="__('Parent')" />
                            <select id="parent" name="parent" class="block dark:border-gray-700 mt-1 w-full dark:bg-gray-900 rounded-md">
                                @foreach($users as $user)
                                    <option value="{{ $user->name }}" {{ old('parent', $child->parent) == $user->name ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('parent')" class="mt-2" />
                        </div>

                        <!-- Address -->
                        <div class="mt-2">
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" 
                                :value="old('address', $child->address)" required />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <!-- Form Actions -->
                        <div class="flex items-center justify-end mt-4">
                            <x-link-button class="ms-4" :href="route('childs.index')">
                                {{ __('Back') }}
                            </x-link-button>
                            <x-primary-button class="ms-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
