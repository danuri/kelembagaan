<?php

namespace App\Controllers\Verifikator\Usulan;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\LayananModel;
use App\Models\UsulanModel;
use App\Models\AlihbentukptkisModel;
use App\Models\UsulDokumenModel;
use App\Models\CrudModel;
use App\Models\LogModel;

class Alihbentukptkis extends BaseController
{
    public function index()
    {
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->findAll();

        return view('verifikator/usulan/alihbentukptkis/index', $data);
    }

    function detail($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new AlihbentukptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        if ($data['usulan']->status == 3 || $data['usulan']->status == 31) {
            return view('verifikator/usulan/alihbentukptkis/detail', $data);
        }else{
            return view('verifikator/usulan/alihbentukptkis/detail_view', $data);
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

    function updatecatatan($id) {
        $id = decrypt($id);
        $model = new AlihbentukptkisModel();

        $catatan = $this->request->getPost('catatan');

        $model->where('usulan_id', $id)->set([
            'magister' => $this->request->getPost('magister'),
            'doktor' => $this->request->getPost('doktor'),
            'asisten_ahli' => $this->request->getPost('asisten_ahli'),
            'lektor' => $this->request->getPost('lektor'),
            'lektor_kepala' => $this->request->getPost('lektor_kepala'),
            'guru_besar' => $this->request->getPost('guru_besar'),
            'akreditasi_no' => $this->request->getPost('akreditasi_no'),
            'akreditasi_unggul' => $this->request->getPost('akreditasi_unggul'),
            'akreditasi_baiksekali' => $this->request->getPost('akreditasi_baiksekali'),
            'akreditasi_baik' => $this->request->getPost('akreditasi_baik'),
            'mahasiswa' => $this->request->getPost('mahasiswa'),
            'rasio_dm' => $this->request->getPost('rasio_dm'),
            'fakultas' => $this->request->getPost('fakultas'),
            'prodi' => $this->request->getPost('prodi'),
            'pelaporan' => $this->request->getPost('pelaporan'),
            'tanah' => $this->request->getPost('tanah'),
            'kepemilikan_tanah' => $this->request->getPost('kepemilikan_tanah'),
            'catatan' => $catatan
          ])->update();

        return redirect()->back()->with('message', 'Catatan verifikator telah diperbarui.');
    }

    function upnilai($id) {
        $id = decrypt($id);
        $validation = \Config\Services::validation();
        $validation->setRules([
            'skor' => 'required',
            'lampiran' => 'uploaded[lampiran]|max_size[lampiran,2048]|ext_in[lampiran,pdf,xls,xlsx]'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }
        // handle file upload
        $file = $this->request->getFile('lampiran');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/nilai', $newName);
        } else {
            return redirect()->back()->withInput()->with('error', 'File upload failed');
        }

        $model = new AlihbentukptkisModel;
        $update = $model->update($id,['nilai'=>$newName]);
        return redirect()->back()->withInput()->with('message', 'Nilai telah diupdate');
    }
}
