<?php

namespace App\Controllers\Supervisor\Usulan;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\LayananModel;
use App\Models\UsulanModel;
use App\Models\AlihbentukptkisModel;
use App\Models\UsulDokumenModel;
use App\Models\CrudModel;
use App\Models\LogModel;
use App\Models\AsesorModel;
use App\Models\ProdiModel;

class AlihBentukPtkis extends BaseController
{
    public function index()
    {
        //
    }

    function detail($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new AlihbentukptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);


        if ($data['usulan']->status == 1) {

            $users = auth()->getProvider();

            $data['users'] = $users
            ->join('auth_groups_users agu', 'agu.user_id = users.id')
            ->where('agu.group','verifikator')
            ->withIdentities()
            ->findAll();

            return view('supervisor/usulan/alihbentukptkis/detail', $data);
        }else{
            $model = new LogModel;
            $data['logs'] = $model->where('id_usul',$id)->findAll();

            $users = auth()->getProvider();
            $data['verifikator'] = $users->findById($data['usulan']->verifikator);
            return view('supervisor/usulan/alihbentukptkis/detail_view', $data);
        }
    }

    function disposisi($id) {
        $id = decrypt($id);
        $model = new UsulanModel();

        $model->update($id, ['status' => 2,'verifikator'=>$this->request->getPost('verifikator'),'catatan'=>$this->request->getPost('catatan')]);

        $logm = new LogModel();
        $logm->insert(['id_usul' => $id, 'status_usulan' => 2, 'keterangan' => 'Usulan didisposisi ke verifikator.','disposisi'=>'sss', 'created_by' => user_id()]);
        return redirect()->back()->with('message', 'Usulan telah didisposisi.');
    }

    function verifikasi($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new AlihbentukptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        $users = auth()->getProvider();
        $data['verifikator'] = $users->findById($data['usulan']->verifikator);

        return view('supervisor/usulan/alihbentukptkis/detail_dokumen', $data);
    }

}
