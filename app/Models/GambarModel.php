<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarModel extends Model
{
    protected $table                = 'gambar';
    protected $primaryKey           = 'id_gambar';
    protected $returnType           = 'object';
    protected $allowedFields        = ['nama', 'id_iklan'];

    function getbyId($id = null)
    {
        $builder =  $this->db->table('gambar');
        $builder->where('id_iklan', $id);
        return $builder->get()->getResult();
    }
}
