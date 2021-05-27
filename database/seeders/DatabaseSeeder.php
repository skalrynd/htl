<?php

namespace Database\Seeders;

use App\Models\Key;
use App\Models\Technician;
use App\Models\Vehicle;
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
        Vehicle::factory()->count(20)->has(Key::factory()->count(3))->create();
        Technician::factory()->count(10)->create();
    }
}
