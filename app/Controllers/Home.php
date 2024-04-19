<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): array|object
    {
        dd(model(\App\Models\Category::class)->findColumn('category_id'));
    }
}
