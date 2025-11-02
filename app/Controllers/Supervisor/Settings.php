<?php

namespace App\Controllers\Supervisor;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Settings extends BaseController
{
    public function index()
    {
        return view('supervisor/settings');
    }

    function updateSettings() {
        service('settings')->set('App.siteName', $this->request->getPost('app_name'));
        service('settings')->set('App.siteFooter', $this->request->getPost('app_footer'));

        return redirect()->to(site_url('supervisor/settings'))->with('success', 'Settings updated successfully.');
    }
}
