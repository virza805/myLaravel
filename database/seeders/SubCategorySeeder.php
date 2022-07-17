<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create([
            'category_id' => 1,
            'name' => 'Man Sub cat 1',
            'slug' => strtolower('Man Sub cat 1')
        ]);
        SubCategory::create([
            'category_id' => 1,
            'name' => 'Man Sub cat 2',
            'slug' => strtolower('Man Sub cat 2')
        ]);
        SubCategory::create([
            'category_id' => 1,
            'name' => 'Man Sub cat 3',
            'slug' => strtolower('Man Sub cat 3')
        ]);

        // 2
        SubCategory::create([
            'category_id' => 2,
            'name' => 'Woman Sub cat 1',
            'slug' => strtolower('Woman Sub cat 1')
        ]);
        SubCategory::create([
            'category_id' => 2,
            'name' => 'Woman Sub cat 2',
            'slug' => strtolower('Woman Sub cat 2')
        ]);
        SubCategory::create([
            'category_id' => 2,
            'name' => 'Woman Sub cat 3',
            'slug' => strtolower('Woman Sub cat 3')
        ]);

        // 3
        SubCategory::create([
            'category_id' => 3,
            'name' => 'Child Sub cat 1',
            'slug' => strtolower('Child Sub cat 1')
        ]);
        SubCategory::create([
            'category_id' => 3,
            'name' => 'Child Sub cat 2',
            'slug' => strtolower('Child Sub cat 2')
        ]);
        SubCategory::create([
            'category_id' => 3,
            'name' => 'Child Sub cat 3',
            'slug' => strtolower('Child Sub cat 3')
        ]);
    }
}
