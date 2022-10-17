<?php

namespace Database\Seeders;

use App\Models\SexualOrietation;
use Illuminate\Database\Seeder;

class SexualOrietationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SexualOrietation::create([
            'name'   => 'Heterosexual',
        ]);

        SexualOrietation::create([
            'name'   => 'Homosexual',
        ]);
    }
}
