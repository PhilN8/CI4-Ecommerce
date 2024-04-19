<?php

namespace App\Database\Seeds;

use App\Enums\Role;
use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        foreach (Role::cases() as $role) {
            $data = ['role_name' => $role->value];
            $this->db->table('tbl_roles')->insert($data);
        }
    }
}
