<?php

namespace App\Controllers;

// use App\Models\KategoriModel;
// // use App\Models\SubkategoriModel;
// use CodeIgniter\RESTful\ResourceController;
// // use CodeIgniter\RESTful\ResourcePresenter;
// use CodeIgniter\API\ResponseTrait;

class Dashboard extends BaseController
{

    public function index()
    {
        echo view('layout/dashboard');
    }
}
