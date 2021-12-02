<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gambar extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_gambar' => [
                'type' => 'INT',
                'constraint' => '5',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_iklan' => [
                'type' => 'INT',
                'constraint' => '5',
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addKey('id_gambar', true);
        $this->forge->addForeignKey('id_iklan', 'iklan', 'id_iklan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('gambar');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
    }
}
