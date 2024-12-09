<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states= [
            ['id' => '1','name' => 'Activo'],
            ['id' => '2','name' => 'Inactivo'],
        ];

        foreach ($states as $state){
            State::create($state);
        }
    }
}
