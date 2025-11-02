<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\UsulanModel;
use App\Models\AlihbentukptkisModel;
use App\Models\CrudModel;

class Export extends BaseController
{
    public function index()
    {
        //
    }

    public function reportalihbentukptkis($id)
    {
        $id = decrypt($id);
        $model = new UsulanModel();
        $detail = new AlihbentukptkisModel();
        $data['usulan'] = $model->where('id', $id)->first();
        $data['detail'] = $detail->where('usulan_id', $id)->first();

        $crudModel = new CrudModel();
        $data['dokumens'] = $crudModel->getDokumen($data['usulan']->layanan_id, $data['usulan']->id);

        // 1. Inisialisasi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true); // agar bisa load gambar/logo dari URL
        $dompdf = new Dompdf($options);

        // 3. Render view ke HTML
        $html = view('pdf/alihbentukptkis', $data); 
        // letakkan file html di folder: app/Views/pdf/alihbentukptkis.php

        // 4. Muat HTML ke Dompdf
        $dompdf->loadHtml($html);

        // 5. Set ukuran dan orientasi halaman
        $dompdf->setPaper('A4', 'portrait');

        // 6. Render ke PDF
        $dompdf->render();

        // 7. Output ke browser (inline)
        $dompdf->stream('Usulan_Alih_Bentuk_PTKIS.pdf', [
            'Attachment' => false // ubah ke true jika ingin langsung download
        ]);
    }
}
