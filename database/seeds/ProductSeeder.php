<?php

use Illuminate\Database\Seeder;
use function GuzzleHttp\json_decode;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productFile = fopen('products.json','r');
        $productsData = fread($productFile,filesize('products.json'));
        fclose($productFile);
        $productsData = json_decode($productsData);
        foreach($productsData as $product){
            DB::table('products')->insert([
                "name"=>$product->name,
                "price"=>$product->price,
                "describe"=>$product->describe,
                "writer"=>$product->writer,
                "img"=>'none'

            ]);
        }
    }
}
