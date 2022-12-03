<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangePurchase extends Migration
{
    public function up()
    {
        $fields = [
            'invoice_no' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
        ];
        $this->forge->modifyColumn('purchases', $fields);
    }

    public function down()
    {
        //
    }
}
