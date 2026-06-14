<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CrudModel;
use App\Models\LogModel;
use App\Models\UsulanModel;
use App\Models\NsptiModel;
use CodeIgniter\Shield\Models\UserModel;

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
      $nspt = $this->request->getPost('nspt');
      if(!$nspt) {
        return $this->response->setJSON(['status' => 'error', 'message' => 'NSPT tidak boleh kosong']);
      }

      $nsptService = new \App\Libraries\NsptService();
      $result = $nsptService->getLembagaDetail($nspt);

      if($result->success && $result->data) {
        return $this->response->setJSON(['status' => 'success', 'data' => $result->data]);
      } else {
        return $this->response->setJSON(['status' => 'error', 'message' => $result->message ?? 'Data tidak ditemukan']);
      }
    }

    /**
     * Cek ketersediaan username (public, dipakai di form register)
     */
    public function checkUsername()
    {
        $username = trim($this->request->getPost('username'));

        if (empty($username)) {
            return $this->response->setJSON(['available' => false, 'message' => 'Username tidak boleh kosong.']);
        }

        if (!preg_match('/^[a-zA-Z0-9\.]+$/', $username)) {
            return $this->response->setJSON(['available' => false, 'message' => 'Username hanya boleh huruf, angka, dan titik.']);
        }

        $userModel = new UserModel();
        $exists = $userModel->where('username', $username)->first();

        if ($exists) {
            return $this->response->setJSON(['available' => false, 'message' => 'Username sudah digunakan.']);
        }

        return $this->response->setJSON(['available' => true, 'message' => 'Username tersedia.']);
    }

    /**
     * Cek ketersediaan email (public, dipakai di form register)
     */
    public function checkEmail()
    {
        $email = trim($this->request->getPost('email'));

        if (empty($email)) {
            return $this->response->setJSON(['available' => false, 'message' => 'Email tidak boleh kosong.']);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->response->setJSON(['available' => false, 'message' => 'Format email tidak valid.']);
        }

        $db = \Config\Database::connect();
        $exists = $db->table('auth_identities')
            ->where('type', 'email_password')
            ->where('secret', $email)
            ->get()->getRow();

        if ($exists) {
            return $this->response->setJSON(['available' => false, 'message' => 'Email sudah terdaftar.']);
        }

        return $this->response->setJSON(['available' => true, 'message' => 'Email tersedia.']);
    }
}
