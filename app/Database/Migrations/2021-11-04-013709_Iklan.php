<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Iklan extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_iklan' => [
                'type' => 'INT',
                'constraint' => '5',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => '15',
            ],
            'id_subkategori' => [
                'type' => 'INT',
                'constraint' => '5',
                'unsigned'   => true
            ]
        ]);

        $this->forge->addKey('id_iklan', true);
        $this->forge->addForeignKey('id_subkategori', 'subkategori', 'id_subkategori', 'CASCADE', 'CASCADE');
        $this->forge->createTable('iklan');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
    }
}
