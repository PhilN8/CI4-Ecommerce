<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductImagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'productimages_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'product_image' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
                'null' => false,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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
        $this->forge->addKey('productimages_id', true);
        $this->forge->addForeignKey('product_id', 'tbl_products', 'product_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('added_by', 'tbl_users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_productimages');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_productimages');
    }
}
