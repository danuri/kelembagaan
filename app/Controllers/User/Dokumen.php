<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DokumenModel;
use App\Models\UsulDokumenModel;
use App\Models\DokumenprodiModel;
use App\Models\CrudModel;

class Dokumen extends BaseController
{
    public function index()
    {
        //
    }

    function upload() {
        // validation input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'dokumen' => 'uploaded[dokumen]|max_size[dokumen,2048]|ext_in[dokumen,pdf]'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $validation->getErrors()
            ]);
        }
        // handle file upload
        $dokumenid = $this->request->getPost('iddok');
        $usulanid = $this->request->getPost('usul');

        $file = $this->request->getFile('dokumen');
        if ($file->isValid() && !$file->hasMoved()) {
            // $newName = $file->getRandomName();
            $newName = $usulanid.'_'.$dokumenid.'.pdf';
            $file->move('./uploads', $newName);
        } else {
            // return redirect()->back()->withInput()->with('error', 'File upload failed');
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'File upload failed'
            ]);
        }

        
        // save to database
        $dokumenModel = new UsulDokumenModel();
        $cek = $dokumenModel->where(['dokumen_id' => $dokumenid,'usul_id' => $usulanid])->first();

        if ($cek) {
            // update
            $dokumenModel->update($cek->id, [
                'lampiran' => $newName,
                'dok_status' => 0,
            ]);
            // return redirect()->to(site_url('layanan/pendirianptkis/detail/'.$this->request->getPost('usul')))->with('message', 'Dokumen berhasil diunggah');
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Dokumen berhasil diunggah',
                'file' => $newName
            ]);
        }else{
            // insert
            $dokumenModel->insert([
                'dokumen_id' => $dokumenid,
                'usul_id' => $usulanid,
                'lampiran' => $newName,
                'dok_status' => 0,
            ]);
            // return redirect()->to(site_url('layanan/pendirianptkis/detail/'.$this->request->getPost('usul')))->with('message', 'Dokumen berhasil diunggah');
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Dokumen berhasil diunggah',
                'file' => $newName
            ]);
        }

        // return redirect()->to(site_url('layanan/dokumen'))->with('message', 'Dokumen berhasil diunggah');
    }

    public function embed($layanan,$usulid)
    {
      $crud = new CrudModel();
      $usulid = decrypt($usulid);
      $dokumen = $crud->query_array("SELECT a.*,b.lampiran,b.keterangan,b.dok_status AS keterangan_status FROM tm_dokumen a
                                    LEFT JOIN (SELECT dokumen_id,lampiran,keterangan,dok_status FROM tr_prodi_dokumen WHERE usul_id='$usulid') b
                                    ON b.dokumen_id=a.id
                                    WHERE a.layanan_id='$layanan' ORDER BY a.id ASC");
      ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nama Dokumen</th>
            <th>Dokumen</th>
            <th>Upload</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($dokumen as $row) {
            $download = ($row->lampiran)?'<a href="'.base_url('uploads/prodi/'.$row->lampiran).'" target="_blank">Lihat</a>':'Belum Upload';
            echo '
            <tr>
            <td>'.$row->dokumen.'</td>
            <td id="output'.$row->id.'">'.$download.'</td>
            <td>
            <button type="button" class="btn btn-soft-danger waves-effect waves-light btn-sm" onclick="$(\'#file'.$row->id.'\').click()"><i class="icon-base ti tabler-upload icon-xs me-2"></i></button>
            <form method="POST" action="'.site_url('dokumen/uploadprodi').'" style="display: none;" id="form'.$row->id.'" enctype="multipart/form-data">
            <input type="hidden" name="usulid" value="'.$usulid.'">
            <input type="hidden" name="kode" value="'.$row->id.'">
            <input type="file" name="dokumen" id="file'.$row->id.'" onchange="uploadfile(\''.$row->id.'\')" accept=".pdf">
            </form>
            <span class="text-danger">'.$row->keterangan.'</span>
            </td>
            </tr>
            ';
          }
          ?>
        </tbody>
      </table>
      <?php
    }
    
    public function verifikasi($layanan,$usulid)
    {
      $crud = new CrudModel();
      $usulid = decrypt($usulid);
      $dokumen = $crud->query_array("SELECT a.*,b.lampiran,b.keterangan,b.dok_status AS keterangan_status FROM tm_dokumen a
                                    LEFT JOIN (SELECT dokumen_id,lampiran,keterangan,dok_status FROM tr_prodi_dokumen WHERE usul_id='$usulid') b
                                    ON b.dokumen_id=a.id
                                    WHERE a.layanan_id='$layanan' ORDER BY a.id ASC");
      ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nama Dokumen</th>
            <th>Dokumen</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($dokumen as $row) {
            $download = ($row->lampiran)?'<a href="'.base_url('uploads/prodi/'.$row->lampiran).'" target="_blank">Lihat</a>':'Belum Upload';
            echo '
            <tr>
            <td>'.$row->dokumen.'</td>
            <td id="output'.$row->id.'">'.$download.'</td>
            </tr>
            ';
          }
          ?>
        </tbody>
      </table>
      <?php
    }

    function uploadprodi() {
        // validation input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'dokumen' => 'uploaded[dokumen]|max_size[dokumen,2048]|ext_in[dokumen,pdf]'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $validation->getErrors()
            ]);
        }
        // handle file upload
        $usulid = $this->request->getPost('usulid');
        $kode = $this->request->getPost('kode');

        $file = $this->request->getFile('dokumen');
        if ($file->isValid() && !$file->hasMoved()) {
            // $newName = $file->getRandomName();
            $newName = $usulid.'_'.$kode.'.pdf';
            $file->move('./uploads/prodi', $newName);
        } else {
            // return redirect()->back()->withInput()->with('error', 'File upload failed');
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'File upload failed'
            ]);
        }

        
        // save to database
        $dokumenModel = new DokumenprodiModel();
        $cek = $dokumenModel->where(['dokumen_id' => $kode,'usul_id' => $usulid])->first();

        if ($cek) {
            // update
            $dokumenModel->update($cek->id, [
                'lampiran' => $newName,
                'dok_status' => 0,
            ]);
            // return redirect()->to(site_url('layanan/pendirianptkis/detail/'.$this->request->getPost('usul')))->with('message', 'Dokumen berhasil diunggah');
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Dokumen berhasil diunggah',
                'file' => $newName
            ]);
        }else{
            // insert
            $dokumenModel->insert([
                'dokumen_id' => $kode,
                'usul_id' => $usulid,
                'lampiran' => $newName,
                'dok_status' => 0,
            ]);
            // return redirect()->to(site_url('layanan/pendirianptkis/detail/'.$this->request->getPost('usul')))->with('message', 'Dokumen berhasil diunggah');
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Dokumen berhasil diunggah',
                'file' => $newName
            ]);
        }

        // return redirect()->to(site_url('layanan/dokumen'))->with('message', 'Dokumen berhasil diunggah');
    }
}
