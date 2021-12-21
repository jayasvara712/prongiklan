<?php

namespace App\Controllers;

use App\Models\GambarModel;
use App\Models\IklanModel;
use App\Models\KategoriModel;
use App\Models\SubkategoriModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class Halaman extends ResourceController
{
    function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->subkategoriModel = new SubkategoriModel();
        $this->iklanModel = new IklanModel();
        $this->gambarModel = new GambarModel();
        $this->userModel = new UserModel();
        // $this->SubkategoriModel = new SubkategoriModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['list_iklan'] = $this->iklanModel->getAll();
        echo view('home/beranda/index', $data);
    }

    public function tampil_iklan($slug = null)
    {
        $data['iklan'] = $this->iklanModel->getbySlug($slug);
        echo view('home/iklan/iklan_detail', $data);
    }
    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return view('home/iklan-detail/index');
    }


    public function iklandetail()
    {
        return view('home/iklan-detail/index');
    }

    public function iklan()
    {
        return view('home/beranda/index');
    }

    public function tampilKategori()
    {
        $data['subkategori'] = $this->subkategoriModel->getAll();
        $data['kategori'] = $this->kategoriModel->findAll();
        // $data->where("id_kategori", $id);
        // dd($data);
        return view("home/kategori/kategori", $data);
    }

    public function searchresult()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['list_iklan'] = $this->iklanModel->getAll();

        $keyword = $this->request->getVar("keyword");
        if ($keyword) {
            $iklan = $this->iklanModel->search($keyword);
        } else {
            $iklan = $this->iklanModel->getAll();
        }
        $data['iklan'] = $iklan;
        // dd($this->iklanModel->getAll());
        $data['keyword'] = $keyword;
        echo view('home/pencarian/search', $data);
    }

    public function buatiklan()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['subkategori'] = $this->subkategoriModel->getAll();
        return view('home/buat-iklan/index', $data);
    }

    public function formbuatiklan()
    {
        $validation = \Config\Services::validation();
        $data = [
            'kategori' => $this->request->getPost('kategori'),
            'id_subkategori' => $this->request->getPost('id'),
            'subkategori' => $this->request->getPost('subkategori'),
            'validation' => $validation
        ];
        $data_old = [
            'kategori' => old('kategori'),
            'id_subkategori' => old('id_subkategori'),
            'subkategori' => old('subkategori'),
            'validation' => $validation
        ];


        if ($this->request->getPost() && !old('kategori')) {
            return view('home/buat-iklan/formiklan', $data);
        } elseif (old('kategori')) {
            return view('home/buat-iklan/formiklan', $data);
        } else {
            return redirect()->to(site_url('halaman/buatiklan'));
        }
    }

    public function create()
    {
        $validation = $this->validate([
            'judul' => [
                'required',
                'errors' => [
                    'required' => '*Nama Iklan Tidak Boleh Kosong'
                ]
            ],
            'harga' => [
                'required',
                'errors' => [
                    'required' => '*Harga Tidak Boleh Kosong'
                ]
            ],
            'deskripsi' => [
                'required',
                'errors' => [
                    'required' => '*Deskripsi Tidak Boleh Kosong'
                ]
            ],
            'gambar' => [
                'uploaded[gambar]',
                'mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '*Masukan 3 Gambar!',
                    'mime_in' => '*Extension tidak sesuai,Masukan PNG,JPG,JPEG!'
                ]
            ],
        ]);
        // $data = [
        //     'kategori' => $this->request->getPost('kategori'),
        //     'subkategori' => $this->request->getPost('subkategori')
        // ];

        if (!$validation) {


            return redirect()->to(site_url('/halaman/formbuatiklan'))->withInput()->with('error', $this->validator->getErrors());
        } else {
            //insert iklan
            $data = [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'slug' => $this->request->getPost('slug'),
                'harga' => $this->request->getPost('harga'),
                'id_subkategori' => $this->request->getPost('id_subkategori')
            ];
            // dd($data);
            $this->iklanModel->insert($data);
            //insert gambar
            $file = $this->request->getFiles('gambar');
            $img = array();
            $default_image = "no-image.png";
            foreach ($this->request->getFileMultiple('gambar') as $files) {
                if ($files->isValid()) {
                    $new_name =  $files->getRandomName();
                    array_push(
                        $img,
                        $new_name
                    );
                    $files->move('uploads/iklan/', $new_name);
                } else {
                    array_push(
                        $img,
                        $default_image
                    );
                }
            }

            //ambil id_iklan
            $slug = $this->request->getPost('slug');
            $iklan = $this->iklanModel->where('slug', $slug)->first();

            $img = implode(',', $img);
            $data_img = [
                'nama' =>  $img,
                'id_iklan' => $iklan->id_iklan
            ];
            // dd($data_img);
            $this->gambarModel->insert($data_img);
            return redirect()->to(site_url('/'))->with('success', 'Iklan Berhasil Ditambahkan');
        }
    }

    public function profile()
    {
        return view('home/profile-user/profile');
    }
}
