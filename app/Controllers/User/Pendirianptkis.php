<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsulanModel;
use App\Models\PendirianptkisModel;
use App\Models\ProdiModel;
use App\Models\CrudModel;
use App\Models\LogModel;

class Pendirianptkis extends BaseController
{
    public function index()
    {
        $model = new UsulanModel();
        $data['usulans'] = $model->where(['layanan_id'=>1,'user_id'=>user_id()])->findAll();
        return view('user/pendirianptkis/index', $data);
    }

    function detail($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->where('user_id', user_id())->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();
        if (!$data['usulan']) {
            return redirect()->to(site_url('layanan/pendirianptkis'))->with('error', 'Usulan tidak ditemukan');
        }

        $crudModel = new CrudModel();
        $data['provinces'] = $crudModel->getArray('reg_provinces');
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        $pmodel = new ProdiModel;
        $data['prodi'] = $pmodel->where(['usul_id'=>$id])->findAll();

        if($data['usulan']->status == 0 || $data['usulan']->status == 21){
            return view('user/pendirianptkis/detail', $data);
        }else{
            return view('user/pendirianptkis/detail_view', $data);
        }
    }

    function create() {
        // validation input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nomor_surat' => 'required',
            'perihal' => 'required',
            'nama_lembaga' => 'required',
            // 'surat_pengantar' => 'uploaded[surat_pengantar]|max_size[surat_pengantar,2048]|ext_in[surat_pengantar,pdf]'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        // handle file upload
        // $file = $this->request->getFile('surat_pengantar');
        // if ($file->isValid() && !$file->hasMoved()) {
        //     $newName = $file->getRandomName();
        //     $file->move(WRITEPATH . 'uploads', $newName);
        // } else {
        //     return redirect()->back()->withInput()->with('error', 'File upload failed');
        // }
        // save to database
        $usulanModel = new UsulanModel();
        $usulanModel->save([
            'layanan_id' => 1,
            'layanan_nama' => 'Pendirian PTKIS',
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'perihal' => $this->request->getPost('perihal'),
            'nama_lembaga' => $this->request->getPost('nama_lembaga'),
            // 'surat_pengantar' => $newName,
            'user_id' => user_id(),
            'status' => 0
        ]);
        $ptkisModel = new PendirianptkisModel();
        $ptkisModel->save([
            'usulan_id' => $usulanModel->getInsertID()
        ]);

        $logm = new LogModel();
        $logm->insert(['id_usul'=>$usulanModel->getInsertID(),'status_usulan'=>0,'keterangan'=>'Membuat Draft Usulan','created_by'=>session('nip'),'created_by_name'=>session('nama')]);
        
        return redirect()->to(site_url('layanan/pendirianptkis'))->with('message', 'Usulan berhasil dibuat');
    }

    function updateform1() {
        // update usulan
        $json_data = file_get_contents('php://input');
        $request_data = json_decode($json_data, true);
        $usulanModel = new PendirianptkisModel();
        $usulanModel
        ->where('usulan_id',$request_data['usul_id'])
        ->set([
            'yayasan_nama' => $request_data['yayasan_nama'],
            'yayasan_alamat' => $request_data['yayasan_alamat'],
            'yayasan_nosk' => $request_data['yayasan_nosk'],
            'yayasan_tglsk' => $request_data['yayasan_tglsk']
        ])->update();
        return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil disimpan']);
    }

    function updateform2() {
        // update usulan
        $json_data = file_get_contents('php://input');
        $request_data = json_decode($json_data, true);
        $usulanModel = new PendirianptkisModel();
        $usulanModel
        ->where('usulan_id',$request_data['usul_id'])
        ->set([
            'nama_lembaga' => $request_data['nama_lembaga'],            
            'kategori' => $request_data['kategori'],
            'jenjang' => $request_data['jenjang'],
            'kopertais' => $request_data['kopertais'],      
            'telepon' => $request_data['telepon'],      
            'no_hp' => $request_data['no_hp'],      
            'provinsi' => $request_data['provinsi'],
            'kab_kota' => $request_data['kabupaten'],
            'kecamatan' => $request_data['kecamatan'],
            'kelurahan' => $request_data['kelurahan'],    
            'kode_pos' => $request_data['kode_pos'],    
            'alamat' => $request_data['jalan'],    
        ])->update();
        return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil disimpan']);
    }

    function prodi($id) {
        $id = decrypt($id);

        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->where('user_id', user_id())->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $pmodel = new ProdiModel;
        $data['prodi'] = $pmodel->where(['usul_id'=>$id])->findAll();
        
        return view('user/pendirianptkis/prodi', $data);
    }

    function saveprodi() {
        $pmodel = new ProdiModel();
        $usulid = $this->request->getPost('usul_id');
        $nama_prodi = $this->request->getPost('nama_prodi');
        $jenjang = $this->request->getPost('jenjang');
        $status_aktif = $this->request->getPost('status_prodi');

        $pmodel->insert([
                'usul_id' => $usulid,
                'nama_prodi' => $nama_prodi,
                'jenjang' => $jenjang
            ]);

        return redirect()->to(site_url('layanan/pendirianptkis/prodi/'.encrypt($usulid)))->with('message', 'Program Studi berhasil ditambahkan');
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
