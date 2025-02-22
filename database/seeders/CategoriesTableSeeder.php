<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Electronics', 'description' => 'Electronic devices and gadgets', 'status' => true, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Home Appliances', 'description' => 'Appliances for home use', 'status' => true, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Fashion', 'description' => 'Clothing and accessories', 'status' => true, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Health & Beauty', 'description' => 'Health and beauty products', 'status' => true, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Books', 'description' => 'Books and stationery', 'status' => true, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Automotive', 'description' => 'Car accessories and tools', 'status' => true, 'created_by' => 1, 'updated_by' => 1],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
