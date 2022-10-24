<?php

namespace Database\Factories;

use App\Models\Gender;
use App\Models\SexualOrietation;
use App\Models\Smoking;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $genderId  = Gender::pluck('id')->toArray();
        $sexualId  = SexualOrietation::pluck('id')->toArray();
        $smokingId = Smoking::pluck('id')->toArray();

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 123,
            'nick_name'             => fake()->name(),
            'cell'                  => fake()->phoneNumber(),
            'year'                  => fake()->numberBetween(18, 80),
            'photo'                 => fake()->imageUrl(),
            'description'           => fake()->sentence(),
            'job'                   => fake()->jobTitle(),
            'livin_in'              => fake()->address(),
            'gender_id'             => fake()->randomElement($genderId),
            'sexual_orientation_id' => fake()->randomElement($sexualId),
            'smoking_id'            => fake()->randomElement($smokingId),
            'filter_id'             => 1,
            'admin'                 => 0
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
