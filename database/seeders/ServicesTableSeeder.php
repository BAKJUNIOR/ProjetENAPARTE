<?php

namespace Database\Seeders;

use App\Models\RendezVouse;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RendezVouse::factory(5)
            ->has(Service::factory())
            ->create();
    }
}
