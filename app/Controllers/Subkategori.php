<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\SubkategoriModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Subkategori extends ResourcePresenter
{
    // protected $Helper = ['custom'];
    function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->subkategoriModel = new SubkategoriModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {

        $data['subkategori'] = $this->subkategoriModel->getAll();

        echo view('dashboard/subkategori', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {

        $data['kategori'] = $this->kategoriModel->findAll();
        $data['validation'] = \Config\Services::validation();

        echo view('dashboard/subkategori/add', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $validation = $this->validate([
            'gambar' => [
                'mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => 'Extension tidak sesuai!'
                ]
            ],
            'judul' => [
                'required',
                'is_unique[subkategori.judul]',
                'errors' => [
                    'required' => 'Masukan Judul Kategori!',
                    'is_unique' => 'Judul Kategori Sudah Ada!'
                ]
            ],


        ]);
        if (!$validation) {
            return redirect()->to(site_url('/subkategori/new'))->withInput()->with('error', $this->validator->getErrors());
        } else {
            $imageFile = $this->request->getFile('gambar');

            if ($imageFile->isValid()) {
                //upload  ke public folder
                $imageFile->move('uploads/subkategori');
                $nameFile = $imageFile->getName();
            } else {
                $nameFile = 'no-image.png';
            }
            $data = [
                'judul' => $this->request->getPost('judul'),
                'gambar' =>  $nameFile,
                'slug' => $this->request->getPost('slug'),
                'id_kategori' => $this->request->getPost('id_kategori')

            ];
            $this->subkategoriModel->insert($data);
            return redirect()->to(site_url('/subkategori'))->with('success', 'Kategori Berhasil Ditambahkan');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($slug = null)
    {
        session();
        $subkategori = $this->subkategoriModel->getbySlug($slug);
        $kategori = $this->kategoriModel->findAll();
        // dd($subkategori);
        if (is_object($subkategori)) {
            $data['subkategori'] = $subkategori;
            $data['kategori'] = $kategori;
            $data['validation'] = \Config\Services::validation();
            echo view('dashboard/subkategori/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $validation = $this->validate([
            'judul' => [
                'required',
                "is_unique[subkategori.judul,id_subkategori,{$id}]",
                'errors' => [
                    'required' => 'Masukan Nama Subkategori!',
                    'is_unique' => 'Nama Subkategori Sudah Ada!'
                ]
            ],
            'gambar' => [
                'mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => 'Extension tidak sesuai!'
                ]
            ],
        ]);
        if (!$validation) {
            return redirect()->to(previous_url())->withInput()->with('error', $this->validator->getErrors());
        }
        $imageFile = $this->request->getFile('gambar');
        if ($imageFile->getError() == 4) {
            $nameFile = $this->request->getPost('gambar_lama');
        } else {
            $nameFile = $imageFile->getName();
            $imageFile->move('uploads/subkategori', $nameFile);
            //jika gambar default
            if ($this->request->getPost('gambar_lama') != 'no-image.png') {
                unlink('uploads/subkategori/' . $this->request->getPost('gambar_lama'));
            }
        }
        $data = [
            'judul' => $this->request->getPost('judul'),
            'gambar' =>  $nameFile,
            'slug' => $this->request->getPost('slug'),
            'id_kategori' => $this->request->getPost('id_kategori')
        ];

        $this->subkategoriModel->update($id, $data);
        return redirect()->to(site_url('subkategori'))->with('success', 'Kategori Berhasil Dirubah');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if ($this->request->getPost('gambar') != "no-image.png") {
            unlink('uploads/subkategori/' . $this->request->getPost('gambar'));
        }
        $this->subkategoriModel->where('id_subkategori', $id)->delete();
        return redirect()->to(site_url('subkategori'))->with('success', 'Subkategori Berhasil Dihapus');
    }
}
