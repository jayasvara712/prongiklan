<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Iklan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => '5',
                'auto_increment' => true
            ],
            'judul_iklan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskripsi_iklan' => [
                'type' => 'TEXT',
            ],
            'slug_iklan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'harga_iklan' => [
                'type' => 'INT',
                'constraint' => '15',
            ],
            'id_subkategori' => [
                'type' => 'INT',
                'constraint' => '5'
            ],
        ]);
        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('id_subkategori', 'subkategori', 'id');

        $this->forge->createTable('iklan');
    }

    public function down()
    {
        //
    }
}
