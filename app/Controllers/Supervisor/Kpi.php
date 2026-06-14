<?php

namespace App\Controllers\Supervisor;

use App\Controllers\BaseController;
use App\Models\CrudModel;

class Kpi extends BaseController
{
    public function index()
    {
        $crud = new CrudModel();
        $data['kpiVerifikator'] = $crud->kpiVerifikator();
        $data['kpiAsesor']      = $crud->kpiAsesor();
        return view('supervisor/kpi', $data);
    }
}
