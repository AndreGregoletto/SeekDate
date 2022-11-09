<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Filter;
use App\Models\Gender;
use App\Models\Smoking;
use App\Models\SexualOrietation;
use Illuminate\Database\Seeder;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genderId  = Gender::pluck('id')->toArray();
        $sexualId  = SexualOrietation::pluck('id')->toArray();
        $smokingId = Smoking::pluck('id')->toArray();  
        
        User::create([
            'name'                  => 'admin',
            'email'                 => 'admin@email.com',
            'password'              => 123,
            'nick_name'             => 'adm',
            'cell'                  => '123456789',
            'year'                  => '18',
            'photo'                 => 'photo/ms_rosanna_quitzon_camron_considine.jpg',
            'description'           => 'teste',
            'job'                   => 'dev',
            'livin_in'              => 'sp',
            'gender_id'             => fake()->randomElement($genderId),
            'sexual_orientation_id' => fake()->randomElement($sexualId),
            'smoking_id'            => fake()->randomElement($smokingId),
            'filter_id'             => 1,
            'admin'                 => 1
        ]);
    }
}
