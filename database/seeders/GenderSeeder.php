<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create([
            'name'   => 'Masculino',
            'status' => 1,
        ]);

        Gender::create([
            'name'   => 'feminino',
            'status' => 1,
        ]);
    }
}
