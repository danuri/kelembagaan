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
use App\Models\DokumenprodiModel;
use App\Models\SiproLogModel;
use App\Libraries\SipproService;
use App\Libraries\NsptService;

class Pendirianptkis extends BaseController
{
    public function index()
    {
        //
    }

    function detail($id)
    {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        $pmodel = new ProdiModel;
        $data['prodi'] = $pmodel->where(['usul_id' => $id])->findAll();

        $data['provinsi'] = $crudModel->getRow('reg_provinces', ['id' => $data['detail']->provinsi])->name;
        $data['kabupaten'] = $crudModel->getRow('reg_regencies', ['id' => $data['detail']->kab_kota])->name;
        $data['kecamatan'] = $crudModel->getRow('reg_districts', ['id' => $data['detail']->kecamatan])->name;
        $data['kelurahan'] = $crudModel->getRow('reg_villages', ['id' => $data['detail']->kelurahan])->name;

        if ($data['usulan']->status == 1 || $data['usulan']->status == 2) {

            $users = auth()->getProvider();

            $data['users'] = $users
                ->join('auth_groups_users agu', 'agu.user_id = users.id')
                ->where('agu.group', 'verifikator')
                ->withIdentities()
                ->findAll();

            return view('supervisor/usulan/pendirianptkis/detail', $data);
        } else {
            $model = new LogModel;
            $data['logs'] = $model->where('id_usul', $id)->findAll();

            $users = auth()->getProvider();
            $data['verifikator'] = $users->findById($data['usulan']->verifikator);
            return view('supervisor/usulan/pendirianptkis/detail_view', $data);
        }
    }

    function disposisi($id)
    {
        $id = decrypt($id);
        $model = new UsulanModel();

        $model->update($id, ['status' => 2, 'verifikator' => $this->request->getPost('verifikator'), 'catatan' => $this->request->getPost('catatan')]);

        $logm = new LogModel();
        $logm->insert(['id_usul' => $id, 'status_usulan' => 2, 'keterangan' => 'Usulan didisposisi ke verifikator.', 'disposisi' => 'sss', 'created_by' => user_id()]);
        return redirect()->back()->with('success', 'Usulan telah didisposisi.');
    }

