<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => false,
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
                'unique' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['male', 'female'],
            ],
            'role' => [
                'type' => 'INT',
                'constraint' => 11,
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
        $this->forge->addKey('user_id', true);
        $this->forge->addForeignKey('role', 'tbl_roles', 'role_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_users');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_users');
    }
}
