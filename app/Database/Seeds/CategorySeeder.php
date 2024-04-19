<?php

namespace App\Database\Seeds;

use App\Enums\Category;
// use App\Models\Category as ModelsCategory;
use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        if (model(\App\Models\Category::class)->countAllResults() == 0) {
            $this->db
                ->table('tbl_categories')
                ->insertBatch(Category::seed());
        }
    }
}