    function verifikasi($id)
    {
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

    function penilaian($id)
    {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $users = auth()->getProvider();
        $data['verifikator'] = $users->findById($data['usulan']->verifikator);

        $data['users'] = $users
            ->join('auth_groups_users agu', 'agu.user_id = users.id')
            ->where('agu.group', 'asesor')
            ->withIdentities()
            ->findAll();

        $am = new AsesorModel;
        // join with users
        $data['asesorkecukupan'] = $am->select('tr_asesor.*,users.full_name')->join('users', 'users.id = tr_asesor.user_id')
            ->where(['jenis' => 1, 'usul_id' => $id])
            // ->withIdentities()
            ->findAll();
        $data['asesorlapangan'] = $am->select('tr_asesor.*,users.full_name')->join('users', 'users.id = tr_asesor.user_id')
            ->where(['jenis' => 2, 'usul_id' => $id])
            // ->withIdentities()
            ->findAll();

        return view('supervisor/usulan/pendirianptkis/detail_penilaian', $data);
    }

    function visitasi($id)
    {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        return view('supervisor/usulan/pendirianptkis/detail_penilaian', $data);
    }

    function rkma($id)
    {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $users = auth()->getProvider();
        $data['verifikator'] = $users->findById($data['usulan']->verifikator);

        return view('supervisor/usulan/pendirianptkis/detail_rkma', $data);
    }

    function rkmadetail()
    {
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
        $detail->update($id, $data);

        return redirect()->back()->withInput()->with('success', 'Data telah direkam');
    }

    function kma($id)
    {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $users = auth()->getProvider();
        $data['verifikator'] = $users->findById($data['usulan']->verifikator);

        return view('supervisor/usulan/pendirianptkis/detail_kma', $data);
    }

    function penilaianasesor($id)
    {
        $model = new UsulanModel();

        $id = decrypt($id);
        $model->update($id, ['status' => 5]);

        $logm = new LogModel();
        $logm->insert(['id_usul' => $id, 'status_usulan' => 5, 'keterangan' => 'Proses penilaian oleh Asesor', 'created_by' => user_id()]);

        return redirect()->back()->with('success', 'Data sudah dikirim ke Asesor untuk dinilai.');
    }

    function addasesor()
    {
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

        return redirect()->back()->withInput()->with('success', 'Asesor telah direkam');
    }

    function deleteasesor($id)
    {
        $model = new AsesorModel;
        $delete = $model->delete($id);
        return redirect()->back()->withInput()->with('success', 'Asesor telah dihapus');
    }

    function penilaianreview($id)
    {
        $model = new AsesorModel;

        $id = decrypt($id);
        $update = $model->update($id, ['status' => 1]);
        return redirect()->back()->withInput()->with('success', 'Penilaian telah dikembalikan');
    }

    public function recheck($id)
    {
        $model = new UsulanModel;

        $id = decrypt($id);
        $keterangan = $this->request->getVar('keterangan');
        $model->update($id, ['status' => 31, 'keterangan_supervisor' => $keterangan]);

        $logm = new LogModel();
        $logm->insert(['id_usul' => $id, 'status_usulan' => 31, 'keterangan' => 'Verifikasi Ulang. ' . $keterangan, 'created_by' => user_id()]);

        session()->setFlashdata('success', 'Usulan dikembalikan ke Verifikator.');
        return $this->response->setJSON(['status' => 'success']);
    }

    function draftrkma($id)
    {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new PendirianptkisModel();
        $usulan = $model->where('id', $id)->first();
        $detail = $detail->where('usulan_id', $id)->first();

        $pmodel = new ProdiModel;
        $prodi = $pmodel->where(['usul_id' => $id])->findAll();

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
        foreach ($prodi as $pd) {
            $templateProcessor->setValue(
                'prodiList#' . $i,
                $pd->nama_prodi
            );
            $i++;
        }

        $templateProcessor->setValue('menteriAgama', 'Nasaruddin Umar');

        $lembaga = preg_replace('/[^A-Za-z0-9_\-]/', '_', $detail->nama_lembaga);
        $fileName = 'draftRKMA_' . $lembaga . '.docx'; // Desired filename for the download
        $templateProcessor->saveAs('draft/' . $fileName);

        return $this->response->download('draft/' . $fileName, null);
    }

    function done($id)
    {
        $model = new UsulanModel;
        $detail = new PendirianptkisModel();

        $id = decrypt($id);
        $keterangan = $this->request->getVar('keterangan');
        $model->update($id, ['status' => 20, 'keterangan_supervisor' => $keterangan]);

        $logm = new LogModel();
        $logm->insert(['id_usul' => $id, 'status_usulan' => 20, 'keterangan' => 'Usulan Selesai', 'created_by' => user_id()]);

        return redirect()->back()->with('success', 'Usulan telah ditandai selesai.');
    }

    public function kirimDataProdi($prodiId)
    {
        $pm = new ProdiModel();
        $prodi = $pm->find($prodiId);

        if (!$prodi) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Prodi tidak ditemukan'])->setStatusCode(404);
        }

        $idUsul = $prodi->usul_id;
        $model = new UsulanModel();
        $usulan = $model->where('id', $idUsul)->first();

        if (!$usulan) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Usulan tidak ditemukan'])->setStatusCode(404);
        }

