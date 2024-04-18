<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWalletTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'wallet_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'amount_available' => [
                'type' => 'DOUBLE',
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'on update' => 'CURRENT_TIMESTAMP',
            ],
            'is_deleted' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'null' => false,
            ],
        ]);
        $this->forge->addKey('wallet_id', true);
        $this->forge->addForeignKey('customer_id', 'tbl_users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_wallet');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_wallet');
    }
}
