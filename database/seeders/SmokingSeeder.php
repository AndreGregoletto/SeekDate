<?php

namespace Database\Seeders;

use App\Models\Smoking;
use Illuminate\Database\Seeder;

class SmokingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Smoking::create([
            'name' => 'Sim',
        ]);

        Smoking::create([
            'name' => 'Não',
        ]);
    }
}
