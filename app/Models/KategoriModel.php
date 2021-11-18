<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'kategori';
    protected $primaryKey           = 'id_kategori';
    // protected $useAutoIncrement     = true;
    // protected $insertID             = 0;
    protected $returnType           = 'object';
    // protected $useSoftDeletes       = false;
    // protected $protectFields        = true;
    protected $allowedFields        = [
        'judul',
        'gambar',
        'slug'
    ];
}
