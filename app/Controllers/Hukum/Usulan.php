<?php

namespace App\Controllers\Hukum;

use App\Controllers\BaseController;
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

        return view('hukum/usulan/index', $data);
    }

    public function getdata()
    {
        $db = \Config\Database::connect('default', false);
        // Only fetch proposals with status Selesai (status = 20)
        $builder = $db->table('tr_usulan')->where(['status' => 20]);

        return DataTable::of($builder)
            ->add('action', function($row){
                return '<a href="'.site_url('hukum/usulan/'.layananurl($row->layanan_id).'/detail/'.encrypt($row->id)).'" type="button" class="btn btn-primary btn-sm"><i class="ti tabler-eye me-1"></i>View</a> <a href="javascript:;" type="button" class="btn btn-warning btn-sm" onClick="log(\''.encrypt($row->id).'\')"><i class="ti tabler-history me-1"></i>Log</a>';
            })->format('submit_at', function($value, $meta){
                return date('Y-m-d', strtotime($value));
            })->format('status', function($value, $meta){
                return usul_status($value);
            })->filter(function ($builder, $request) {
                if ($request->layanan) {
                    $builder->where('tr_usulan.layanan_id', $request->layanan);
                }
            })
            ->toJson(true);
    }

    public function detail($id)
    {
        $decryptedId = decrypt($id);
        $model = new UsulanModel();
        $usulan = $model->find($decryptedId);

        if (!$usulan) {
            return redirect()->to(site_url('hukum/usulan'))->with('error', 'Usulan tidak ditemukan.');
        }

        $layananUrl = layananurl($usulan->layanan_id);
        return redirect()->to(site_url('hukum/usulan/' . $layananUrl . '/detail/' . $id));
    }

    public function download()
    {
        $model = new UsulanModel();
        $data = $model->select('tr_usulan.*, users.full_name as verifikator_nama')
            ->join('users', 'users.id = tr_usulan.verifikator', 'left')
            ->where(['tr_usulan.status' => 20])
            ->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Layanan');
        $sheet->setCellValue('B1', 'Nomor Surat');
        $sheet->setCellValue('C1', 'Perihal');
        $sheet->setCellValue('D1', 'Nama Lembaga');
        $sheet->setCellValue('E1', 'Status');
        $sheet->setCellValue('F1', 'No. KMA');
        $sheet->setCellValue('G1', 'Tgl. KMA');
        $sheet->setCellValue('H1', 'Verifikator');
        $sheet->setCellValue('I1', 'Keterangan');
        $sheet->setCellValue('J1', 'Tanggal Usul');

        $i = 2;
        foreach ($data as $row) {
            $sheet->setCellValue('A'.$i, $row->layanan_nama);
            $sheet->setCellValue('B'.$i, $row->nomor_surat);
            $sheet->setCellValue('C'.$i, $row->perihal);
            $sheet->setCellValue('D'.$i, $row->nama_lembaga);
            $sheet->setCellValue('E'.$i, usul_status_text($row->status));
            $sheet->setCellValue('F'.$i, $row->no_kma ?? '-');
            $sheet->setCellValue('G'.$i, $row->tgl_kma ?? '-');
            $sheet->setCellValue('H'.$i, $row->verifikator_nama ?? '-');
            $sheet->setCellValue('I'.$i, $row->keterangan ?? '-');
            $sheet->setCellValue('J'.$i, $row->submit_at ? date('Y-m-d', strtotime($row->submit_at)) : '-');
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Usulan_Selesai_Biro_Hukum_'.date('YmdHis').'.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }
}
