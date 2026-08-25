<?php

namespace App\Controllers\Hukum;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CrudModel;
use App\Models\UsulanModel;
use CodeIgniter\Shield\Config\Auth as AuthConfig;
use CodeIgniter\Shield\Authentication\Passwords;

class Dashboard extends BaseController
{
    public function index()
    {
        $crud = new CrudModel();
        $db = \Config\Database::connect('default', false);

        // Usulan Selesai statistics
        $data['jumlahUsulSelesai'] = $crud->jumlahUsulSelesai();
        $data['jumlahUsul'] = $crud->jumlahUsul();
        $data['jumlahLayananStatus'] = $crud->jumlahLayananStatus();

        // Recent completed usulan
        $usulanModel = new UsulanModel();
        $data['recentSelesai'] = $usulanModel->where('status', 20)->orderBy('updated_at', 'DESC')->findAll(5);

        return view('hukum/dashboard', $data);
    }

    public function profile()
    {
        return view('hukum/profile');
    }

    public function updatePassword()
    {
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|min_length[8]',
            'confirm_password' => 'required|matches[new_password]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('error', 'Validasi gagal!')->withInput();
        }

        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');

        $user = auth()->user();

        if (! $user) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (! password_verify($oldPassword, $user->password_hash)) {
            return redirect()->back()->with('error', 'Password lama tidak cocok!');
        }

        $config = new AuthConfig();
        $passwordService = new Passwords($config);
        $user->password_hash = $passwordService->hash($newPassword);

        $userModel = new UserModel();
        $userModel->save($user);

        return redirect()->back()->with('message', 'Password berhasil diubah.');
    }

    public function updateProfile()
    {
        $rules = [
            'full_name' => 'required',
            'phone'    => 'permit_empty|numeric|min_length[10]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('error', 'Validasi gagal!')->withInput();
        }

        $user = auth()->user();

        if (! $user) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'phone'    => $this->request->getPost('phone'),
        ];

        $userModel = new UserModel();
        $userModel->update($user->id, $data);

        return redirect()->back()->with('message', 'Profil berhasil diperbarui.');
    }
}