        $crud = new CrudModel;
        $dokumen = $crud->query_array("SELECT a.*,b.lampiran,b.keterangan,b.dok_status AS keterangan_status FROM tm_dokumen a
                                    LEFT JOIN (SELECT dokumen_id,lampiran,keterangan,dok_status FROM tr_prodi_dokumen WHERE usul_id='$prodiId') b
                                    ON b.dokumen_id=a.id
                                    WHERE a.layanan_id='6' AND a.sippro_kode IS NOT NULL ORDER BY a.id ASC");

        $list_dok = [];
        foreach ($dokumen as $d) {
            $list_dok[] = [
                "jenis" => $d->id,
                "kode" => $d->sippro_kode,
                "url" => base_url('uploads/prodi/' . $d->lampiran),
            ];
        }

        $data = [
            "external_id" => "SIPTIKA-" . $idUsul . "-" . $prodi->id,
            "source_system" => "SIPTIKA",
            "nama_prodi" => $prodi->nama_prodi,
            "jenjang" => 'S1',
            "lembaga" => $usulan->nama_lembaga,
            "tanggal_pengajuan" => date('Y-m-d\TH:i:s'),
            "dokumen" => $list_dok
        ];

        $sipproService = new SipproService();
        $response = $sipproService->kirimProdiBaru($data);

        log_message('debug', 'Data to Sippro: ' . json_encode($data));
        log_message('debug', 'Response from Sippro: ' . json_encode($response));

        $logModel = new SiproLogModel;

        // SipproService puts the decoded json in $response->data
        $responseDataLog = isset($response->data) ? $response->data : ($response->message ?? null);

        $logModel->insert([
            'usul_id' => $idUsul,
            'prodi_id' => $prodi->id,
            'endpoint' => 'prodi-baru',
            'request_data' => json_encode($data),
            'response_data' => json_encode($responseDataLog),
            'status_code' => $response->status,
            'is_success' => $response->success ? 1 : 0
        ]);

        if ($response->success) {
            // Ambil pesan dari API jika ada
            $apiMessage = (is_array($response->data) && isset($response->data['message']))
                ? $response->data['message']
                : 'Berhasil dikirim ke SIPPRO';

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Prodi ' . $prodi->nama_prodi . ': ' . $apiMessage,
                'data' => (is_array($response->data) && isset($response->data['data'])) ? $response->data['data'] : null
            ]);
        } else {
            $apiMessage = (is_array($response->data) && isset($response->data['message']))
                ? $response->data['message']
                : ($response->message ?? 'Gagal mengirim prodi ke SIPPRO');

            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Prodi ' . $prodi->nama_prodi . ': ' . $apiMessage,
                'data' => $response->data ?? null
            ])->setStatusCode(400);
        }
    }

    public function generateNssIndex()
    {
        $model = new UsulanModel();

        // Get usulan pendirianptkis yang sudah selesai (status 20)
        $data['usulan_list'] = $model->table('tr_usulan')->select('tr_usulan.status, tr_usulan_pendirianptkis.*')
            ->join('tr_usulan_pendirianptkis', 'tr_usulan.id = tr_usulan_pendirianptkis.usulan_id', 'inner')
            ->where('layanan_id', 1)
            ->where('status', 20)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResult();



        return view('supervisor/usulan/pendirianptkis/generate_nss', $data);
    }

    public function prosesGenerateNss($id)
    {
        $id = decrypt($id);
        $detail = new PendirianptkisModel();
        $model = new UsulanModel();
        $siproLog = new SiproLogModel();

        $pendirianptkis = $detail->where('usulan_id', $id)->first();

        if (!$pendirianptkis || !$pendirianptkis->nspt_lembaga_id) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data lembaga atau NSPT ID tidak ditemukan'
            ])->setStatusCode(404);
        }

        try {
            $nsptService = new NsptService();
            $nsptResponse = $nsptService->generateNss($pendirianptkis->nspt_lembaga_id);

            // Log NSS generation attempt
            $siproLog->insert([
                'usul_id' => $id,
                'endpoint' => 'lembaga/generate-nss',
                'request_data' => json_encode(['nspt_lembaga_id' => $pendirianptkis->nspt_lembaga_id]),
                'response_data' => json_encode($nsptResponse->raw_response ?? null),
                'status_code' => $nsptResponse->status,
                'is_success' => $nsptResponse->success ? 1 : 0
            ]);

            if ($nsptResponse->success) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'NSS berhasil di-generate',
                    'data' => $nsptResponse->data
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => $nsptResponse->message ?? 'Gagal generate NSS'
                ])->setStatusCode(400);
            }
        } catch (\Exception $e) {
            $siproLog->insert([
                'usul_id' => $id,
                'endpoint' => 'lembaga/generate-nss',
                'request_data' => json_encode(['nspt_lembaga_id' => $pendirianptkis->nspt_lembaga_id]),
                'response_data' => json_encode(['error' => $e->getMessage()]),
                'status_code' => 500,
                'is_success' => 0
            ]);

            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }
}
