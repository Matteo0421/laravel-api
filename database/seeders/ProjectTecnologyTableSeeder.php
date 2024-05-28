<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Tecnology;

class ProjectTecnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 300; $i++){

            $project = Project::inRandomOrder()->first();

            $tecnolocy_id = Tecnology::inRandomOrder()->first();

            $project->tecnologies()->attach( $tecnolocy_id);
        }
    }
}
