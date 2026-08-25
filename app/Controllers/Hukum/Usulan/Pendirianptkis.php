<?php

namespace App\Controllers\Hukum\Usulan;

use App\Controllers\BaseController;
use App\Models\UsulanModel;
use App\Models\PendirianptkisModel;
use App\Models\CrudModel;
use App\Models\LogModel;
use App\Models\AsesorModel;
use App\Models\ProdiModel;
use App\Models\SiproLogModel;

class Pendirianptkis extends BaseController
{
    public function detail($id)
    {
        $encryptedId = $id;
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();

        if (!$data['usulan']) {
            return redirect()->to(site_url('hukum/usulan'))->with('error', 'Usulan tidak ditemukan.');
        }

        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        $pmodel = new ProdiModel();
        $data['prodi'] = $pmodel->where(['usul_id' => $id])->findAll();

        $siproLogModel = new SiproLogModel();
        $data['sippro_logs'] = $siproLogModel->where('usul_id', $id)->findAll();

        $provRow = $crudModel->getRow('reg_provinces', ['id' => $data['detail']->provinsi]);
        $data['provinsi'] = $provRow ? $provRow->name : '-';

        $kabRow = $crudModel->getRow('reg_regencies', ['id' => $data['detail']->kab_kota]);
        $data['kabupaten'] = $kabRow ? $kabRow->name : '-';

        $kecRow = $crudModel->getRow('reg_districts', ['id' => $data['detail']->kecamatan]);
        $data['kecamatan'] = $kecRow ? $kecRow->name : '-';

        $kelRow = $crudModel->getRow('reg_villages', ['id' => $data['detail']->kelurahan]);
        $data['kelurahan'] = $kelRow ? $kelRow->name : '-';

        $logModel = new LogModel();
        $data['logs'] = $logModel->where('id_usul', $id)->findAll();

        $users = auth()->getProvider();
        $data['verifikator'] = $data['usulan']->verifikator ? ($users->findById($data['usulan']->verifikator) ?? (object)['full_name' => '-']) : (object)['full_name' => '-'];
        $data['encrypted_id'] = $encryptedId;

        return view('hukum/usulan/pendirianptkis/detail_view', $data);
    }

    public function verifikasi($id)
    {
        $encryptedId = $id;
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();

        if (!$data['usulan']) {
            return redirect()->to(site_url('hukum/usulan'))->with('error', 'Usulan tidak ditemukan.');
        }

        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        $users = auth()->getProvider();
        $data['verifikator'] = $data['usulan']->verifikator ? ($users->findById($data['usulan']->verifikator) ?? (object)['full_name' => '-']) : (object)['full_name' => '-'];
        $data['encrypted_id'] = $encryptedId;

        return view('hukum/usulan/pendirianptkis/detail_dokumen', $data);
    }

    public function penilaian($id)
    {
        $encryptedId = $id;
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();

        if (!$data['usulan']) {
            return redirect()->to(site_url('hukum/usulan'))->with('error', 'Usulan tidak ditemukan.');
        }

        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $users = auth()->getProvider();
        $data['verifikator'] = $data['usulan']->verifikator ? ($users->findById($data['usulan']->verifikator) ?? (object)['full_name' => '-']) : (object)['full_name' => '-'];

        $am = new AsesorModel();
        $data['asesorkecukupan'] = $am->select('tr_asesor.*,users.full_name')
            ->join('users', 'users.id = tr_asesor.user_id')
            ->where(['jenis' => 1, 'usul_id' => $id])
            ->findAll();

        $data['asesorlapangan'] = $am->select('tr_asesor.*,users.full_name')
            ->join('users', 'users.id = tr_asesor.user_id')
            ->where(['jenis' => 2, 'usul_id' => $id])
            ->findAll();

        $data['encrypted_id'] = $encryptedId;

        return view('hukum/usulan/pendirianptkis/detail_penilaian', $data);
    }

    public function rkma($id)
    {
        $encryptedId = $id;
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();

        if (!$data['usulan']) {
            return redirect()->to(site_url('hukum/usulan'))->with('error', 'Usulan tidak ditemukan.');
        }

        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $users = auth()->getProvider();
        $data['verifikator'] = $data['usulan']->verifikator ? ($users->findById($data['usulan']->verifikator) ?? (object)['full_name' => '-']) : (object)['full_name' => '-'];
        $data['encrypted_id'] = $encryptedId;

        return view('hukum/usulan/pendirianptkis/detail_rkma', $data);
    }

    public function kma($id)
    {
        $encryptedId = $id;
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();

        if (!$data['usulan']) {
            return redirect()->to(site_url('hukum/usulan'))->with('error', 'Usulan tidak ditemukan.');
        }

        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $users = auth()->getProvider();
        $data['verifikator'] = $data['usulan']->verifikator ? ($users->findById($data['usulan']->verifikator) ?? (object)['full_name' => '-']) : (object)['full_name' => '-'];
        $data['encrypted_id'] = $encryptedId;

        return view('hukum/usulan/pendirianptkis/detail_kma', $data);
    }
}
