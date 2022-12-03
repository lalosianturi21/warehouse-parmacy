<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeSale extends Migration
{
    public function up()
    {
        $fields = [
            'grand_total' => [
                'type' => 'integer',
            ],
        ];
        $this->forge->modifyColumn('sales', $fields);
    }

    public function down()
    {
        //
    }
}
