<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("questions")->insert([
            [
                'Titre' => 'wich one in the form simple past',
                'Option1' => 'i will win this chaleng',
                'Option2' => 'i played football',
                'Id_examen' => '1',
            ],
            
            [
                'Titre' => 'wich one in the form futur',
                'Option1' => 'i will win this chaleng',
                'Option2' => 'i played football',
                'Id_examen' => '1',
            ],

            [
                'Titre' => 'what is the result of 2/2',
                'Option1' => '0',
                'Option2' => '1',
                'Id_examen' => '2',
            ],
        ]);
    }
}
