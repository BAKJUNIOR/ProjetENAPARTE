<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\RendezVouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::factory(5)
            ->has(RendezVouse::factory()->count(3))
            ->create();
    }
}
