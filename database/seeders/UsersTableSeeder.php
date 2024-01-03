<?php

namespace Database\Seeders;

use App\Models\RendezVouse;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RendezVouse::factory(5)
            ->has(User::factory())
            ->create();
    }
}
