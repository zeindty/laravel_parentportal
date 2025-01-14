<x-app-layout>
    <form method="POST" action="{{ route('childs.store') }}">
        @csrf
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Add Child') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                    <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" 
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        
                        <div>
                            <x-input-label for="gender" :value="__('Gender')" />
                            <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" 
                                :value="old('gender')" required autofocus autocomplete="gender" />
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>
                        
                        <div>
                            <x-input-label for="age" :value="__('Age')" />
                            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" 
                                :value="old('age')" required autofocus autocomplete="age" />
                            <x-input-error :messages="$errors->get('age')" class="mt-2" />
                        </div>
                        
                        <div>
                            <x-input-label for="birth" :value="__('Birth')" />
                            <x-text-input id="birth" class="block mt-1 w-full" type="date" name="birth" 
                                :value="old('birth')" required autofocus autocomplete="birth" />
                            <x-input-error :messages="$errors->get('birth')" class="mt-2" />
                        </div>
                        
                        <div>
                            <x-input-label for="parent" :value="__('Parent')" />
                            <x-text-input id="parent" class="block mt-1 w-full" type="text" name="parent" 
                                :value="old('parent')" required autofocus autocomplete="parent" />
                            <x-input-error :messages="$errors->get('parent')" class="mt-2" />
                        </div>
                        
                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" 
                                :value="old('address')" required autofocus autocomplete="address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                        



                        <div class="flex items-center justify-end mt-4">
                            <x-link-button class="ms-4" :href="route('childs.index')">
                                {{ __('Back') }}
                            </x-link-button>
                            <x-primary-button class="ms-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
</x-app-layout>
