<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\Test\Fabricator;

class Home extends BaseController
{
    public function index(): array|object
    {
        dd((new Fabricator(User::class))->make(10));
    }
}
