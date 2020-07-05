<?php

use Illuminate\Database\Seeder;
use function GuzzleHttp\json_decode;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i =0; $i<200;$i++){
            DB::table('products')->insert(
                [
                    "name"=> $faker->catchPhrase,
                    "writer"=>$faker->name,
                    "describe"=>$faker->text,
                    "price"=>$faker->numberBetween(50000,500000),
                    "category_id"=>$faker->numberBetween(1,4),
                    "img"=>"/images/" . strval($faker->numberBetween(1,10)) .".jpg"
                ]
                );
        }
    }
}
