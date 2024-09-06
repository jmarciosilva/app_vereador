<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Team::where('name', 'Equipe do Beto')->first()) {
            Team::create(['name' => 'Equipe do Beto']);
        }

        if(!Team::where('name', 'Equipe da Mônica')->first()) {
            Team::create(['name' => 'Equipe da Mônica']);
        }

        if(!Team::where('name', 'Equipe do Ricardinho')->first()) {
            Team::create(['name' => 'Equipe do Ricardinho']);
        }
        
    }
}
