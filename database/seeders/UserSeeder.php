<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name'                  => 'admin',
            'email'                 => 'admin@email.com',
            'password'              => 123,
            'nick_name'             => 'adm',
            'cell'                  => '123456789',
            'year'                  => '20/12/1997',
            'photo'                 => '',
            'description'           => 'teste',
            'job'                   => 'dev',
            'livin_in'              => 'sp',
            'gender_id'             => 1,
            'sexual_orientation_id' => 1,
            'smoking_id'            => 1,
            'filter_id'             => 1,
            'admin'                 => 1
        ]);
    }
}
