<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
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
            'order_amount' => [
                'type' => 'DOUBLE',
                'default' => 0,
            ],
            'order_status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'pending payment', 'paid'],
            ],
            'payment_type' => [
                'type' => 'INT',
                'constraint' => 11,
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
        $this->forge->addKey('order_id', true);
        $this->forge->addForeignKey('customer_id', 'tbl_users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('payment_type', 'tbl_paymenttypes', 'paymenttype_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_orders');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_orders');
    }
}
