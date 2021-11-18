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
        $this->kategori = new KategoriModel();
        $this->subkategori = new SubkategoriModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {

        $data['subkategori'] = $this->subkategori->getAll();
        // $data['subkategori'] = $this->subkategori->findAll();

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
        $data['kategori'] = $this->kategori->findAll();
        $data['validation'] = \Config\Services::validation();
        echo view('dashboard/v_add', $data);
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
                // 'uploaded[gambar]',
                'errors' => [
                    // 'uploaded' => 'Masukan Gambar!'
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
                $nameFile = 'default.png';
            }
            $data = [
                'judul' => $this->request->getPost('judul'),
                'gambar' =>  $nameFile,
                'slug' => $this->request->getPost('slug'),
                'id_kategori' => $this->request->getPost('id_kategori')

            ];
            $this->subkategori->insert($data);
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
        $subkategori = $this->subkategori->where('slug', $slug)->first();
        $kategori = $this->kategori->findAll();
        if (is_object($subkategori)) {
            $data['subkategori'] = $subkategori;
            $data['kategori'] = $kategori;
            $data['validation'] = \Config\Services::validation();
            echo view('dashboard/v_edit', $data);
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
                'is_unique[kategori.judul,id_kategori,{id}]',
                'errors' => [
                    'required' => 'Masukan Judul Kategori!',
                    'is_unique' => 'Judul Kategori Sudah Ada!'
                ]
            ],
            'gambar' => [
                // 'uploaded[gambar]',
                // 'mime_in[file,image/png,image/jpg,image/jpeg]',
                // 'max_size[file,4096]',
                'errors' => [
                    // 'uploaded' => 'Masukan Gambar!'
                    // 'mime_in' => 'Extension tidak sesuai!'
                ]
            ],
        ]);
        if (!$validation) {
            return redirect()->to('kategori/edit/' . $this->request->getPost('slug'))->withInput()->with('error', $this->validator->getErrors());;
        }
        $imageFile = $this->request->getFile('gambar');
        if ($imageFile->getError() == 4) {
            $nameFile = $this->request->getPost('gambar_lama');
        } else {
            $nameFile = $imageFile->getName();
            $imageFile->move('uploads/subkategori', $nameFile);
            //jika gambar default
            if ($this->request->getPost('gambar_lama') != 'default.png') {
                unlink('uploads/subkategori/' . $this->request->getPost('gambar_lama'));
            }
        }
        $data = [
            'judul' => $this->request->getPost('judul'),
            'gambar' =>  $nameFile,
            'slug' => $this->request->getPost('slug'),
            'id_kategori' => $this->request->getPost('id_kategori')
        ];
        // $validation =  \Config\Services::validation();
        $this->subkategori->update($id, $data);
        return redirect()->to(site_url('subkategori'))->with('success', 'Kategori Berhasil Dirubah');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->subkategori->where('id_subkategori', $id)->delete();
        return redirect()->to(site_url('subkategori'))->with('success', 'Subkategori Berhasil Dihapus');
    }
}
