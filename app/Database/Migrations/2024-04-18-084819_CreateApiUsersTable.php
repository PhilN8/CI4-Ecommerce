<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateApiUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'apiuser_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 60,
                'null' => false,
            ],
            'key' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp',
            'added_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'is_deleted' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'null' => false,
            ],
        ]);
        $this->forge->addKey('apiuser_id', true);
        $this->forge->addForeignKey('added_by', 'tbl_users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_apiusers');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_apiusers');
    }
}
