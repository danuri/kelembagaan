<?php

namespace App\Controllers\Supervisor;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LembagaModel;

class Lembaga extends BaseController
{
    public function index()
    {
        //view lembaga
        $lembagaModel = new LembagaModel();
        $data['lembaga'] = $lembagaModel->findAll();
        return view('supervisor/lembaga/index', $data);
    }
}
