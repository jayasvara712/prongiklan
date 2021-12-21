<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class UserModel extends Model
{
    protected $table                = 'user';
    protected $primaryKey           = 'id';
    protected $returnType           = 'object';
    protected $allowedFields        = ['nama', 'username', 'password', 'hp', 'email', 'alamat', 'hash', 'status', 'role'];

    function getbyId($id = null)
    {
        $builder =  $this->db->table('user');
        $builder->where('id', $id);
        return $builder->get()->getResult();
    }

    protected function beforeInsert(array $data): array
    {
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    protected function beforeUpdate(array $data): array
    {
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    private function getUpdatedDataWithHashedPassword(array $data): array
    {
        if (isset($data['data']['password'])) {
            $password = $data['data']['password'];
            $data['data']['password'] = $this->hashPassword($password);
        }
        return $data;
    }

    private function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function findUserByEmailAddress(string $email)
    {
        $user = $this
            ->asArray()
            ->where(['email' => $email])
            ->first();

        if (!$user)
            throw new Exception('User does not exist for specified email address');

        return $user;
    }
}
