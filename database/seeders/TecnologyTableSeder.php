<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tecnology;
use App\Functions\Helper;
use Faker\Generator as Faker;

class TecnologyTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $data = ['html', 'Css', 'Javascript', 'PHP', 'C++', 'Angular'];


        foreach($data as $item){
            $new_tecnology = new Tecnology();
            $new_tecnology->title = $item;
            $new_tecnology->slug  = Helper::generateSlug($new_tecnology, Tecnology::class);
            $new_tecnology->language  = $faker->sentence();
            $new_tecnology->file  = $faker->numberBetween(1, 500);

            $new_tecnology->save();

        }

        // for($i = 0;$i <200; $i++){
        //     $new_tecnology = new Tecnology();
        //     $new_tecnology->title  = $faker->sentence();
        //     $new_tecnology->slug  = Helper::generateSlug($new_tecnology, Tecnology::class);
        //     $new_tecnology->language  = $faker->sentence();
        //     $new_tecnology->file  = $faker->numberBetween(1, 500);

        //     $new_tecnology->save();
        // }
    }
}
