<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CrudModel;
use App\Models\LogModel;
use App\Models\UsulanModel;
use App\Models\NsptiModel;

class Ajax extends BaseController
{
    public function index()
    {
        //
    }

    function getLog($usulid) {
    $usulid = decrypt($usulid);
    $model = new LogModel;
    $logs = $model->where('id_usul',$usulid)->findAll();

    $usulm = new UsulanModel;
    $usulan = $usulm->find($usulid);
    echo '<i class="icon-base ti tabler-progress icon-md text-primary"></i> <span class="fw-bold">'.$usulan->layanan_nama.': '.$usulan->nama_lembaga.'</span><hr>';
    echo '<div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">';

    foreach($logs as $row){
      echo '<div class="vertical-timeline-item vertical-timeline-element">
            <div>
              <span class="vertical-timeline-element-icon bounce-in">
                <input class="form-check-input" type="radio" name="formradiocolor3" id="formradioRight7" checked="" disabled>
              </span>
              <div class="vertical-timeline-element-content bounce-in">
                <h4 class="timeline-title text-success">'.$row->keterangan.'</h4>
                <span class="vertical-timeline-element-date">'.$row->created_at.'</span>
              </div>
            </div>
          </div>';
    }
    echo '</div>';
  }

    function getKab($provid)
    {
        $crudModel = new CrudModel();
        $kabupaten = $crudModel->getArray('reg_regencies', ['province_id' => $provid]);
        return $this->response->setJSON($kabupaten);   
    }

    function getKec($kabid)
    {
        $crudModel = new CrudModel();
        $kecamatan = $crudModel->getArray('reg_districts', ['regency_id' => $kabid]);
        return $this->response->setJSON($kecamatan);
    }

    function getKel($kecid)
    {
        $crudModel = new CrudModel();
        $kelurahan = $crudModel->getArray('reg_villages', ['district_id' => $kecid]);
        return $this->response->setJSON($kelurahan);
    }

    function getlembaga() {
      // get nsm from post json
      $nsm = $this->request->getPost('nsm');
      if(!$nsm) {
        return $this->response->setJSON(['status' => 'error', 'message' => 'NSM tidak boleh kosong']);
      }
      $kelembagaanModel = new NsptiModel();
      $lembaga = $kelembagaanModel->getRow('lembaga',['nss_baru' => $nsm]);
      if($lembaga) {
        return $this->response->setJSON(['status' => 'success', 'data' => $lembaga]);
      }else{
        return $this->response->setJSON(['status' => 'error', 'message' => 'Data tidak ditemukan']);
      }
    }
}
