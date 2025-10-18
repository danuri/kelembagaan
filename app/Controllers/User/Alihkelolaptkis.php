<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsulanModel;
// use App\Models\AlihkelolaptkisModel;
use App\Models\CrudModel;
use App\Models\LogModel;

class Alihkelolaptkis extends BaseController
{
    public function index()
    {
        $model = new UsulanModel();
        $data['usulans'] = $model->where(['layanan_id'=>3,'user_id'=>user_id()])->findAll();
        return view('user/alihkelolaptkis/index', $data);
    }

    function detail($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        // $detail = new AlihkelolaptkisModel();
        $data['usulan'] = $model->where('id', $id)->where('user_id', user_id())->first();
        // $data['detail'] = $detail->where('usulan_id', $id)->first();
        if (!$data['usulan']) {
            return redirect()->to(site_url('layanan/alihkelolaptkis'))->with('error', 'Usulan tidak ditemukan');
        }

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        if($data['usulan']->status == 0 || $data['usulan']->status == 21){
            return view('user/alihkelolaptkis/detail', $data);
        }else{
            return view('user/alihkelolaptkis/detail_view', $data);
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
            'layanan_id' => 3,
            'nama_lembaga' => $this->request->getPost('nama_lembaga'),
            'user_id' => user_id(),
            'status' => 0
        ]);
        $ptkisModel = new AlihkeolaptkisModel();
        $ptkisModel->save([
            'usulan_id' => $usulanModel->getInsertID(),
            'nspt' => $this->request->getPost('nspt'),
            'nama_lembaga' => $this->request->getPost('nama_lembaga'),
            'alamat_lembaga' => $this->request->getPost('alamat_lembaga'),
            'nama_lembaga_baru' => $this->request->getPost('nama_lembaga_baru'),
            'kategori' => $this->request->getPost('kategori'),
            'jenjang' => $this->request->getPost('jenjang'),
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
            'kategori' => $request_data['kategori'],
            'jenjang' => $request_data['jenjang'],
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
            'doktor' => $request_data['doktor'],
            'asisten_ahli' => $request_data['asisten_ahli'],
            'lektor' => $request_data['lektor'],
            'lektor_kepala' => $request_data['lektor_kepala'],
            'guru_besar' => $request_data['guru_besar'],
            'akreditasi_no' => $request_data['akreditasi_no'],
            'akreditasi_unggul' => $request_data['akreditasi_unggul'],
            'akreditasi_baiksekali' => $request_data['akreditasi_baiksekali'],
            'akreditasi_baik' => $request_data['akreditasi_baik'],
            'mahasiswa' => $request_data['mahasiswa'],
            'rasio_dm' => $request_data['rasio_dm'],
            'fakultas' => $request_data['fakultas'],
            'prodi' => $request_data['prodi'],
            'pelaporan' => $request_data['pelaporan'],
            'tanah' => $request_data['tanah'],
            'kepemilikan_tanah' => $request_data['kepemilikan_tanah'],
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
