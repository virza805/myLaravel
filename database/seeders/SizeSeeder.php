<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ["XXL", "XL", "S", 'L', 'M'];
        foreach($sizes as $size) {
            Size::create([
                'name' => $size,
                'slug' => strtolower($size)
            ]);
        }
    }
}
