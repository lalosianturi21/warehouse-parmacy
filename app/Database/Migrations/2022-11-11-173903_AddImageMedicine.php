<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageMedicine extends Migration
{
    public function up()
    {
        $this->forge->addColumn('medicine', [
            'image_name' => [
                'type'  => 'VARCHAR',
                'constraint'    => 255
            ]
            ]);
    }

    public function down()
    {
        $this->forgee->dropColumn('medicine', 'image_name');
    }
}
