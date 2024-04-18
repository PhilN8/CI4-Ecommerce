<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => false,
            ],
            'product_description' => [
                'type' => 'TEXT',
            ],
            'product_image' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
            ],
            'unit_price' => [
                'type' => 'DOUBLE',
            ],
            'available_quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'subcategory_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'added_by' => [
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
        $this->forge->addKey('product_id', true);
        $this->forge->addForeignKey('subcategory_id', 'tbl_subcategories', 'subcategory_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('added_by', 'tbl_users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_products');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_products');
    }
}
