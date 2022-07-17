<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::create(
            [
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            ],
            [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Admin'),
            ]
        );

        $this->call([
            ColorSeeder::class,
            SizeSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class
        ]);

        Product::factory(25)->create();
    }
}
