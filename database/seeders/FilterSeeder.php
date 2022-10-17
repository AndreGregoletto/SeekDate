<?php

namespace Database\Seeders;

use App\Models\Filter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Filter::create([
            'sexual_orientation_id' => 1,
            'gender_id'             => 1,
            'smoking_id'            => 1,
            'year_min'              => 18,
            'year_max'              => 60
        ]);
    }
}
