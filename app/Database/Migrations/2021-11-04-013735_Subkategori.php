<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subkategori extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_subkategori' => [
                'type' => 'INT',
                'constraint' => '5',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => '100',
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addKey('id_subkategori', true);
        $this->forge->addForeignKey('id_kategori', 'kategori', 'id_kategori', 'CASCADE', 'CASCADE');
        $this->forge->createTable('subkategori');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
    }
}
