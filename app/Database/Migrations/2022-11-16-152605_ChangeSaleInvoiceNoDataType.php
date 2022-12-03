<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeSaleInvoiceNoDataType extends Migration
{
    public function up()
    {
        $fields = [
            'invoice_no' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
        ];
        $this->forge->modifyColumn('sales', $fields);
    }

    public function down()
    {
        //
    }
}
