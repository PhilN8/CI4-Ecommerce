<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'orderdetails_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'order_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'product_price' => [
                'type' => 'DOUBLE',
            ],
            'order_quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 1,
            ],
            'orderdetails_total' => [
                'type' => 'DOUBLE',
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
        $this->forge->addKey('orderdetails_id', true);
        $this->forge->addForeignKey('order_id', 'tbl_orders', 'order_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'tbl_products', 'product_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_orderdetails');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_orderdetails');
    }
}
