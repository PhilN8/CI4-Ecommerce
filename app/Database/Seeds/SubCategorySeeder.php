<?php

namespace App\Database\Seeds;

use App\Enums\SubCategory;
use App\Models\Category;
use CodeIgniter\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    public function run()
    {
        if (model(\App\Models\SubCategory::class)->countAllResults() == 12) {
            return;
        }

        $categories = model(Category::class)->findColumn('category_id');

        foreach ($categories as $category) {
            if ($category == 4) {
                continue;
            }

            foreach (SubCategory::cases() as $subcategory) {
                $subcategory = [
                    'subcategory_name' => $subcategory->value,
                    'category' => $category,
                ];

                $this->db->table('tbl_subcategories')->insert($subcategory);
            }
        }

        $petSubCategories = [
            ['subcategory_name' => 'Dogs', 'category' => 4],
            ['subcategory_name' => 'Cats', 'category' => 4],
            ['subcategory_name' => 'Other', 'category' => 4],
        ];

        $this->db->table('tbl_subcategories')->insertBatch($petSubCategories);
    }
}
