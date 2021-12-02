<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => '5',
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ]
        ]);
        $this->forge->addKey('id_kategori', true);
        $this->forge->createTable('kategori');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
    }
}
