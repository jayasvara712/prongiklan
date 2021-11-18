<?php

namespace App\Models;

use CodeIgniter\Model;

class IklanModel extends Model
{

    protected $table                = 'iklan';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $returnType           = 'object';
    protected $allowedFields        = ['judul', 'deskripsi', 'harga', 'slug', 'id_subkategori'];

    //join iklan kategori gambar    
    function getAll()
    {
        $builder = $this->db->table('iklan');

        $builder
            ->join('subkategori', 'subkategori.id = iklan.id_subkategori', 'right');

        dd($builder->get()->row());
        // return $builder->get()->getResult();
    }
}
