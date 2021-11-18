<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gambar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => '5',
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_iklan' => [
                'type' => 'INT',
                'constraint' => '5',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('gambar');
    }

    public function down()
    {
        //
    }
}
