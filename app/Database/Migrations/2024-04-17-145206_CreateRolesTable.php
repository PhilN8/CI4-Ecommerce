<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRolesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role_name' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
                'unique' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp',
            'is_deleted' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'null' => false,
            ],
        ]);
        $this->forge->addKey('role_id', true);
        $this->forge->createTable('tbl_roles');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_roles');
    }
}
