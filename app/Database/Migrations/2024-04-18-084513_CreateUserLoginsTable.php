<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserLoginsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'userlogin_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'user_ip' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => false,
            ],
            'login_time' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'logout_time' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'is_deleted' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'null' => false,
            ],
        ]);
        $this->forge->addKey('userlogin_id', true);
        $this->forge->addForeignKey('user_id', 'tbl_users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_userlogins');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_userlogins');
    }
}
