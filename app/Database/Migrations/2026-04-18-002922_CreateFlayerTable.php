<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFlayerTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'flayer_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'gambar_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'label' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Aktif', 'Tidak Aktif'],
                'default'    => 'Aktif',
            ],
            'urutan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('flayer_id', true);
        $this->forge->createTable('flayer');
    }

    public function down()
    {
        $this->forge->dropTable('flayer');
    }
}
