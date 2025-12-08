<?php

namespace App\Controllers\Supervisor\Usulan;

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

class Pendirianptkis extends BaseController
{
    public function index()
    {
        //
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

        $data['provinsi'] = $crudModel->getRow('reg_provinces',['id'=>$data['detail']->provinsi])->name;
        $data['kabupaten'] = $crudModel->getRow('reg_regencies',['id'=>$data['detail']->kab_kota])->name;
        $data['kecamatan'] = $crudModel->getRow('reg_districts',['id'=>$data['detail']->kecamatan])->name;
        $data['kelurahan'] = $crudModel->getRow('reg_villages',['id'=>$data['detail']->kelurahan])->name;

        if ($data['usulan']->status == 1 || $data['usulan']->status == 2) {

            $users = auth()->getProvider();

            $data['users'] = $users
            ->join('auth_groups_users agu', 'agu.user_id = users.id')
            ->where('agu.group','verifikator')
            ->withIdentities()
            ->findAll();
            $data['verifikator'] = $users->findById($data['usulan']->verifikator);
            return view('supervisor/usulan/pendirianptkis/detail', $data);
        }else{
            $model = new LogModel;
            $data['logs'] = $model->where('id_usul',$id)->findAll();

            $users = auth()->getProvider();
            $data['verifikator'] = $users->findById($data['usulan']->verifikator);
            return view('supervisor/usulan/pendirianptkis/detail_view', $data);
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

        return view('supervisor/usulan/pendirianptkis/detail_dokumen', $data);
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

        return view('supervisor/usulan/pendirianptkis/detail_penilaian', $data);
    }

    function visitasi($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        return view('supervisor/usulan/pendirianptkis/detail_penilaian', $data);
    }

    function rkma($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $users = auth()->getProvider();
        $data['verifikator'] = $users->findById($data['usulan']->verifikator);

        return view('supervisor/usulan/pendirianptkis/detail_rkma', $data);
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

        return view('supervisor/usulan/pendirianptkis/detail_kma', $data);
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

    public function recheck($id)
    {
      $model = new UsulanModel;
      
      $id = decrypt($id);
      $keterangan = $this->request->getVar('keterangan');
      $model->update($id,['status'=>31,'keterangan_supervisor'=>$keterangan]);

      $logm = new LogModel();
      $logm->insert(['id_usul'=>$id,'status_usulan'=>31,'keterangan'=>'Verifikasi Ulang. '.$keterangan,'created_by'=>user_id()]);

      session()->setFlashdata('message', 'Usulan dikembalikan ke Verifikator.');
      return $this->response->setJSON(['status'=>'success']);
    }

    function draftrkma($id) {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $usulan = $model->where('id', $id)->first();
        $detail = $detail->where('usulan_id', $id)->first();

        $pmodel = new ProdiModel;
        $prodi = $pmodel->where(['usul_id'=>$id])->findAll();

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template/rkma_pendirian.docx');
        $predefinedMultilevel = array('listType' => \PhpOffice\PhpWord\Style\ListItem::TYPE_BULLET_EMPTY);

        $templateProcessor->setValue('namaPtUp', strtoupper($detail->nama_lembaga));
        $templateProcessor->setValue('namaPt', $detail->nama_lembaga);
        $templateProcessor->setValue('alamatPt', $detail->alamat);

        $templateProcessor->setValue('namaYayasan', $detail->yayasan_nama);
        $templateProcessor->setValue('nomorAktaYayasan', $detail->yayasan_nosk);
        $templateProcessor->setValue('tanggalAktaYayasan', $detail->yayasan_tglsk);
        $templateProcessor->setValue('notarisAktaYayasan', $detail->yayasan_notaris);
        $templateProcessor->setValue('kedudukanAktaYaysan', $detail->yayasan_kedudukan);
        $templateProcessor->setValue('nomorAktaSah', $detail->yayasan_kumham_nomor);
        $templateProcessor->setValue('tahunAktaSah', $detail->yayasan_kumham_tahun);
        $templateProcessor->setValue('tanggalAktaSah', $detail->yayasan_kumham_tanggal);
        // Prodi
        $templateProcessor->cloneBlock('blockProdi', count($prodi), true, true);
        $i = 1;
        foreach($prodi as $pd){
            $templateProcessor->setValue('prodiList#'.$i, $pd->nama_prodi
        );
            $i++;
        }

        $templateProcessor->setValue('menteriAgama', 'Nasaruddin Umar');

        $lembaga = preg_replace('/[^A-Za-z0-9_\-]/', '_', $detail->nama_lembaga);
        $fileName = 'draftRKMA_'.$lembaga.'.docx'; // Desired filename for the download
        $templateProcessor->saveAs('draft/'.$fileName);

        return $this->response->download('draft/'.$fileName,null);
    }
}
