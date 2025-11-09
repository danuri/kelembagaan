<?php

namespace App\Controllers\Verifikator\Usulan;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\LayananModel;
use App\Models\UsulanModel;
use App\Models\PendirianptkisModel;
use App\Models\UsulDokumenModel;
use App\Models\ProdiModel;
use App\Models\CrudModel;
use App\Models\LogModel;

class Pendirianptkis extends BaseController
{
    public function index()
    {
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->findAll();

        return view('verifikator/usulan/pendirianptkis/index', $data);
    }

    function detail($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        $pmodel = new ProdiModel;
        $data['prodi'] = $pmodel->where(['usul_id'=>$id])->findAll();

        if ($data['usulan']->status == 3 || $data['usulan']->status == 31) {
            return view('verifikator/usulan/pendirianptkis/detail', $data);
        }else{
            return view('verifikator/usulan/pendirianptkis/detail_view', $data);
        }
    }

    public function validasidokumen($id,$status,$keterangan=false)
    {
      $model = new UsulDokumenModel();
    
      if($status == 0){
        $update = $model->update($id,['dok_status'=>$status,'keterangan'=>$keterangan]);
      }else{
        $update = $model->update($id,['dok_status'=>$status,'keterangan'=>null]);
      }

      echo 'ok';
    }

    public function decline($id)
    {
      $model = new UsulanModel;
      
      $id = decrypt($id);
      $keterangan = $this->request->getVar('keterangan');
      $model->update($id,['status'=>21,'keterangan'=>$keterangan]);

      $logm = new LogModel();
      $logm->insert(['id_usul'=>$id,'status_usulan'=>21,'keterangan'=>'Dikembalikan Ke Pengusul. '.$keterangan,'created_by'=>user_id()]);

      session()->setFlashdata('message', 'Usulan telah ditolak.');
      return $this->response->setJSON(['status'=>'success']);
    }

    function accept($id) {
        $model = new UsulanModel();

        $id = decrypt($id);
        $model->update($id, ['status' => 4,'verifikator'=>user_id()]);

        $logm = new LogModel();
        $logm->insert(['id_usul' => $id, 'status_usulan' => 4, 'keterangan' => 'Dokumen Valid dan telah dikirim ke Suvervisor untuk proses selanjutnya.', 'created_by' => user_id()]);

        return redirect()->back()->with('message', 'Dokumen Valid dan telah dikirim ke Suvervisor untuk proses selanjutnya.');
    }

    function proses($id) {
        $model = new UsulanModel();

        $id = decrypt($id);
        $model->update($id, ['status' => 3,'verifikator'=>user_id()]);

        $logm = new LogModel();
        $logm->insert(['id_usul' => $id, 'status_usulan' => 3, 'keterangan' => 'Usulan sedang diverifikasi.', 'created_by' => user_id()]);

        return redirect()->back()->with('message', 'Usulan telah diproses.');
    }
}
