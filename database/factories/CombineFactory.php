<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Combine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Combine>
 */
class CombineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();
        
        return [

            Combine::create([
                'user_first_id'       => fake()->randomElement($users),
                'user_first_active'   => fake()->numberBetween(0, 1),
                'user_secound_id'     => fake()->randomElement($users),
                'user_secound_active' => fake()->numberBetween(0, 1),
                'active'              => fake()->numberBetween(0, 1)
            ]),
        ];
    }
}
