<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsulanModel;
use App\Models\AlihbentukptkisModel;
use App\Models\CrudModel;
use App\Models\LogModel;
use App\Models\LayananModel;

class Alihbentukptkis extends BaseController
{
    public function index()
    {
        $model = new UsulanModel();
        $data['usulans'] = $model->where(['layanan_id'=>2,'user_id'=>user_id()])->findAll();
        
        $layanan = new LayananModel;
        $data['layanan'] = $layanan->find(2);

        return view('user/alihbentukptkis/index', $data);
    }

    function detail($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new AlihbentukptkisModel();
        $data['usulan'] = $model->where('id', $id)->where('user_id', user_id())->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();
        if (!$data['usulan']) {
            return redirect()->to(site_url('layanan/alihbentukptkis'))->with('error', 'Usulan tidak ditemukan');
        }

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        if($data['usulan']->status == 0 || $data['usulan']->status == 21){
            return view('user/alihbentukptkis/detail', $data);
        }else{
            return view('user/alihbentukptkis/detail_view', $data);
        }
    }

    function create() {
        // validation input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nspt' => 'required',
            'nama_lembaga' => 'required',
            'alamat_lembaga' => 'required',
            'nama_lembaga_baru' => 'required',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }
        // handle file upload
        
        // save to database
        $usulanModel = new UsulanModel();
        $usulanModel->save([
            'layanan_id' => 2,
            'kode' => generate_uuid(),
            'layanan_nama' => 'Alih Bentuk PTKIS',
            'nama_lembaga' => $this->request->getPost('nama_lembaga'),
            'user_id' => user_id(),
            'status' => 0
        ]);
        $ptkisModel = new AlihbentukptkisModel();
        $ptkisModel->save([
            'usulan_id' => $usulanModel->getInsertID(),
            'nspt' => $this->request->getPost('nspt'),
            'nama_lembaga' => $this->request->getPost('nama_lembaga'),
            'alamat_lembaga' => $this->request->getPost('alamat_lembaga'),
            'nama_lembaga_baru' => $this->request->getPost('nama_lembaga_baru'),
            'kategori' => $this->request->getPost('kategori')
        ]);

        $logm = new LogModel();
        $logm->insert(['id_usul'=>$usulanModel->getInsertID(),'status_usulan'=>0,'keterangan'=>'Membuat Draft Usulan','created_by'=>session('nip'),'created_by_name'=>session('nama')]);
        
        return redirect()->to(site_url('layanan/alihbentukptkis'))->with('message', 'Draft Usulan berhasil dibuat');
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

        $detailModel = new AlihbentukptkisModel();
        $detailModel
        ->where('usulan_id',$request_data['usul_id'])
        ->set([
            'nama_lembaga' => $request_data['nama_lembaga'],
            'alamat_lembaga' => $request_data['alamat_lembaga'],
            'nama_lembaga_baru' => $request_data['nama_lembaga_baru'],
            'kategori' => $request_data['kategori']
        ])->update();
        return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil disimpan']);
    }

    function updateform2() {
        // update usulan
        $json_data = file_get_contents('php://input');
        $request_data = json_decode($json_data, true);
        $usulanModel = new AlihbentukptkisModel();
        $usulanModel
        ->where('usulan_id',$request_data['usul_id'])
        ->set([
            'magister' => $request_data['magister'],
            'magister2' => $request_data['magister2'],
            'doktor' => $request_data['doktor'],
            'doktor2' => $request_data['doktor2'],
            'asisten_ahli' => $request_data['asisten_ahli'],
            'asisten_ahli2' => $request_data['asisten_ahli2'],
            'lektor' => $request_data['lektor'],
            'lektor2' => $request_data['lektor2'],
            'lektor_kepala' => $request_data['lektor_kepala'],
            'lektor_kepala2' => $request_data['lektor_kepala2'],
            'guru_besar' => $request_data['guru_besar'],
            'guru_besar2' => $request_data['guru_besar2'],
            'akreditasi_no' => $request_data['akreditasi_no'],
            'akreditasi_no2' => $request_data['akreditasi_no2'],
            'akreditasi_unggul' => $request_data['akreditasi_unggul'],
            'akreditasi_unggul2' => $request_data['akreditasi_unggul2'],
            'akreditasi_baiksekali' => $request_data['akreditasi_baiksekali'],
            'akreditasi_baiksekali2' => $request_data['akreditasi_baiksekali2'],
            'akreditasi_baik' => $request_data['akreditasi_baik'],
            'akreditasi_baik2' => $request_data['akreditasi_baik2'],
            'mahasiswa' => $request_data['mahasiswa'],
            'mahasiswa2' => $request_data['mahasiswa2'],
            'rasio_dm' => $request_data['rasio_dm'],
            'rasio_dm2' => $request_data['rasio_dm2'],
            'fakultas' => $request_data['fakultas'],
            'fakultas2' => $request_data['fakultas2'],
            'prodi' => $request_data['prodi'],
            'prodi2' => $request_data['prodi2'],
            'pelaporan' => $request_data['pelaporan'],
            'pelaporan2' => $request_data['pelaporan2'],
            'tanah' => $request_data['tanah'],
            'tanah2' => $request_data['tanah2'],
            'kepemilikan_tanah' => $request_data['kepemilikan_tanah'],
            'kepemilikan_tanah2' => $request_data['kepemilikan_tanah2'],
            'catatan' => $request_data['catatan'],
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
