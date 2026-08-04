<?php

namespace App\Controllers\Asesor;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\LayananModel;
use App\Models\UsulanModel;
use App\Models\LogModel;
use App\Models\AsesorModel;
use App\Models\PendirianptkisModel;
use App\Models\CrudModel;

class Penilaian extends BaseController
{
    public function index()
    {
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->findAll();

        return view('asesor/penilaian/index', $data);
    }

    function getdata()
    {
        $db = \Config\Database::connect('default', false);
        $builder = $db->table('tr_usulan a')->select('a.id,a.nama_lembaga,a.nama_lembaga,a.status,b.id as ases_id, b.jenis,b.mulai_tanggal,b.sampai_tanggal,b.keterangan,b.file_hasil,b.skor,b.status as status_nilai')
            ->join('tr_asesor b', 'b.usul_id = a.id')
            ->where(['b.user_id' => user_id()]);


        return DataTable::of($builder)
            ->add('action', function ($row) {
                return '<a href="' . site_url('asesor/penilaian/detail/' . encrypt($row->ases_id)) . '" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Detail Lembaga"><span class="icon-base ti tabler-zoom-scan"></span></a> <a href="javascript:;" type="button" class="btn btn-warning btn-sm" onClick="log(\'' . encrypt($row->ases_id) . '\')" data-toggle="tooltip" data-placement="top" title="Logs"><span class="icon-base ti tabler-bell-search"></span></a>';
            })->format('status', function ($value, $meta) {
                return usul_status($value);
            })->format('jenis', function ($value, $meta) {
                return jenisasesmen($value);
            })->format('file_hasil', function ($value, $meta) {
                return ($value) ? '<a href="' . base_url('uploads/nilai/' . $value) . '" target="_blank">Lihat</a>' : 'Belum Mengunggah';
            })->filter(function ($builder, $request) {

                if ($request->layanan)
                    $builder->where('a.layanan_id', $request->layanan);

            })
            ->toJson(true);
    }

    // function accept($id) {
    //     $model = new AsesorModel();

    //     $id = decrypt($id);
    //     $model->update($id, ['status' => 5]);

    //     $logm = new LogModel();
    //     $logm->insert(['id_usul' => $id, 'status_usulan' => 5, 'keterangan' => 'Penilaian diterima Asesor.', 'created_by' => user_id()]);

    //     return redirect()->back()->with('message', 'Penilaian Usulan telah diterima.');
    // }

    function detail($id)
    {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $asesm = new AsesorModel;
        $data['asesmen'] = $asesm->find($id);
        $data['usulan'] = $model->find($data['asesmen']->usul_id);
        $data['detail'] = $detail->where('usulan_id', $data['asesmen']->usul_id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        if ($data['asesmen']->status == 2) {
            return view('asesor/penilaian/detail_view', $data);
        } else {
            return view('asesor/penilaian/detail_nilai', $data);
        }
    }

    function savenilai($id)
    {
        $id = decrypt($id);
        $validation = \Config\Services::validation();
        $validation->setRules([
            'skor' => 'required',
            'lampiran' => 'uploaded[lampiran]|max_size[lampiran,10240]|ext_in[lampiran,pdf,xls,xlsx]'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }
        $model = new AsesorModel;
        $asesor = $model->find($id);

        // handle file upload
        $file = $this->request->getFile('lampiran');
        if ($file->isValid() && !$file->hasMoved()) {
            $jenisCode = ($asesor->jenis == 1) ? 'AK' : (($asesor->jenis == 2) ? 'AL' : 'NA');
            $newName = 'penilaian_' . $jenisCode . '_' . $id . '.' . $file->getClientExtension();
            $file->move('uploads/nilai', $newName, true); // true to overwrite existing file
        } else {
            return redirect()->back()->withInput()->with('error', 'File upload failed');
        }

        $update = $model->update($id, ['skor' => $this->request->getPost(), 'file_hasil' => $newName]);
        return redirect()->back()->withInput()->with('message', 'Nilai telah diupdate');
    }

    function done($id)
    {
        $id = decrypt($id);
        $model = new AsesorModel();
        $asesor = $model->find($id);

        $model->update($id, ['status' => 2]);

        $model2 = new UsulanModel();
        $model2->update($asesor->usul_id, ['status' => 6]);

        $logm = new LogModel();
        $logm->insert(['id_usul' => $asesor->usul_id, 'status_usulan' => 6, 'keterangan' => 'Penilaian oleh Asesor ' . auth()->user()->full_name . ' telah selesai.', 'created_by' => user_id()]);

        return redirect()->back()->with('message', 'Nilai telah dikirimkan ke supervisor.');
    }
}
