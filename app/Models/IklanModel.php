<?php

namespace App\Models;

use CodeIgniter\Model;

class IklanModel extends Model
{

    protected $table                = 'iklan';
    protected $primaryKey           = 'id_iklan';
    // protected $useAutoIncrement     = true;
    protected $returnType           = 'object';
    protected $allowedFields        = ['judul', 'deskripsi', 'harga', 'slug', 'id_subkategori'];

    //join iklan kategori gambar    
    function getAll()
    {
        $builder = $this->db->table('iklan');
        $builder->select('
            iklan.id_iklan as id_iklan,
            iklan.judul as judul_iklan,
            iklan.deskripsi as deskripsi_iklan,
            iklan.slug as slug_iklan,
            iklan.harga as harga_iklan,
            gambar.nama as list_gambar,
            gambar.id_gambar as id_gambar,
            kategori.judul as judul_kategori,
            kategori.slug as slug_kategori,
            subkategori.id_subkategori as id_subkategori,
            subkategori.judul as judul_subkategori,
            subkategori.slug as slug_subkategori,
        ');

        // $builder
        $builder->join('subkategori', 'subkategori.id_subkategori = iklan.id_subkategori', 'left');
        $builder->join('kategori', 'kategori.id_kategori = subkategori.id_kategori', 'left');
        $builder->join('gambar', 'gambar.id_iklan = iklan.id_iklan', 'left');
        // dd($builder->get()->getResult());
        return $builder->get()->getResult();
    }
    function getbySlug($slug = null)
    {
        $builder = $this->db->table('iklan');
        $builder->select(
            '
            iklan.id_iklan as id_iklan,
            iklan.judul as judul_iklan,
            iklan.deskripsi as deskripsi_iklan,
            iklan.slug as slug_iklan,
            iklan.harga as harga_iklan,
            gambar.nama as list_gambar,
            gambar.id_gambar as id_gambar,
            kategori.judul as judul_kategori,
            kategori.slug as slug_kategori,
            subkategori.id_subkategori as id_subkategori,
            subkategori.judul as judul_subkategori,
            subkategori.slug as slug_subkategori,
            '
        );
        // $builder->join('kategori', 'kategori.id_k = subkategori.id_s', 'left');

        // $builder
        $builder->join('subkategori', 'subkategori.id_subkategori = iklan.id_subkategori', 'left');
        $builder->join('kategori', 'kategori.id_kategori = subkategori.id_kategori', 'left');
        $builder->join('gambar', 'gambar.id_iklan = iklan.id_iklan', 'left');
        // dd($builder->where('slug_i', $slug)->get()->getRowObject());
        return $builder->where('iklan.slug', $slug)->get()->getRowObject();
    }

    function search($keyword)
    {
        $builder = $this->table('iklan');
        $builder->like('deskripsi_i', $keyword);
        $builder->orLike('judul_s', $keyword);
        $builder->select(
            '
            iklan.id as id_iklan,
            iklan.judul as judul_iklan,
            iklan.deskripsi as deskripsi_iklan,
            iklan.slug as slug_iklan,
            iklan.harga as harga_iklan,
            gambar.nama as list_gambar,
            gambar.id_gambar as id_gambar,
            kategori.judul as judul_kategori,
            kategori.slug as slug_kategori,
            subkategori.id_subkategori as id_subkategori,
            subkategori.judul as judul_subkategori,
            subkategori.slug as slug_subkategori,
            '
        );
        // $builder->join('kategori', 'kategori.id_k = subkategori.id_s', 'left');

        // $builder
        $builder->join('subkategori', 'subkategori.id_subkategori = iklan.id_subkategori', 'left');
        $builder->join('kategori', 'kategori.id_kategori = subkategori.id_kategori', 'left');
        $builder->join('gambar', 'gambar.id_iklan = iklan.id_iklan', 'left');
        return $builder->get()->getResult();
    }
}
