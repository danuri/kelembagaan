<?php

namespace App\Controllers\Supervisor;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\LayananModel;

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
                return '<a href="'.site_url('supervisor/usulan/'.layananurl($row->layanan_id).'/detail/'.encrypt($row->id)).'" target="_blank" type="button" class="btn btn-primary btn-sm">View</a> <a href="javascript:;" type="button" class="btn btn-warning btn-sm" onClick="log(\''.encrypt($row->id).'\')">Log</a>';
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

}
