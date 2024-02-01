<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamensSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("examens")->insert([
            [
                'Titre' => 'Past simple',
                'Description' => 'this examen will be the last so take your time and goodluck',
                'Date_debut' => '2024-05-22',
                'Date_fin' => '2024-05-22',
            ],
            
            [
                'Titre' => 'Mathematics Final Exam',
                'Description' => 'This is the final mathematics exam for the semester.',
                'Date_debut' => '2024-05-20',
                'Date_fin' => '2024-05-25',
            ],
        ]);
    }
}
