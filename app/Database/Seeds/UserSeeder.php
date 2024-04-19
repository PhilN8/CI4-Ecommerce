<?php

namespace App\Database\Seeds;

use App\Enums\Role;
use App\Models\User;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin User
        $isAdminSet = model(User::class)->where('email', 'phil@example.com')->first();

        if (! $isAdminSet) {
            $admin = [
                'first_name' => 'Phil',
                'last_name' => 'Nyaga',
                'email' => 'phil@example.com',
                'password' => password_hash('hello123', PASSWORD_BCRYPT),
                'gender' => 'male',
                'role' => Role::seedForUsers(Role::ADMIN),
            ];

            $this->db->table('tbl_users')->insert($admin);
        }

        // Create 10 users
        // $users = (new Fabricator(User::class))->make(10);

        // $this->db
        //     ->table('tbl_users')
        //     ->insertBatch($users);
    }
}
