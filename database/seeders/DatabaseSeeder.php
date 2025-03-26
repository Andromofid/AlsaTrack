<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buc;
use App\Models\Bus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Buc::create([
            'n_bus'=>13,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>14,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>15,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>16,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>17,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>18,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>19,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>22,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>23,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>24,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>25,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>26,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>27,
            'latitude'=>33,
            'longitude'=>-7
        ]);
        Buc::create([
            'n_bus'=>28,
            'latitude'=>33,
            'longitude'=>-7
        ]);

    }
}
