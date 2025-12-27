<?php

namespace App\Controllers\Verifikator;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CrudModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $crud = new CrudModel;
        $data['jumlahUsul'] = $crud->jumlahUsulVerifikator(user_id());
        $data['jumlahUsulVerif'] = $crud->jumlahUsulVerifVerifikator(user_id());
        $data['jumlahUsulPenilaian'] = $crud->jumlahUsulPenilaianVerifikator(user_id());
        $data['jumlahUsulDikembalikan'] = $crud->jumlahUsulDikembalikanVerifikator(user_id());
        $data['jumlahUsulSelesai'] = $crud->jumlahUsulSelesaiVerifikator(user_id());
        return view('verifikator/dashboard', $data);
    }
}
