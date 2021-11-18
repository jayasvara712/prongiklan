<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\SubkategoriModel;
use CodeIgniter\RESTful\ResourceController;

// use CodeIgniter\RESTful\BaseController;

// // use App\Models\SubkategoriModel;
// use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\RESTful\ResourcePresenter;
// use CodeIgniter\API\ResponseTrait;

class Kategori extends ResourcePresenter
{


    function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->SubkategoriModel = new SubkategoriModel();
    }

    //cara memanggil model #2  
    // protected $modelName = 'App\Models\KategoriModel';
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        // $data['kategori'] = $this->kategoriModel->findAll();
        // return $this->respond($tes, 200);

        echo view('dashboard/kategori', $data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        // $data['']
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        echo view('dashboard/add', $data);
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */

    public function create()
    {
        $validation = $this->validate([
            'gambar' => [
                // 'uploaded[gambar]',
                // 'mime_in[file,image/png,image/jpg,image/jpeg]',
                // 'max_size[file,4096]',
                'errors' => [
                    // 'uploaded' => 'Masukan Gambar!'
                ]
            ],
            'judul' => [
                'required',
                'is_unique[kategori.judul]',
                'errors' => [
                    'required' => 'Masukan Judul Kategori!',
                    'is_unique' => 'Judul Kategori Sudah Ada!'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->to(site_url('/kategori/new'))->withInput()->with('error', $this->validator->getErrors());
        } else {

            $imageFile = $this->request->getFile('gambar');

            if ($imageFile->isValid()) {
                //upload  ke public folder
                $imageFile->move('uploads/kategori');
                $nameFile = $imageFile->getName();
            } else {
                $nameFile = 'default.png';
            }
            //upload ke writeable  folder
            // $imageFile->move(WRITEPATH . 'uploads/kategori');

            $data = [
                'judul' => $this->request->getPost('judul'),
                'gambar' =>  $nameFile,
                'slug' => $this->request->getPost('slug')

            ];
            $this->kategoriModel->insert($data);
            return redirect()->to(site_url('/kategori'))->with('success', 'Kategori Berhasil Ditambahkan');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($slug = null)
    {
        $kategori = $this->kategoriModel->where('slug', $slug)->first();
        // dd($kategori);

        session();
        $data = [
            'kategori' => $kategori,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($kategori)) {
            $data['kategori'] = $kategori;
            echo view('dashboard/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
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
            $imageFile->move('uploads/kategori', $nameFile);
            //jika gambar default
            if ($this->request->getPost('gambar_lama') != 'default.png') {
                unlink('uploads/kategori/' . $this->request->getPost('gambar_lama'));
            }
        }
        $data = [
            'judul' => $this->request->getPost('judul'),
            'gambar' =>  $nameFile,
            'slug' => $this->request->getPost('slug')
        ];
        $this->kategoriModel->update($id, $data);
        return redirect()->to(site_url('kategori'))->withInput()->with('success', 'Kategori Berhasil Dirubah');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {

        //img

        $kategori = $this->kategoriModel->find($id);
        if ($kategori->gambar != 'default.png') {
            unlink('uploads/kategori/' . $kategori->gambar);
        }


        // unlink('uploads/kategori' . $kategori->gambar);
        $this->kategoriModel->where('id_kategori', $id)->delete();
        return redirect()->to(site_url('kategori'))->with('success', 'Kategori Berhasil Dihapus');
    }
}
