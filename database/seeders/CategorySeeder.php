<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => '6-8 Bulan',
                'image' => 'tv0FnJyJvPFho3c3Z1ZkshEU9pkKTq9Gq7QhScHV.png',
                'slug' => '6-8-bulan'
            ],
            [
                'name' => '9-11 Bulan',
                'image' => 'l8ggVJmRWxXCg3pEJ3jFOYKjBFrOFLGk0RReuxkB.png',
                'slug' => '9-11-bulan'
            ],
            [
                'name' => '>12 Bulan',
                'image' => 'lfUtF4QaIwvp2pIfDaBjjcGabDepQ5ti4Kamps2Y.png',
                'slug' => '12-bulan'
            ]
        ];

        foreach($categories as $key => $value) {
            Categories::create($value);
        }
    }
}
