<?php

namespace Database\Factories;

use App\Models\Filter;
use App\Models\Gender;
use App\Models\Smoking;
use App\Models\SexualOrietation;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $imagens = [
            'photo/dana_okon_prof_chet_donnelly_i.jpg',
            'photo/alana_oreilly_camryn_bernhard.jpg',
            'photo/admin_usuario_admin.jpg',
            'photo/alphonso_muller_fabian_mcglynn.jpg',
            'photo/doyle_russel_donato_shanahan.jpg',
            'photo/dr_dayna_zboncak_leone_jerde.jpg',
            'photo/ed_mueller_travon_kassulke.jpg',
            'photo/elaina_schulist_audreanne_volkman.jpg',
            'photo/esperanza_champlin_ii_angelica_bradtke.jpg',
            'photo/fausto_heller_phd_adelia_fadel_v.jpg',
            'photo/ignatius_swaniawski_murphy_welch_iv.jpg',
            'photo/katrina_skiles_janiya_fay.jpg',
            'photo/mr_jonatan_jakubowski_v_alberto_weissnat_sr.jpg',
            'photo/ms_nova_friesen_dr_shana_sporer_i.jpg',
            'photo/ms_rosanna_quitzon_camron_considine.jpg',
            'photo/ms_tracy_walker_dds_lurline_prohaska.png',
            'photo/nella_ernser_martine_lindgren.jpg',
            'photo/ottilie_stamm_howell_mills.jpg',
            'photo/pearline_wyman_alexa_johns.jpg',
            'photo/phyllis_rippin_rodolfo_stracke.jpg',
            'photo/prof_casimer_dickens_iii_alaina_fisher_iv.jpg',
            'photo/prof_leonardo_jacobson_iv_emmett_schoen.jpg',
            'photo/prof_selmer_schoen_melyna_macejkovic.jpg',
            'photo/sandrine_bechtelar_leanna_botsford_ii.jpg',
            'photo/violette_heaney_kayli_tremblay.jpg',
        ];

        return [
            'name'                  => fake()->name(),
            'email'                 => fake()->unique()->safeEmail(),
            'password'              => 123,
            'nick_name'             => fake()->name(),
            'cell'                  => fake()->phoneNumber(),
            'year'                  => fake()->numberBetween(18, 80),
            'photo'                 => fake()->randomElement($imagens),
            'description'           => fake()->sentence(),
            'job'                   => fake()->jobTitle(),
            'livin_in'              => fake()->address(),
            'gender_id'             => fake()->randomElement($genderId),
            'sexual_orientation_id' => fake()->randomElement($sexualId),
            'smoking_id'            => fake()->randomElement($smokingId),
            'filter_id'             => Filter::create([
                'sexual_orientation_id' => fake()->randomElement($sexualId),
                'gender_id'             => fake()->randomElement($genderId),
                'smoking_id'            => fake()->randomElement($smokingId),
                'year_min'              => fake()->numberBetween(18, 25),
                'year_max'              => fake()->numberBetween(26, 80)
            ]),
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
