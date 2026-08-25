<?php

namespace App\Controllers\Hukum\Usulan;

use App\Controllers\BaseController;
use App\Models\UsulanModel;
use App\Models\AlihbentukptkisModel;
use App\Models\CrudModel;
use App\Models\LogModel;

class AlihBentukPtkis extends BaseController
{
    public function detail($id)
    {
        $encryptedId = $id;
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new AlihbentukptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();

        if (!$data['usulan']) {
            return redirect()->to(site_url('hukum/usulan'))->with('error', 'Usulan tidak ditemukan.');
        }

        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        $logModel = new LogModel();
        $data['logs'] = $logModel->where('id_usul', $id)->findAll();

        $users = auth()->getProvider();
        $data['verifikator'] = $data['usulan']->verifikator ? $users->findById($data['usulan']->verifikator) : (object)['full_name' => '-'];
        $data['encrypted_id'] = $encryptedId;

        return view('hukum/usulan/alihbentukptkis/detail_view', $data);
    }
}
