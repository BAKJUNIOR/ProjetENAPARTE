<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RendezVouse>
 */
class RendezVouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => Client::factory(),
            'user_id' => User::factory(),
            'service_id' => Service::factory(),
            'date' => $this->faker->date,
            'heure' => $this->faker->time,
            'status' => $this->faker->randomElement(['en_attente', 'confirmer', 'annule']),
            'etat' => $this->faker->randomElement(['termine', 'en_cours', 'annule']),
        ];
    }
}
