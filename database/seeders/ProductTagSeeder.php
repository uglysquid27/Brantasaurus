<?php

namespace Database\Seeders;

use App\Models\Product_Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Product_Tag::create([
            'product_id' => '1',
            'tag_id' => '1',
        ]);
        Product_Tag::create([
            'product_id' => '1',
            'tag_id' => '5',
        ]);
        Product_Tag::create([
            'product_id' => '1',
            'tag_id' => '7',
        ]);
        //2
        Product_Tag::create([
            'product_id' => '2',
            'tag_id' => '1',
        ]);
        Product_Tag::create([
            'product_id' => '2',
            'tag_id' => '6',
        ]);
        Product_Tag::create([
            'product_id' => '2',
            'tag_id' => '20',
        ]);
        //3
        Product_Tag::create([
            'product_id' => '3',
            'tag_id' => '4',
        ]);
        Product_Tag::create([
            'product_id' => '3',
            'tag_id' => '5',
        ]);
        Product_Tag::create([
            'product_id' => '3',
            'tag_id' => '15',
        ]);
        //4
        Product_Tag::create([
            'product_id' => '4',
            'tag_id' => '3',
        ]);
        Product_Tag::create([
            'product_id' => '4',
            'tag_id' => '6',
        ]);
        Product_Tag::create([
            'product_id' => '4',
            'tag_id' => '12',
        ]);
        //5
        Product_Tag::create([
            'product_id' => '5',
            'tag_id' => '2',
        ]);
        Product_Tag::create([
            'product_id' => '5',
            'tag_id' => '6',
        ]);
        Product_Tag::create([
            'product_id' => '5',
            'tag_id' => '10',
        ]);
        //6
        Product_Tag::create([
            'product_id' => '6',
            'tag_id' => '1',
        ]);
        Product_Tag::create([
            'product_id' => '6',
            'tag_id' => '5',
        ]);
        Product_Tag::create([
            'product_id' => '6',
            'tag_id' => '9',
        ]);
        //7
        Product_Tag::create([
            'product_id' => '7',
            'tag_id' => '2',
        ]);
        Product_Tag::create([
            'product_id' => '7',
            'tag_id' => '5',
        ]);
        Product_Tag::create([
            'product_id' => '7',
            'tag_id' => '11',
        ]);
        //8
        Product_Tag::create([
            'product_id' => '8',
            'tag_id' => '3',
        ]);
        Product_Tag::create([
            'product_id' => '8',
            'tag_id' => '6',
        ]);
        Product_Tag::create([
            'product_id' => '8',
            'tag_id' => '13',
        ]);
        //9
        Product_Tag::create([
            'product_id' => '9',
            'tag_id' => '16',
        ]);
        Product_Tag::create([
            'product_id' => '9',
            'tag_id' => '21',
        ]);
        //10
        Product_Tag::create([
            'product_id' => '10',
            'tag_id' => '1',
        ]);
        Product_Tag::create([
            'product_id' => '10',
            'tag_id' => '5',
        ]);
        Product_Tag::create([
            'product_id' => '10',
            'tag_id' => '7',
        ]);
        //11
        Product_Tag::create([
            'product_id' => '11',
            'tag_id' => '3',
        ]);
        Product_Tag::create([
            'product_id' => '11',
            'tag_id' => '6',
        ]);
        Product_Tag::create([
            'product_id' => '11',
            'tag_id' => '14',
        ]);
        //12
        Product_Tag::create([
            'product_id' => '12',
            'tag_id' => '4',
        ]);
        Product_Tag::create([
            'product_id' => '12',
            'tag_id' => '5',
        ]);
        Product_Tag::create([
            'product_id' => '12',
            'tag_id' => '15',
        ]);
        //13
        Product_Tag::create([
            'product_id' => '13',
            'tag_id' => '1',
        ]);
        Product_Tag::create([
            'product_id' => '13',
            'tag_id' => '5',
        ]);
        Product_Tag::create([
            'product_id' => '13',
            'tag_id' => '9',
        ]);
        //14
        Product_Tag::create([
            'product_id' => '14',
            'tag_id' => '1',
        ]);
        Product_Tag::create([
            'product_id' => '14',
            'tag_id' => '6',
        ]);
        Product_Tag::create([
            'product_id' => '14',
            'tag_id' => '19',
        ]);
        //15
        Product_Tag::create([
            'product_id' => '15',
            'tag_id' => '22',
        ]);
        Product_Tag::create([
            'product_id' => '15',
            'tag_id' => '17',
        ]);
        Product_Tag::create([
            'product_id' => '15',
            'tag_id' => '18',
        ]);
        
    }
}
