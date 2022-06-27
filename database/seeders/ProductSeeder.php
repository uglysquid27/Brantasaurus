<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Product::create([
            'category_id' => '1',
            'product_name' => 'The War',
            'slug' => 'the-war',
            'quantity' => '50',
            'price' => '285000',
            'sell_price' => '270000',
            'description' => 'The War is the fourth studio album by South Korean–Chinese boy band Exo. It was released digitally on July 18, 2017 and physically on July 19, 2017 by SM Entertainment under Genie Musics distribution. The album includes a total of nine tracks including the lead single "Ko Ko Bop"',
            'small_description' => 'The War is the fourth studio album by South Korean–Chinese boy band Exo.',
            'image' => '1.jpg',
        ]);

        //2
        Product::create([
            'category_id' => '1',
            'product_name' => 'Mr.Mr.',
            'slug' => 'mr-mr',
            'quantity' => '28',
            'price' => '275000',
            'sell_price' => '250000',
            'description' => 'Mr.Mr. is the fourth extended play (EP) by South Korean girl group Girls Generation. The EP consists of six tracks and it incorporates electropop and R&B-pop music genres. It was released for digital download by SM Entertainment and KT Music on February 24, 2014. ',
            'small_description' => 'Mr.Mr. is the fourth extended play (EP) by South Korean girl group Girls Generation.',
            'image' => '2.jpg',
        ]);

        //3
        Product::create([
            'category_id' => '1',
            'product_name' => 'Wings',
            'slug' => 'wings',
            'quantity' => '30',
            'price' => '230000',
            'sell_price' => '215000',
            'description' => 'Wings is the second Korean studio album by South Korean boy band BTS. The album was released on October 10, 2016, by Big Hit Entertainment. It is available in four versions and contains fifteen tracks, with "Blood Sweat & Tears" serving as its lead single. ',
            'small_description' => 'Wings is the second Korean studio album by South Korean boy band BTS. The album was released on October 10, 2016, by Big Hit Entertainment.',
            'image' => '3.jpg',
        ]);

        //4
        Product::create([
            'category_id' => '1',
            'product_name' => 'Eyes Wide Open',
            'slug' => 'eyes-wide-open',
            'quantity' => '150',
            'price' => '300000',
            'sell_price' => '275000',
            'description' => 'Eyes Wide Open is the second Korean studio album by South Korean girl group Twice. It was released on October 26, 2020, by JYP Entertainment and Republic Records. It is the groups first Korean full-length album in nearly three years, following Twicetagram (2017). ',
            'small_description' => 'Eyes Wide Open is the second Korean studio album by South Korean girl group Twice. It was released on October 26, 2020, by JYP Entertainment and Republic Records.',
            'image' => '4.jpg',
        ]);

        //5
        Product::create([
            'category_id' => '1',
            'product_name' => 'The Album',
            'slug' => 'the-album',
            'quantity' => '250',
            'price' => '345000',
            'sell_price' => '325000',
            'description' => 'The Album is the first Korean studio album and second overall album by the South Korean girl group Blackpink. It was released on October 2, 2020, by YG Entertainment and Interscope Records. It is the groups first full-length work since their debut in 2016.',
            'small_description' => 'The Album is the first Korean studio album and second overall album by the South Korean girl group Blackpink.',
            'image' => '5.jpg',
        ]);

        //6
        Product::create([
            'category_id' => '2',
            'product_name' => 'Mark Lee Resonance Yearbook Card',
            'slug' => 'mark-lee-resonance-yearbook-card',
            'quantity' => '5',
            'price' => '350000',
            'sell_price' => '335000',
            'description' => 'Official photocard from album NCT 2020 Resonance Pt.1',
            'small_description' => 'Official photocard from album NCT 2020 Resonance Pt.1',
            'image' => '6.jpg',
        ]);

        //7
        Product::create([
            'category_id' => '2',
            'product_name' => 'Haruto The First Step: Chapter Two',
            'slug' => 'haruto-the-first-step-chapter-two',
            'quantity' => '8',
            'price' => '175000',
            'sell_price' => '150000',
            'description' => 'Official photocard from album The First Step: Chapter Two',
            'small_description' => 'Official photocard from album The First Step: Chapter Two',
            'image' => '7.jpg',
        ]);

        //8
        Product::create([
            'category_id' => '2',
            'product_name' => 'Haewon and Sullyoon Ad Mare',
            'slug' => 'haewon-and-sullyoon-ad-mare',
            'quantity' => '3',
            'price' => '230000',
            'sell_price' => '220000',
            'description' => 'Official double photocard from album Ad Mare',
            'small_description' => 'Official double photocard from album Ad Mare',
            'image' => '8.jpg',
        ]);


        //9
        Product::create([
            'category_id' => '3',
            'product_name' => 'Lighstick IU Official',
            'slug' => 'lighstick-iu-official',
            'quantity' => '65',
            'price' => '2500000',
            'sell_price' => '2490000',
            'description' => 'Official IU Lightstick',
            'small_description' => 'Official IU Lightstick',
            'image' => '9.jpg',
        ]);

        //10
        Product::create([
            'category_id' => '3',
            'product_name' => 'Lighstick EXO Ver.3',
            'slug' => 'lightstick-exo-ver-3',
            'quantity' => '35',
            'price' => '700000',
            'sell_price' => '675000',
            'description' => 'Official EXO Lightstick Ver.3',
            'small_description' => 'Official EXO Lightstick Ver.3',
            'image' => '10.jpg',
        ]);

        //11
        Product::create([
            'category_id' => '3',
            'product_name' => 'Itzy Official Light Ring',
            'slug' => 'itzy-official-light-ring',
            'quantity' => '21',
            'price' => '680000',
            'sell_price' => '650000',
            'description' => 'ITZY - Official Lightstick',
            'small_description' => 'ITZY - Official Lightstick',
            'image' => '11.jpg',
        ]);

        //12
        Product::create([
            'category_id' => '4',
            'product_name' => 'BTS Drawstring Backpack',
            'slug' => 'bts-drawstring-backpack',
            'quantity' => '80',
            'price' => '200000',
            'sell_price' => '195000',
            'description' => 'Official BT21 BTS Drawstring Backpack',
            'small_description' => '',
            'image' => '12.jpg',
        ]);

        //13
        Product::create([
            'category_id' => '4',
            'product_name' => 'NCT DREAM Glitch Mode Pop Up Postcard Group',
            'slug' => 'nct-dream-glitch-mode-pop-up-postcard-group',
            'quantity' => '150',
            'price' => '185000',
            'sell_price' => '181000',
            'description' => 'Official Merchandise NCT DREAM Glitch Mode Pop Up Group',
            'small_description' => 'Official Merchandise NCT DREAM Glitch Mode Pop Up Group',
            'image' => '13.jpg',
        ]);

        //14
        Product::create([
            'category_id' => '4',
            'product_name' => 'Red Velvet "Queendom" Cardigan',
            'slug' => 'red-velvet-queendom-cardigan',
            'quantity' => '10',
            'price' => '1180000',
            'sell_price' => '1172000',
            'description' => 'Official Merchandise from Album Queendom',
            'small_description' => 'Official Merchandise from Album Queendom',
            'image' => '14.jpg',
        ]);

        //15
        Product::create([
            'category_id' => '1',
            'product_name' => 'Nevertheless - OST Album',
            'slug' => 'nevertheless-ost-album',
            'quantity' => '50',
            'price' => '150000',
            'sell_price' => '120000',
            'description' => 'Official OST Album from korean drama Nevertheless',
            'small_description' => 'Official OST Album from korean drama Nevertheless',
            'image' => '15.jpg',
        ]);
    }
}
