<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Employee::where('name', 'Maria Aparecida')->first()){
           Employee::create([
            'name' => 'Maria Aparecida',
            'email' => 'maria@gmail.com',
            'phone' => '(11) 91234-5678',
            'age' => 30,
            'description' => 'Colaborador Maria Aparecida cadastrado automaticamente para teste',
            'team_id' => 6
           ]); 
        }

        if(!Employee::where('name', 'Pedro Aparecido')->first()){
            Employee::create([
             'name' => 'Pedro Aparecido',
             'email' => 'pedro@gmail.com',
             'phone' => '(11) 91235-5679',
             'age' => 30,
             'description' => 'Colaborador Pedro Aparecido cadastrado automaticamente para teste',
             'team_id' => 7
            ]); 
         }

         if(!Employee::where('name', 'João Aparecido')->first()){
            Employee::create([
             'name' => 'João Aparecido',
             'email' => 'joao@gmail.com',
             'phone' => '(11) 91236-5680',
             'age' => 30,
             'description' => 'Colaborador João Aparecido cadastrado automaticamente para teste',
             'team_id' => 8
            ]); 
         }
    }
}
