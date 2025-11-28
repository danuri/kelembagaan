<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
    
class Usulan extends ResourceController
{
    protected $modelName = 'App\Models\UsulanModel';
    protected $format    = 'json';

    public function index()
    {
        // return $this->respond($this->model->findAll());
        return $this->respond(['status' => 'success', 'message' => 'API is working']);
    }
    
    public function show($id = null)
    {
        $data = $this->model->where('kode', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('Data not found');
        }
    }
}
