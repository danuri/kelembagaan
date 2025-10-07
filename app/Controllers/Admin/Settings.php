<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Settings extends BaseController
{
    public function index()
    {
        return view('admin/settings');
    }

    function updateSettings() {
        service('settings')->set('App.siteName', $this->request->getPost('app_name'));
    }
}
