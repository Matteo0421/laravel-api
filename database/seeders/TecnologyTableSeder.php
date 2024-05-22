<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tencology;
use App\Functions\Helper;
use Faker\Generator as Faker;

class TecnologyTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0;$i <200; $i++){
            $new_tecnology = new Tencology();
            $new_tecnology->title  = $faker->sentence();
            $new_tecnology->slug  = Helper::generateSlug($new_tecnology, Tencology::class);
            $new_tecnology->language  = $faker->sentence();
            $new_tecnology->file  = $faker->numberBetween(1, 500);

            $new_tecnology->save();
        }
    }
}
