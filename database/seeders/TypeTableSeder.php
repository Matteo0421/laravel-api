<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Functions\Helper;
use Faker\Generator as Faker;


class TypeTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $data = ['html', 'Css', 'Javascript', 'PHP', 'C++'];
        foreach($data as $item){
            $new_item = new Type();
            $new_item->title  = $faker->sentence();
            $new_item->slug  = Helper::generateSlug($new_item, Type::class);
            $new_item->categories = $item;

            $new_item->save();


        }
    }
}
