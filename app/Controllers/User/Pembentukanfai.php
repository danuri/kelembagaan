<?php

namespace App\Controllers\User;

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
        $model = new UsulanModel();
        $data['usulans'] = $model->where(['layanan_id'=>4,'user_id'=>user_id()])->findAll();
        return view('user/pembentukanfai/index', $data);
    }

    function detail($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new FaiModel();
        $data['usulan'] = $model->where('id', $id)->where('user_id', user_id())->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();
        if (!$data['usulan']) {
            return redirect()->to(site_url('layanan/pembentukanfai'))->with('error', 'Usulan tidak ditemukan');
        }

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        if($data['usulan']->status == 0 || $data['usulan']->status == 21){
            return view('user/pembentukanfai/detail', $data);
        }else{
            return view('user/pembentukanfai/detail_view', $data);
        }
    }

    function create() {
        // validation input
        $validation = \Config\Services::validation();
        $validation->setRule('nama_lembaga', 'Nama Lembaga', 'required');
        $validation->setRule('alamat_lembaga', 'Alamat Lembaga', 'required');

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }
        // handle file upload
        
        // save to database
        $usulanModel = new UsulanModel();
        $usulanModel->save([
            'layanan_id' => 4,
            'kode' => generate_uuid(),
            'layanan_nama' => 'Pembentukan FAI',
            'nama_lembaga' => $this->request->getPost('nama_lembaga'),
            'user_id' => user_id(),
            'status' => 0
        ]);
        $ptkisModel = new FaiModel();
        $ptkisModel->save([
            'usulan_id' => $usulanModel->getInsertID(),
            'nama_lembaga' => $this->request->getPost('nama_lembaga'),
            'alamat_lembaga' => $this->request->getPost('alamat_lembaga'),
            'kategori' => $this->request->getPost('kategori')
        ]);

        $logm = new LogModel();
        $logm->insert(['id_usul'=>$usulanModel->getInsertID(),'status_usulan'=>0,'keterangan'=>'Membuat Draft Usulan','created_by'=>session('nip'),'created_by_name'=>session('nama')]);
        
        return redirect()->to(site_url('layanan/pembentukanfai'))->with('message', 'Draft Usulan berhasil dibuat');
    }

    function updateform1() {
        // update usulan
        $json_data = file_get_contents('php://input');
        $request_data = json_decode($json_data, true);
        $usulanModel = new UsulanModel();
        $usulanModel->update($request_data['usul_id'],[
            'nomor_surat' => $request_data['nomor_surat'],
            'perihal' => $request_data['perihal'],
            'nama_lembaga' => $request_data['nama_lembaga'],
        ]);

        $detailModel = new FaiModel();
        $detailModel
        ->where('usulan_id',$request_data['usul_id'])
        ->set([
            'nama_lembaga' => $request_data['nama_lembaga'],
            'alamat_lembaga' => $request_data['alamat_lembaga'],
            'kategori' => $request_data['kategori']
        ])->update();
        return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil disimpan']);
    }

    function submitusul() {
        $json_data = file_get_contents('php://input');
        $request_data = json_decode($json_data, true);
        $usulanModel = new UsulanModel();
        $usulanModel->update($request_data['usul_id'], ['status' => 1,'submit_at'=>date('Y-m-d H:i:s')]);

        $logm = new LogModel();
        $logm->insert(['id_usul'=>$request_data['usul_id'],'status_usulan'=>1,'keterangan'=>'Submit Usulan','created_by'=>session('nip'),'created_by_name'=>session('nama')]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil disimpan']);
    }
}
