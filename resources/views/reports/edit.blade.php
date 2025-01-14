<x-app-layout>
    <form method="POST" action="{{ route('reports.update', $report->id) }}">
        @csrf
        @method('PUT')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Report') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                    <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">

                        <!-- Child Name (Dropdown) -->
                        <div>
                            <x-input-label for="child_name" :value="__('Child Name')" />
                            <select id="child_name"
                                class="block dark:border-gray-700 mt-1 w-full dark:bg-gray-900 rounded-md"
                                name="child_name" required>
                                <option value="" disabled>{{ __('Select a Child') }}</option>
                                @foreach ($children as $child)
                                    <option value="{{ $child->name }}"
                                        {{ old('child_name', $report->child_name) == $child->name ? 'selected' : '' }}>
                                        {{ $child->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('child_name')" class="mt-2" />
                        </div>

                        <!-- Teacher Name -->
                        <div class="mt-2">
                            <x-input-label for="teacher_name" :value="__('Teacher Name')" />
                            <select id="teacher_name" name="teacher_name"
                                class="block dark:border-gray-700 mt-1 w-full dark:bg-gray-900 rounded-md">
                                @foreach ($guru as $teacher)
                                    <option value="{{ $teacher->name }}"
                                        {{ old('teacher_name', $report->teacher_name) == $teacher->name ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('teacher_name')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" name="status"
                                class="block dark:border-gray-700 mt-1 w-full dark:bg-gray-900 rounded-md" required>
                                <option value="draft" {{ old('status', $report->status) == 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>
                                <option value="approve" {{ old('status', $report->status) == 'approve' ? 'selected' : '' }}>
                                    Approve
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <!-- Report Date -->
                        <div class="mt-4">
                            <x-input-label for="report_date" :value="__('Report Date')" />
                            <x-text-input id="report_date" class="block mt-1 w-full" type="date" name="report_date"
                                :value="old('report_date', \Carbon\Carbon::parse($report->report_date)->format('Y-m-d'))"
                                required />
                            <x-input-error :messages="$errors->get('report_date')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description"
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                name="description" required>{{ old('description', $report->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Scores -->
                        <div class="mt-4">
                            <x-input-label for="scores" :value="__('Scores')" />
                            <x-text-input id="scores" class="block mt-1 w-full" type="number" name="scores"
                                :value="old('scores', $report->scores)" step="0.1" min="0" />
                            <x-input-error :messages="$errors->get('scores')" class="mt-2" />
                        </div>

                        <!-- Club -->
                        <div class="mt-4">
                            <x-input-label for="club" :value="__('Club')" />
                            <select id="club" name="club"
                                class="block dark:border-gray-700 mt-1 w-full dark:bg-gray-900 rounded-md">
                                <option value="" disabled>{{ __('Select a Club') }}</option>
                                <option value="Art Club" {{ old('club', $report->club) == 'Art Club' ? 'selected' : '' }}>
                                    Art Club
                                </option>
                                <option value="Music Club"
                                    {{ old('club', $report->club) == 'Music Club' ? 'selected' : '' }}>Music Club
                                </option>
                                <option value="Sports Club"
                                    {{ old('club', $report->club) == 'Sports Club' ? 'selected' : '' }}>Sports Club
                                </option>
                                <option value="Science Club"
                                    {{ old('club', $report->club) == 'Science Club' ? 'selected' : '' }}>Science Club
                                </option>
                                <option value="Drama Club" {{ old('club', $report->club) == 'Drama Club' ? 'selected' : '' }}>
                                    Drama Club
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('club')" class="mt-2" />
                        </div>

                        <!-- Teacher Notes -->
                        <div class="mt-4">
                            <x-input-label for="teacher_notes" :value="__('Teacher Notes')" />
                            <textarea id="teacher_notes"
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                name="teacher_notes">{{ old('teacher_notes', $report->teacher_notes) }}</textarea>
                            <x-input-error :messages="$errors->get('teacher_notes')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-link-button class="ms-4" href="{{ route('reports.index') }}">
                                {{ __('Back') }}
                            </x-link-button>
                            <x-primary-button class="ms-4">
                                {{ __('Save Changes') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
