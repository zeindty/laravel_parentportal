<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'name' => 'Pertemuan Orang Tua dan Guru',
            'date' => '2024-11-20',
            'category' => 'Pertemuan',
            'description' => 'Pertemuan antara orang tua dan guru untuk membahas perkembangan siswa.',
            'image' => null,
            'status' => 'active',
        ]);

        Event::create([
            'name' => 'Hari Raya Anak-Anak',
            'date' => '2024-12-01',
            'category' => 'Perayaan',
            'description' => 'Perayaan khusus untuk anak-anak dengan berbagai kegiatan menarik.',
            'image' => null,
            'status' => 'active',
        ]);

        Event::create([
            'name' => 'Lomba Kreativitas Anak',
            'date' => '2025-01-15',
            'category' => 'Lomba',
            'description' => 'Lomba kreativitas untuk anak-anak yang diselenggarakan di sekolah.',
            'image' => null,
            'status' => 'active',
        ]);

        Event::create([
            'name' => 'Field Trip ke Taman Safari',
            'date' => '2025-02-10',
            'category' => 'Kunjungan',
            'description' => 'Kunjungan ke Taman Safari untuk melihat berbagai hewan dan edukasi.',
            'image' => null,
            'status' => 'active',
        ]);

        Event::create([
            'name' => 'Peringatan Hari Kartini',
            'date' => '2025-04-21',
            'category' => 'Perayaan',
            'description' => 'Perayaan Hari Kartini untuk mengenang jasa R.A. Kartini dengan berbagai kegiatan.',
            'image' => null,
            'status' => 'active',
        ]);

        // Menambahkan 5 data lainnya
        for ($i = 6; $i <= 10; $i++) {
            Event::create([
                'name' => 'Event ' . $i,
                'date' => now()->addDays($i),
                'category' => 'Kategori ' . $i,
                'description' => 'Deskripsi untuk event ' . $i,
                'image' => null,
                'status' => 'active',
            ]);
        }
    }
}

