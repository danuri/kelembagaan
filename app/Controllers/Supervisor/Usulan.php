<?php

namespace App\Controllers\Supervisor;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\LayananModel;
use App\Models\UsulanModel;
use App\Models\PendirianptkisModel;
use App\Models\UsulDokumenModel;
use App\Models\CrudModel;
use App\Models\LogModel;
use App\Models\AsesorModel;
use App\Models\ProdiModel;

class Usulan extends BaseController
{
    public function index()
    {
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->findAll();

        return view('supervisor/usulan/index', $data);
    }

    function getdata() {
      $db = \Config\Database::connect('default', false);
      $builder = $db->table('tr_usulan')->where(['status >'=>0]);

      return DataTable::of($builder)
          ->add('action', function($row){
                // if($row->status == 11){
                //     return '<a href="'.site_url('usulan/accept/'.encrypt($row->id)).'" type="button" class="btn btn-primary btn-sm" onClick="return confirm(\'Terima usulan?\')">Cek</a>';
                // }else{
                // }
                return '<a href="'.site_url('supervisor/usulan/detail/'.encrypt($row->id)).'" target="_blank" type="button" class="btn btn-primary btn-sm">View</a> <a href="javascript:;" type="button" class="btn btn-warning btn-sm" onClick="log(\''.encrypt($row->id).'\')">Log</a>';
            })->format('status', function($value, $meta){
                return usul_status($value);
            })->filter(function ($builder, $request) {

                if ($request->layanan)
                    $builder->where('tr_usulan.layanan_id', $request->layanan);

                if ($request->status)
                    $builder->where('tr_usulan.status', $request->status);

            })
          ->toJson(true);
    }

    function detail($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        $pmodel = new ProdiModel;
        $data['prodi'] = $pmodel->where(['usul_id'=>$id])->findAll();

        if ($data['usulan']->status == 1) {

            $users = auth()->getProvider();

            $data['users'] = $users
            ->join('auth_groups_users agu', 'agu.user_id = users.id')
            ->where('agu.group','verifikator')
            ->withIdentities()
            ->findAll();

            return view('supervisor/usulan/detail', $data);
        }else{
            $model = new LogModel;
            $data['logs'] = $model->where('id_usul',$id)->findAll();

            $users = auth()->getProvider();
            $data['verifikator'] = $users->findById($data['usulan']->verifikator);
            return view('supervisor/usulan/detail_view', $data);
        }
    }

    function disposisi($id) {
        $id = decrypt($id);
        $model = new UsulanModel();

        $model->update($id, ['status' => 2,'verifikator'=>$this->request->getPost('verifikator'),'catatan'=>$this->request->getPost('catatan')]);

        $logm = new LogModel();
        $logm->insert(['id_usul' => $id, 'status_usulan' => 2, 'keterangan' => 'Usulan didisposisi ke verifikator.','disposisi'=>'sss', 'created_by' => user_id()]);
        return redirect()->back()->with('message', 'Usulan telah didisposisi.');
    }

    function verifikasi($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        $users = auth()->getProvider();
        $data['verifikator'] = $users->findById($data['usulan']->verifikator);

        return view('supervisor/usulan/detail_dokumen', $data);
    }

    function penilaian($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $users = auth()->getProvider();
        $data['verifikator'] = $users->findById($data['usulan']->verifikator);

        $data['users'] = $users
            ->join('auth_groups_users agu', 'agu.user_id = users.id')
            ->where('agu.group','verifikator')
            ->withIdentities()
            ->findAll();

        $am = new AsesorModel;
        $data['asesorkecukupan'] = $am->where(['jenis'=>1,'usul_id'=>$id])->findAll();
        $data['asesorlapangan'] = $am->where(['jenis'=>2,'usul_id'=>$id])->findAll();

        return view('supervisor/usulan/detail_penilaian', $data);
    }

    function visitasi($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        return view('supervisor/usulan/detail_penilaian', $data);
    }

    function rkma($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $users = auth()->getProvider();
        $data['verifikator'] = $users->findById($data['usulan']->verifikator);

        return view('supervisor/usulan/detail_rkma', $data);
    }

    function rkmadetail() {
        $id = $this->request->getPost('detailid');
        
        $detail = new PendirianptkisModel();
        $data = [
            'kategori' => $this->request->getPost('kategori'),
            'nama_lembaga' => $this->request->getPost('nama_lembaga'),
            'alamat' => $this->request->getPost('alamat'),
            'yayasan_nama' => $this->request->getPost('yayasan_nama'),
            'yayasan_nosk' => $this->request->getPost('yayasan_nosk'),
            'yayasan_tglsk' => $this->request->getPost('yayasan_tglsk'),
            'yayasan_notaris' => $this->request->getPost('yayasan_notaris'),
            'yayasan_kedudukan' => $this->request->getPost('yayasan_kedudukan'),
            'yayasan_kumham_nomor' => $this->request->getPost('yayasan_kumham_nomor'),
            'yayasan_kumham_tahun' => $this->request->getPost('yayasan_kumham_tahun'),
            'yayasan_kumham_tanggal' => $this->request->getPost('yayasan_kumham_tanggal'),
        ];
        $detail->update($id,$data);

        return redirect()->back()->withInput()->with('message', 'Data telah direkam');
    }

    function kma($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $users = auth()->getProvider();
        $data['verifikator'] = $users->findById($data['usulan']->verifikator);

        return view('supervisor/usulan/detail_pma', $data);
    }

    function penilaianasesor($id) {
        $model = new UsulanModel();

        $id = decrypt($id);
        $model->update($id, ['status' => 41]);

        $logm = new LogModel();
        $logm->insert(['id_usul' => $id, 'status_usulan' => 41, 'keterangan' => 'Proses penilaian oleh Asesor', 'created_by' => user_id()]);

        return redirect()->back()->with('message', 'Data sudah dikirim ke Asesor untuk dinilai.');
    }

    function addasesor() {
        $model = new AsesorModel;
        $data = [
            'usul_id' => $this->request->getPost('usul_id'),
            'user_id' => $this->request->getPost('asesor'),
            'jenis' => $this->request->getPost('jenis'),
            'mulai_tanggal' => $this->request->getPost('mulai_tanggal'),
            'sampai_tanggal' => $this->request->getPost('sampai_tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];
        $insert = $model->insert($data);

        return redirect()->back()->withInput()->with('message', 'Asesor telah direkam');
    }
    
    function penilaianreview($id) {
        $model = new AsesorModel;
        
        $id = decrypt($id);
        $update = $model->update($id,['status'=>1]);
        return redirect()->back()->withInput()->with('message', 'Penilaian telah dikembalikan');
    }
}
