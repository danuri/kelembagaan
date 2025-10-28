<?php

namespace App\Controllers\Verifikator;

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

class Usulan extends BaseController
{
    public function index()
    {
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->findAll();

        return view('verifikator/usulan/index', $data);
    }

    function getdata() {
      $db = \Config\Database::connect('default', false);
      $builder = $db->table('tr_usulan')->where(['verifikator'=>user_id()]);

      return DataTable::of($builder)
          ->add('action', function($row){
                // if($row->status == 11){
                //     return '<a href="'.site_url('usulan/accept/'.encrypt($row->id)).'" type="button" class="btn btn-primary btn-sm" onClick="return confirm(\'Terima usulan?\')">Cek</a>';
                // }else{
                // }
                return '<a href="'.site_url('verifikator/usulan/detail/'.encrypt($row->id)).'" target="_blank" type="button" class="btn btn-primary btn-sm">View</a> <a href="javascript:;" type="button" class="btn btn-warning btn-sm" onClick="log(\''.encrypt($row->id).'\')">Log</a>';
            })->format('status', function($value, $meta){
                return usul_status($value);
            })->filter(function ($builder, $request) {

                if ($request->layanan)
                    $builder->where('tr_usulan.layanan_id', $request->layanan);

                if ($request->status)
                    $builder->where('tr_usulan.status', $request->status);

            })
          ->toJson(true);
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

        if ($data['usulan']->status == 3) {
            return view('verifikator/usulan/detail', $data);
        }else{
            return view('verifikator/usulan/detail_view', $data);
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
