<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Usulan extends ResourceController
{
    protected $modelName = 'App\Models\UsulanModel';
    protected $format = 'json';

    private function checkAuth()
    {
        $header = $this->request->getHeaderLine('X-API-KEY');
        // Kunci API bisa disesuaikan atau diambil dari .env, misal: getenv('API_KEY')
        $validKey = 'sipppp123';

        return $header === $validKey;
    }

    public function index()
    {
        if (!$this->checkAuth()) {
            return $this->failUnauthorized('Invalid API Key');
        }

        // return $this->respond($this->model->findAll());
        return $this->respond(['status' => 'success', 'message' => 'API is working']);
    }

    public function show($id = null)
    {
        if (!$this->checkAuth()) {
            return $this->failUnauthorized('Invalid API Key');
        }

        // id = "SIPTIKA-" . $idUsul . "-" . $prodi->id
        $parts = explode("-", $id);
        $idUsul = $parts[1];

        $data = $this->model->where('id', $idUsul)->first();
        if ($data) {
            $res = [
                'id' => $data->kode,
                'nama_lembaga' => $data->nama_lembaga,
                'perihal' => $data->perihal,
                'nomor_surat' => $data->nomor_surat,
                'status' => usul_status_text($data->status),
                'no_kma' => $data->no_kma,
                'tgl_kma' => $data->tgl_kma,
                'file_kma' => $data->file_kma
            ];
            return $this->respond($res);
        } else {
            return $this->failNotFound('Data not found');
        }
    }
}
