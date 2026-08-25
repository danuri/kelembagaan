<?php

namespace App\Controllers\Supervisor\Usulan;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsulanModel;
use App\Models\FaiModel;
use App\Models\CrudModel;
use App\Models\LogModel;
class Pembentukanfai extends BaseController
{
    public function index()
    {
        //
    }

    function detail($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new FaiModel();
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

            return view('supervisor/usulan/pembentukanfai/detail', $data);
        }else{
            $model = new LogModel;
            $data['logs'] = $model->where('id_usul',$id)->findAll();

            $users = auth()->getProvider();
            $data['verifikator'] = $data['usulan']->verifikator ? ($users->findById($data['usulan']->verifikator) ?? (object)['full_name' => '-']) : (object)['full_name' => '-'];
            return view('supervisor/usulan/pembentukanfai/detail_view', $data);
        }
    }

    function disposisi($id) {
        $id = decrypt($id);
        $model = new UsulanModel();

        $model->update($id, ['status' => 2,'verifikator'=>$this->request->getPost('verifikator'),'catatan'=>$this->request->getPost('catatan')]);

        $logm = new LogModel();
        $logm->insert(['id_usul' => $id, 'status_usulan' => 2, 'keterangan' => 'Usulan didisposisi ke verifikator.','disposisi'=>'sss', 'created_by' => user_id()]);
        return redirect()->back()->with('success', 'Usulan telah didisposisi.');
    }

    function verifikasi($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new FaiModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        $users = auth()->getProvider();
        $data['verifikator'] = $data['usulan']->verifikator ? ($users->findById($data['usulan']->verifikator) ?? (object)['full_name' => '-']) : (object)['full_name' => '-'];

        return view('supervisor/usulan/pembentukanfai/detail_dokumen', $data);
    }

    public function recheck($id)
    {
      $model = new UsulanModel;
      
      $id = decrypt($id);
      $keterangan = $this->request->getVar('keterangan');
      $model->update($id,['status'=>31,'keterangan_supervisor'=>$keterangan]);

      $logm = new LogModel();
      $logm->insert(['id_usul'=>$id,'status_usulan'=>31,'keterangan'=>'Verifikasi Ulang. '.$keterangan,'created_by'=>user_id()]);

      session()->setFlashdata('success', 'Usulan dikembalikan ke Verifikator.');
      return $this->response->setJSON(['status'=>'success']);
    }

    function done($id) {
      $model = new UsulanModel;
      
      $id = decrypt($id);
      $keterangan = $this->request->getVar('keterangan');
      $model->update($id,['status'=>20,'keterangan_supervisor'=>$keterangan]);

      $logm = new LogModel();
      $logm->insert(['id_usul'=>$id,'status_usulan'=>20,'keterangan'=>'Usulan Selesai','created_by'=>user_id()]);
      return redirect()->back()->with('success', 'Usulan telah ditandai selesai.');
    }
}
