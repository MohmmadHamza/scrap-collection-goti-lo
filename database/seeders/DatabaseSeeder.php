<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Run category and subcategory seeders
        $this->call([
            // CategoriesTableSeeder::class,
            // SubcategoriesTableSeeder::class,
            RolesAndPermissionsSeeder::class,
        ]);
    }
}
