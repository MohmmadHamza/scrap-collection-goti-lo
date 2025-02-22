<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubcategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $subcategories = [
            ['name' => 'Mobile Phones', 'description' => 'Smartphones and feature phones', 'status' => true, 'category_id' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Laptops', 'description' => 'Laptops and notebooks', 'status' => true, 'category_id' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Tablets', 'description' => 'Tablets and e-readers', 'status' => true, 'category_id' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Cameras', 'description' => 'Digital and DSLR cameras', 'status' => true, 'category_id' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Televisions', 'description' => 'LED, LCD, and smart TVs', 'status' => true, 'category_id' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Wearable Devices', 'description' => 'Smartwatches and fitness trackers', 'status' => true, 'category_id' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Headphones', 'description' => 'Headphones and earphones', 'status' => true, 'category_id' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Home Audio', 'description' => 'Speakers and sound systems', 'status' => true, 'category_id' => 1, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Refrigerators', 'description' => 'Fridges and freezers', 'status' => true, 'category_id' => 2, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Microwaves', 'description' => 'Microwave ovens', 'status' => true, 'category_id' => 2, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Washing Machines', 'description' => 'Washing machines and dryers', 'status' => true, 'category_id' => 2, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Air Conditioners', 'description' => 'AC units and coolers', 'status' => true, 'category_id' => 2, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Men’s Clothing', 'description' => 'Shirts, pants, and suits', 'status' => true, 'category_id' => 3, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Women’s Clothing', 'description' => 'Dresses, tops, and skirts', 'status' => true, 'category_id' => 3, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Shoes', 'description' => 'Men’s and women’s shoes', 'status' => true, 'category_id' => 3, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Skin Care', 'description' => 'Skin care products', 'status' => true, 'category_id' => 4, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Hair Care', 'description' => 'Hair care products', 'status' => true, 'category_id' => 4, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Makeup', 'description' => 'Makeup and cosmetics', 'status' => true, 'category_id' => 4, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Fiction Books', 'description' => 'Fiction and novels', 'status' => true, 'category_id' => 5, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Non-Fiction Books', 'description' => 'Biographies and self-help books', 'status' => true, 'category_id' => 5, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Car Accessories', 'description' => 'Accessories for cars', 'status' => true, 'category_id' => 6, 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Tools & Equipment', 'description' => 'Tools for vehicle maintenance', 'status' => true, 'category_id' => 6, 'created_by' => 1, 'updated_by' => 1],
        ];

        foreach ($subcategories as $subcategory) {
            SubCategory::create($subcategory);
        }
    }
}
