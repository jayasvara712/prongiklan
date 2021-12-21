<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'admin',
            'username' => 'admin',
            'password' => password_hash('Admin123', PASSWORD_BCRYPT),
            'hp' => '11111111111',
            'email' => 'admin@projasa.co.id',
            'alamat' => 'bali',
            'hash' => password_hash('projasa-cita', PASSWORD_BCRYPT),
            'status' => '1',
            'role' => 'admin',
        ];
        $this->db->table('user')->insert($data);
    }
}
