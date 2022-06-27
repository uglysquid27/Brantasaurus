<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Tag::create([
            'name' => 'SM',
            'slug' => 'sm',
        ]);

        // 2
        Tag::create([
            'name' => 'YG',
            'slug' => 'yg',
        ]);

        // 3
        Tag::create([
            'name' => 'JYP',
            'slug' => 'jyp',
        ]);

        // 4
        Tag::create([
            'name' => 'Hybe',
            'slug' => 'hybe',
        ]);

        // 5
        Tag::create([
            'name' => 'Boy Group',
            'slug' => 'boy-group',
        ]);

        // 6
        Tag::create([
            'name' => 'Girl Group',
            'slug' => 'girl-group',
        ]);

        // 7
        Tag::create([
            'name' => 'EXO',
            'slug' => 'exo',
        ]);

        // 8
        Tag::create([
            'name' => 'Aespa',
            'slug' => 'aespa',
        ]);

        // 9
        Tag::create([
            'name' => 'NCT Dream',
            'slug' => 'nct-dream',
        ]);

        // 10
        Tag::create([
            'name' => 'Blackpink',
            'slug' => 'blackpink',
        ]);

        // 11
        Tag::create([
            'name' => 'Treasure',
            'slug' => 'treasure',
        ]);

        // 12
        Tag::create([
            'name' => 'Twice',
            'slug' => 'twice',
        ]);

        // 13
        Tag::create([
            'name' => 'NMIXX',
            'slug' => 'nmixx',
        ]);

        // 14
        Tag::create([
            'name' => 'ITZY',
            'slug' => 'itzy',
        ]);

        // 15
        Tag::create([
            'name' => 'BTS',
            'slug' => 'bts',
        ]);

        // 16
        Tag::create([
            'name' => 'IU',
            'slug' => 'iu',
        ]);

        //17
        Tag::create([
            'name' => 'Actor',
            'slug' => 'actor',
        ]);

        //18
        Tag::create([
            'name' => 'Actrees',
            'slug' => 'actress',
        ]);

        //19
        Tag::create([
            'name' => 'Red Velvet',
            'slug' => 'red-velvet',
        ]);

        //20
        Tag::create([
            'name' => 'Girls Generation',
            'slug' => 'girls-generation',
        ]);

        //21
        Tag::create([
            'name' => 'Solo',
            'slug' => 'solo',
        ]);

        //22
        Tag::create([
            'name' => 'OST K-Drama',
            'slug' => 'ost-k-drama',
        ]);
    }
}
