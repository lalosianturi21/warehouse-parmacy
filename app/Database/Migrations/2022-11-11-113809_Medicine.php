<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Medicine extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'code' => [
                'type' => 'int',
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'description' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'min-stock' => [
                'type' => 'int'
            ],
            'max-stock' => [
                'type' => 'int',
                'constraint'=> 255
            ],
            'current_stock' => [
                'type' => 'int'
            ],
            'price' => [
                'type' => 'decimal'
            ],
            'status_id' => [
                'type' => 'int',
                'constraint' => 255
            ],
            'item_unit_id' => [
                'type' => 'int'
            ]
        ]);
        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('medicine', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('medicine');
    }

}