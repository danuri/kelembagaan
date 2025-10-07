<?php

namespace App\Controllers\Verifikator;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('verifikator/dashboard');
    }
}
