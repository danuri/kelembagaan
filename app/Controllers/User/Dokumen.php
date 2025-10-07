<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DokumenModel;
use App\Models\UsulDokumenModel;

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
}
