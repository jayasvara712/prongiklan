<?php

namespace App\Models;

use CodeIgniter\Model;

class SubkategoriModel extends Model



{

    // protected $DBGroup              = 'default';
    protected $table                = 'subkategori';
    protected $primaryKey           = 'id_subkategori';
    protected $useAutoIncrement     = true;
    // protected $insertID             = 0;
    protected $returnType           = 'object';
    // protected $useSoftDeletes       = false;
    // protected $protectFields        = true;
    protected $allowedFields        = ['judul', 'gambar', 'slug', 'id_kategori'];

    function getAll()
    {

        //latian
        // $builder = $this->db->table("kategori as tb_kategori");
        // $builder->select('tb_kategori.*,

        // tb_kategori.judul as judul_kategori, 
        // tb_kategori.gambar as gambar_kategori, 
        // tb_kategori.slug as slug_kategori');
        // $builder->join('subkategori as tb_subkategori', 'tb_subkategori.id_kategori=tb_kategori.id_kategori', 'left');
        // $data = $builder->get()->getResult();
        // dd($data);
        //bener
        $builder = $this->db->table('kategori');
        $builder->select('*,kategori.judul as judul_kategori, ',);
        $builder->join('subkategori', 'subkategori.id_kategori = kategori.id_kategori', 'right');
        // dd($builder->get()->getResult());
        return $builder->get()->getResult();
    }
    function getbySlug($slug)
    {
        $builder = $this->db->table('subkategori');

        $builder->join('kategori', 'kategori.id = subkategori.id_kategori', 'left');
        $builder->where('slug', $slug);

        return $builder->get()->getResult();
    }
}
