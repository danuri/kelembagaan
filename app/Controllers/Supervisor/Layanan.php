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

      $data['dokumens'] = $dok->where('layanan_id', $id)->findAll();
      $data['layanan'] = $lm->find($id);
      $data['id'] = $id;
      return view('supervisor/master/dokumen', $data);
    }

    function adddokumen() {
      $model = new DokLayananModel;

      $layanan = $this->request->getVar('layanan');
      $dokumen = $this->request->getVar('dokumen');
      $wajib = $this->request->getVar('is_wajib');

      $data = [
        'layanan' => $layanan,
        'dokumen' => $dokumen,
        'wajib' => $wajib,
      ];

      $model->insert($data);

      return redirect()->back()->with('message', 'Dokumen telah ditambahkan.');
    }
    
    function deletedokumen($id) {
      $model = new DokLayananModel;
      
      $delete = $model->delete($id);
      return redirect()->back()->with('message', 'Dokumen telah dihapus.');
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


}
