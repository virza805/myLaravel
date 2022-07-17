<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ["Red", "Green", "Blue", 'White', 'Black'];
        foreach($colors as $color) {
            Color::create([
                'name' => $color,
                'slug' => strtolower($color)
            ]);
        }
    }
}
