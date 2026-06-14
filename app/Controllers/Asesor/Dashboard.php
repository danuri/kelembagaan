<?php

namespace App\Controllers\Asesor;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CrudModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $crud = new CrudModel;
        $data['jumlahUsul'] = $crud->jumlahUsulAsesor(user_id());
        $data['jumlahBelumDinilai'] = $crud->jumlahUsulBelumDinilaiAsesor(user_id());
        $data['jumlahSudahDinilai'] = $crud->jumlahUsulSudahDinilaiAsesor(user_id());
        return view('asesor/dashboard', $data);
    }
}
