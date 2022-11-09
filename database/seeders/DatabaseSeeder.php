<?php

namespace Database\Seeders;

use App\Models\Combine;
use App\Models\User;
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
        $this->call([
            SexualOrietationSeeder::class,
            SmokingSeeder::class,
            GenderSeeder::class,
            FilterSeeder::class,
            UserSeeder::class,
        ]);
        User::factory(200)->create();
        Combine::factory(2200)->create();

    }
}
