<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Items extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'tanggal' => [
                'type' => 'date'
            ],
            'staff' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'harga' => [
                'type' => 'decimal'
            ],
            'stock' => [
                'type' => 'int',
                'constraint'=> 255
            ],
            'image_name' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'expired' => [
                'type' => 'varchar',
                'constraint' => 255
            ]
        ]);
        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('items', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('items');
    }
}
