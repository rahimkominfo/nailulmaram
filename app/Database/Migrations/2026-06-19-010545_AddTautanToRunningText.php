<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTautanToRunningText extends Migration
{
    public function up()
    {
        $this->forge->addColumn('running_text', [
            'tautan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'teks',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('running_text', 'tautan');
    }
}
