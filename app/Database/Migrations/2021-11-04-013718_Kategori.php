<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => '5',
                'auto_increment' => true
            ],
            'judul_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'gambar_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'slug_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kategori');
    }

    public function down()
    {
        //
    }
}
