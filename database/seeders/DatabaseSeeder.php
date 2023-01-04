<?php

namespace Database\Seeders;

use App\Models\Categorybarang;
use App\Models\Kelas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Categorybarang::create([
            'nama' => 'Peralatan Dapur',
            'slug' => 'peralatan-dapur',
        ]);
        Categorybarang::create([
            'nama' => 'Peralatan Kontruksi',
            'slug' => 'peralatan-kontruksi',
        ]);
        Categorybarang::create([
            'nama' => 'Peralatan Kerja',
            'slug' => 'peralatan-kerja',
        ]);

    }
}
