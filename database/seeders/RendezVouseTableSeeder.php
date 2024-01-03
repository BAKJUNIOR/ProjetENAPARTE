<?php

namespace Database\Seeders;

use App\Models\RendezVouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RendezVouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RendezVouse::factory(5)->create();
    }
}
