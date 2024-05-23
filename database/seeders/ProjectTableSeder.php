<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Functions\Helper;

class ProjectTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0;$i <5; $i++){
            $new_project = new Project();
            $new_project->title  = $faker->words(3, true);
            $new_project->slug  = Helper::generateSlug($new_project, Project::class);
            $new_project->description  = $faker->paragraphs(1, true);
            $new_project->language  = $faker->words(1, true);

            $new_project->save();
        }

    }
}
