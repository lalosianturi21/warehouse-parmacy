<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Itemunits extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 255
            ]
        ]);
        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('itemunits', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('itemunits');
    }
}
