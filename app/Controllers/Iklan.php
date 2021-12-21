<?php

namespace App\Controllers;

use App\Models\GambarModel;
use App\Models\IklanModel;
use App\Models\SubkategoriModel;
use CodeIgniter\RESTful\ResourceController;

use function PHPSTORM_META\type;

class Iklan extends ResourceController
{

    private $menu = "<script language=\"javascript\">menu('m-iklan');</script>";
    function __construct()
    {
        $this->iklanModel = new IklanModel();
        $this->subkategoriModel = new SubkategoriModel();
        $this->gambarModel = new GambarModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $keyword = $this->request->getVar("keyword");
        if ($keyword) {
            $iklan = $this->iklanModel->search($keyword);
        } else {
            $iklan = $this->iklanModel->getAll();
        }
        $data['iklan'] = $iklan;

        $data['keyword'] = $keyword;
        echo view('dashboard/iklan', $data) . $this->menu;
    }
    public function search()
    {
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
        $data['subkategori'] = $this->subkategoriModel->findAll();
        $data['validation'] = \Config\Services::validation();
        echo view('dashboard/iklan/add', $data) . $this->menu;
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
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
                    'uploaded' => '*Masukan 4 Gambar!',
                    'mime_in' => '*Extension tidak sesuai,Masukan PNG,JPG,JPEG!'
                ]
            ],
        ]);

        if (!$validation) {
            return redirect()->to(site_url('/iklan/new'))->withInput()->with('error', $this->validator->getErrors());
        } else {
            //insert iklan
            $data = [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'slug' => $this->request->getPost('slug'),
                'harga' => $this->request->getPost('harga'),
                'id_subkategori' => $this->request->getPost('id_subkategori')
            ];
            $this->iklanModel->insert($data);
            //insert gambar
            // $file = $this->request->getFiles('gambar');
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
            return redirect()->to(site_url('/iklan'))->with('success', 'Iklan Berhasil Ditambahkan');
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
        $iklan = $this->iklanModel->getbySlug($slug);
        $subkategori = $this->subkategoriModel->findAll();
        if (is_object($iklan)) {
            $data['subkategori'] = $subkategori;
            $data['iklan'] = $iklan;
            $data['validation'] = \Config\Services::validation();
            echo view('dashboard/iklan/edit', $data) . $this->menu;
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
                'mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => '*Extension tidak sesuai,Masukan PNG,JPG,JPEG!'
                ]
            ],

        ]);

        if (!$validation) {
            return redirect()->to(previous_url())->withInput()->with('error', $this->validator->getErrors());;
        }
        //gambar lama sebelum edit
        $gambar_lama = array();
        foreach ($this->request->getPost('gambar_lama') as $oldImage) {
            array_push(
                $gambar_lama,
                $oldImage
            );
        }
        //gambar
        $tmp_images = array();
        foreach ($this->request->getPost('temp_gambar') as $tmp_image) {
            array_push(
                $tmp_images,
                $tmp_image
            );
        }

        $file = $this->request->getFiles('gambar');
        $img_baru = array();
        for ($i = 0; $i < count($file['gambar']); $i++) {
            $gambar = $file['gambar'][$i];
            if ($gambar->isValid() && !$gambar->hasMoved()) {
                $new_name =  $gambar->getRandomName();
                array_push(
                    $img_baru,
                    $new_name
                );
                unlink('uploads/iklan/' . $tmp_images[$i]);
                $gambar->move('uploads/iklan/', $new_name);
            } else if ($gambar_lama[$i] == "no-image.png") {
                return redirect()->to(previous_url())->with('error-image', '*Gambar Minimal 4');
            } else {
                array_push(
                    $img_baru,
                    $gambar_lama[$i]
                );
            }
        }

        $img =  implode(',', $img_baru);
        $data_img = [
            'nama' =>  $img,
            'id_iklan' => $id
        ];
        $id_gambar = $this->request->getPost('id_gambar');
        $this->gambarModel->update($id_gambar, $data_img);

        $data = [
            'judul_i' => $this->request->getPost('judul'),
            'deskripsi_i' =>  $this->request->getPost('deskripsi'),
            'slug_i' => $this->request->getPost('slug'),
            'harga_i' => $this->request->getPost('harga'),
            'id_subkategori' => $this->request->getPost('id_subkategori')
        ];

        $this->iklanModel->update($id, $data);
        return redirect()->to(site_url('iklan'))->with('success', 'Iklan Berhasil Dirubah');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $gambars = $this->gambarModel->where('id_iklan', $id)->first();
        if ($gambars) {
            $gambar_array = explode(",", $gambars->nama);
            foreach ($gambar_array as  $gambar) {
                unlink('uploads/iklan/' . $gambar);
            }
        }
        // dd($gambar_array);

        $this->iklanModel->where('id_iklan', $id)->delete();

        return redirect()->to(site_url('iklan'))->with('success', 'Iklan Berhasil Dihapus');
    }
}
