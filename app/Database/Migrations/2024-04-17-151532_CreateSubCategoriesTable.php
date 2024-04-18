<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSubCategoriesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'subcategory_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'subcategory_name' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => false,
            ],
            'category' => [
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
        $this->forge->addKey('subcategory_id', true);
        $this->forge->addForeignKey('category', 'tbl_categories', 'category_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_subcategories');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_subcategories');
    }
}
