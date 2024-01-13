<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = [
            [
                'categoryId'        => 1,
                'name'              => 'Pure Pisang Kurma',
                'image'             => 'vUkikMXO15p6IrkqNc4Bhnrgjh6Gi8CkamT3K1ON.jpg',
                'description'       => 'Pure pisang kurma merupakan makanan pendamping asi yang terbuat dari campuran buah pisang dan juga kurma. pembuatan makanan ini terbilang cukup mudah, namun gizi yang terkandung didalamnya sangatlah melimpah',
                'ingredients'       => '<ul>
                                            <li>1 buah pisang cavendish</li>
                                            <li>4 buah kurma</li>
                                            <li>50 milliliter (ml) air matang</li>
                                        </ul>',
                'instructions'      => '<ol>
                                            <li>Masukkan semua bahan ke blender, lalu haluskan</li>
                                            <li>Tuang ke piring, saji</li>
                                        </ol>',
                'nutritions'         => '<ul>
                                            <li>Energi: 147,8 kilokalori (kkal)</li>
                                            <li>Protein: 1,6 gram (gr)</li>
                                            <li>Lemak 0,6 gr</li>
                                            <li>Karbohidrat 38,1 gr</li>
                                        </ul>',
            ],
        ];

        foreach ($recipes as $key => $values) {
            Recipe::create($values);
        }
    }
}
