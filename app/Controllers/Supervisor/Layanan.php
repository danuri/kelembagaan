<?php

namespace App\Controllers\Supervisor;

use App\Controllers\BaseController;
use App\Models\DokumenModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LayananModel;
use App\Models\CrudModel;
use App\Models\DokLayananModel;

class Layanan extends BaseController
{
    public function index()
    {
        $model = new LayananModel;
        $data['layanan'] = $model->findAll();

        return view('supervisor/master/layanan', $data);
    }

    public function save($id=false)
    {
      $model = new LayananModel;
      $param = [
        'layanan' => $this->request->getVar('layanan'),
        'kode' => $this->request->getVar('kode'),
        'keterangan' => $this->request->getVar('keterangan'),
        'is_khusus' => $this->request->getVar('khusus'),
      ];

      if($id){
        $param['id'] = $id;
      }

      $save = $model->save($param);

      return redirect()->back()->with('message', 'Layanan telah ditambahkan.');
    }
    
    function delete($id) {
      $model = new LayananModel;
      
      $delete = $model->delete($id);
      return redirect()->back()->with('message', 'Layanan telah dihapus.');
    }

    function dokumen($id) {
      $lm = new LayananModel;
      $dok = new DokumenModel;

      $layanan = $lm->find($id);
      if (!$layanan) {
        return redirect()->to(site_url('supervisor/master/layanan'))->with('error', 'Layanan tidak ditemukan.');
      }

      $data['dokumens'] = $dok->where('layanan_id', $id)->findAll();
      $data['layanan'] = $layanan;
      $data['id'] = $id;
      return view('supervisor/master/dokumen', $data);
    }

    public function dokumensave() {
      $model = new DokumenModel;

      $id = $this->request->getVar('id');
      $layanan_id = $this->request->getVar('layanan_id') ?? $this->request->getVar('layanan');
      $dokumen = $this->request->getVar('dokumen');
      $keterangan = $this->request->getVar('keterangan');
      $is_wajib = $this->request->getVar('is_wajib') ?? $this->request->getVar('wajib') ?? 1;

      $data = [
        'layanan_id' => $layanan_id,
        'dokumen'    => $dokumen,
        'keterangan' => $keterangan,
        'is_wajib'   => $is_wajib,
      ];

      if (!empty($id)) {
        $data['id'] = $id;
        $model->save($data);
        return redirect()->back()->with('success', 'Dokumen berhasil diupdate.');
      }

      $model->insert($data);
      return redirect()->back()->with('success', 'Dokumen telah ditambahkan.');
    }

    public function adddokumen() {
      return $this->dokumensave();
    }
    
    public function dokumendelete($id) {
      $model = new DokumenModel;
      
      $model->delete($id);
      return redirect()->back()->with('success', 'Dokumen telah dihapus.');
    }

    public function deletedokumen($id) {
      return $this->dokumendelete($id);
    }

    function view($id) {
      $model = new LayananModel;
      $data = $model->find($id);
      
      return $this->response->setJSON($data);
      
    }

    function update() {
      $model = new LayananModel;
      $param = [
        'layanan' => $this->request->getVar('layanan'),
        'kode' => $this->request->getVar('kode'),
        'keterangan' => $this->request->getVar('keterangan'),
        'is_khusus' => $this->request->getVar('khusus'),
      ];

      $id = $this->request->getVar('id');

      $save = $model->where(['id'=>$id])->set($param)->update();

      return redirect()->back()->with('message', 'Layanan telah diupdate.');
    }

    function activate($id) {
      $model = new LayananModel;
      $model->update($id, ['is_active' => 1]);
      return redirect()->back()->with('message', 'Layanan telah diaktifkan.');
    }

    function deactivate($id) {
      $model = new LayananModel;
      $model->update($id, ['is_active' => 0]);
      return redirect()->back()->with('message', 'Layanan telah dinonaktifkan.');
    }


}
