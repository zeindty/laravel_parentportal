<!-- filepath: /C:/Users/asus/Documents/VSCode Project/test-laravel-app/resources/views/history/cetak.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Meeting Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
            <div class="bg-gray-800 rounded-md p-6 shadow-md">
                <h1 class="text-2xl font-bold mb-4">Print Report</h1>
                <form method="GET" action="" class="flex justify-start gap-4">
                    @csrf
                    <div class="mb-4">
                        <label for="start_date" class="block font-medium mb-2">Tanggal Mulai:</label>
                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required class="rounded w-52 text-gray-800">
                    </div>
                    <div class="mb-4">
                        <label for="end_date" class="block font-medium mb-2">Tanggal Selesai:</label>
                        <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" required class="rounded w-52 text-gray-800">
                    </div>
                    {{-- <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
                        Ekspor
                    </button> --}}
                </form>
                <form method="GET" action="{{ route('cetak.pdf') }}" target="_blank" class="mt-4">
                    @csrf
                    <input type="hidden" id="pdf_start_date" name="start_date" value="{{ old('start_date') }}">
                    <input type="hidden" id="pdf_end_date" name="end_date" value="{{ old('end_date') }}">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
                        Ekspor
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const pdfStartDateInput = document.getElementById('pdf_start_date');
        const pdfEndDateInput = document.getElementById('pdf_end_date');

        startDateInput.addEventListener('change', function() {
            pdfStartDateInput.value = startDateInput.value;
        });

        endDateInput.addEventListener('change', function() {
            pdfEndDateInput.value = endDateInput.value;
        });
    });
</script>