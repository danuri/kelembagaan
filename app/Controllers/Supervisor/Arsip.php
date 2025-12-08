<?php

namespace App\Controllers\Supervisor;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;

class Arsip extends BaseController
{
    public function index()
    {
        return view('supervisor/arsip/index');
    }

    function getdata() {
      $db = \Config\Database::connect('kelembagaan', false);
      $builder = $db->table('tbl_user')->select("tbl_user.id,tbl_user.email,tbl_user.is_active,tbl_user.jenis_layanan,tbl_user.nama_lembaga_lama,tbl_user.kategori,tbl_user.jenjang,(CASE WHEN tbl_user.jenis_layanan IN ('ABN','ABS','GN','PS','PN') THEN tbl_user.bap_emis ELSE tbl_user.surat_permohonan END) AS dokumen")->where(['tbl_user.is_role'=>1]);

      return DataTable::of($builder)
          ->add('action', function($row){
                return '<a href="javascript:;" type="button" class="btn btn-primary btn-sm" onclick="detail(\''.$row->email.'\',\''.$row->jenis_layanan.'\')">View</a>';
            })->format('submit_at', function($value, $meta){
                return date('Y-m-d', strtotime($value));
            })->format('is_active', function($value, $meta){
                if($value==0){
                    $status = "<span class='badge badge-info'> Belum Aktif</span>";
                }else if($value==1){
                    $status = "<span class='badge badge-success'> Aktif</span>";
                }else{
                    $status = "<span class='badge badge-info'> Belum Aktif</span>";
                }
            })->filter(function ($builder, $request) {

                if ($request->layanan)
                    $builder->where('tbl_user.jenis_layanan', $request->layanan);

                if ($request->status)
                    $builder->where('tbl_user.is_active', $request->status);

            })
          ->toJson(true);
    }

    public function detail(){
        $email = $this->request->getPost('email');
        $layanan = $this->request->getPost('layanan');

		$sql = "SELECT a.*,b.file, b.is_status, b.email, b.id AS id_file,b.url as url 
                FROM tbldokumen a LEFT JOIN tbl_dokumen_upload b
                ON a.kode_klp = b.kode_klp AND a.kode = b.kode AND b.email = '$email'
                WHERE a.kode_klp = '$layanan'";

        $db = \Config\Database::connect('kelembagaan', false);
		$data['data'] = $db->query($sql)->getResult();
	
		return view("supervisor/arsip/detail",$data);
	
	}
}
