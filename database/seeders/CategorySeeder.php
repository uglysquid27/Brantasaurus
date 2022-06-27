<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Album',
            'slug' => 'album',
            'desc' => 'A collection of albums from all your favorite idol groups, solo singers and Korean dramas',
            'image' => '1.jpg'
        ]);

        Category::create([
            'name' => 'Photocard',
            'slug' => 'photocard',
            'desc' => 'Official photocard of all of your favorite idols, singers, actors and actresses',
            'image' => '2.jpg'
        ]);

        Category::create([
            'name' => 'Lightstick',
            'slug' => 'lightstick',
            'desc' => 'The latest version of your official idol group lightstick collection',
            'image' => '3.jpg'
        ]);

        Category::create([
            'name' => 'Merchandise',
            'slug' => 'merchandise',
            'desc' => 'Various aesthetic merchandise for idols, singers, actors and actresses for collection',
            'image' => '4.jpg'
        ]);
    }
}
