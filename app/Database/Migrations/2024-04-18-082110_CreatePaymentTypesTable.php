<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaymentTypesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'paymenttype_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'paymenttype_name' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
            ],
            'is_deleted' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'null' => false,
            ],
        ]);
        $this->forge->addKey('paymenttype_id', true);
        $this->forge->createTable('tbl_paymenttypes');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_paymenttypes');
    }
}
