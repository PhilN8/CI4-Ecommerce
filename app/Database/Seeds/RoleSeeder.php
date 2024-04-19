<?php

namespace App\Database\Seeds;

use App\Enums\Role;
use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $rolesCount = model(\App\Models\Role::class)->countAllResults();

        if ($rolesCount == 0) {
            foreach (Role::cases() as $role) {
                $data = ['role_name' => $role->value];
                $this->db->table('tbl_roles')->insert($data);
            }
        }
    }
}
