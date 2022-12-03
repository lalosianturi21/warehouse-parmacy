<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sales extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'invoice_no' => [
                'type' => 'integer',
                'constraint' => 255
            ],
            'invoice_date' => [
                'type' => 'datetime'
            ],
            'supplier_id' => [
                'type' => 'integer',
                'constraint' => 255
            ],
            'grand_total' => [
                'type' => 'decimal'
            ],
            'user_id' => [
                'type' => 'integer',
                'constraint'=> 255
            ]
        ]);
        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('sales', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('sales');
    }
}
