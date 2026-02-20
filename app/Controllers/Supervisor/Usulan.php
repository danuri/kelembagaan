<?php

namespace App\Controllers\Supervisor;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Hermawan\DataTables\DataTable;
use App\Models\LayananModel;
use App\Models\UsulanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
            })->format('submit_at', function($value, $meta){
                return date('Y-m-d', strtotime($value));
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

    function savekma($id) {
        // validation
        $validation = \Config\Services::validation();
        $validation->setRules([
            'no_kma' => 'required',
            'tgl_kma' => 'required',
            'lampiran' => 'uploaded[lampiran]|max_size[lampiran,2048]|ext_in[lampiran,pdf]'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }
        // handle file upload
        $id = decrypt($id);
        $file = $this->request->getFile('lampiran');
        if ($file->isValid() && !$file->hasMoved()) {
            // $newName = $file->getRandomName();
            // name file kma berdasarkan id usulan
            $newName = 'KMA_'.$id.'.'.$file->getExtension();
            $file->move('uploads/kma', $newName);
        } else {
            return redirect()->back()->withInput()->with('error', 'File upload failed');
        }
        $model = new UsulanModel();
        // update data
        $data = [
            'no_kma' => $this->request->getPost('no_kma'),
            'tgl_kma' => $this->request->getPost('tgl_kma'),
            'file_kma' => $newName
        ];
        $model->update($id, $data);
        return redirect()->back()->withInput()->with('message', 'Data telah direkam');
    }

    function download() {
        $model = new UsulanModel;
        $data = $model->select('tr_usulan.*, users.full_name as verifikator_nama')->join('users', 'users.id = tr_usulan.verifikator','left')->where(['tr_usulan.status >'=>0])->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Layanan');
        $sheet->setCellValue('B1', 'Nomor Surat');
        $sheet->setCellValue('C1', 'Perihal');
        $sheet->setCellValue('D1', 'Nama Lembaga');
        $sheet->setCellValue('E1', 'Status');
        $sheet->setCellValue('F1', 'Verifikator');
        $sheet->setCellValue('G1', 'Keterangan');
        $sheet->setCellValue('H1', 'Tanggal Usul');

        $i = 2;
        foreach ($data as $row) {
            $sheet->setCellValue('A'.$i, $row->layanan_nama);
            $sheet->setCellValue('B'.$i, $row->nomor_surat);
            $sheet->setCellValue('C'.$i, $row->perihal);
            $sheet->setCellValue('D'.$i, $row->nama_lembaga);
            $sheet->setCellValue('E'.$i, usul_status_text($row->status));
            $sheet->setCellValue('F'.$i, $row->verifikator_nama);
            $sheet->setCellValue('G'.$i, $row->keterangan);
            $sheet->setCellValue('H'.$i, $row->submit_at);
            $i++;
        }

        $tanggal = date('YmdHis');
        $writer = new Xlsx($spreadsheet);
        ob_clean();
        ob_start();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data_Usulan_'.$tanggal.'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        ob_end_flush();
        exit;
    }

}
