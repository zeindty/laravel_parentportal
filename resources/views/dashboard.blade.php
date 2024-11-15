<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Ringkasan Penting -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Jumlah Pengguna Aktif -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Pengguna Aktif</h3>
                    <p class="text-2xl font-bold text-blue-500">25</p> <!-- Ganti angka dengan data dinamis -->
                </div>
                
                <!-- Total Siswa -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Total Siswa</h3>
                    <p class="text-2xl font-bold text-green-500">120</p> <!-- Ganti angka dengan data dinamis -->
                </div>
                
                <!-- Jumlah Postingan di Forum -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Postingan Forum</h3>
                    <p class="text-2xl font-bold text-purple-500">85</p> <!-- Ganti angka dengan data dinamis -->
                </div>
                
                <!-- Jumlah Aktivitas Terkini -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktivitas Terkini</h3>
                    <p class="text-2xl font-bold text-yellow-500">18</p> <!-- Ganti angka dengan data dinamis -->
                </div>
            </div>

            <!-- Grafik Jumlah Pengguna Harian dan Jumlah Siswa per Kelas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                
                <!-- Grafik Jumlah Pengguna Harian -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Jumlah Pengguna Harian</h3>
                    <canvas id="dailyUsersChart"></canvas>
                </div>

                <!-- Grafik Jumlah Siswa per Kelas -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Jumlah Siswa per Kelas</h3>
                    <canvas id="classStudentsChart"></canvas>
                </div>
            </div>

            <!-- Shortcut ke Fitur Utama -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Shortcut ke Kalender Kegiatan -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-800 dark:text-gray-200 font-semibold">Kalender Kegiatan</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Lihat jadwal kegiatan sekolah</p>
                    </div>
                    <a href="#" class="text-blue-500 dark:text-blue-300 hover:underline">
                        Lihat
                    </a>
                </div>

                <!-- Shortcut ke Galeri -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-800 dark:text-gray-200 font-semibold">Galeri</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Lihat foto dan video kegiatan</p>
                    </div>
                    <a href="#" class="text-blue-500 dark:text-blue-300 hover:underline">
                        Lihat
                    </a>
                </div>
            </div>
        </div>  
    </div>

    <!-- Tambahkan Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data untuk grafik Jumlah Pengguna Harian (Contoh data, ganti dengan data dinamis)
        const dailyUsersData = {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [{
                label: 'Pengguna Harian',
                data: [12, 19, 3, 5, 2, 3, 7], // Contoh data
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Konfigurasi Grafik Jumlah Pengguna Harian
        const dailyUsersConfig = {
            type: 'line',
            data: dailyUsersData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        };

        // Render Grafik Jumlah Pengguna Harian
        const dailyUsersChart = new Chart(
            document.getElementById('dailyUsersChart'),
            dailyUsersConfig
        );

        // Data untuk Grafik Jumlah Siswa per Kelas
        const classStudentsData = {
            labels: ['Kelas A', 'Kelas B', 'Kelas C', 'Kelas D'],
            datasets: [{
                label: 'Jumlah Siswa',
                data: [30, 25, 35, 30], // Contoh data
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Konfigurasi Grafik Jumlah Siswa per Kelas
        const classStudentsConfig = {
            type: 'bar',
            data: classStudentsData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        };

        // Render Grafik Jumlah Siswa per Kelas
        const classStudentsChart = new Chart(
            document.getElementById('classStudentsChart'),
            classStudentsConfig
        );
    </script>
</x-app-layout>
