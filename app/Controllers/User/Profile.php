<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Shield\Config\Auth as AuthConfig;
use CodeIgniter\Shield\Authentication\Passwords;

class Profile extends BaseController
{
    public function index()
    {
        return view('user/profile');
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

        // Pastikan user login
        if (! $user) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Verifikasi password lama
        if (! password_verify($oldPassword, $user->password_hash)) {
            return redirect()->back()->with('error', 'Password lama tidak cocok!');
        }

        // Update password baru
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

        // Ambil data dari form
        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'phone'    => $this->request->getPost('phone'),
        ];

        // Update data user
        $userModel = new UserModel();
        $userModel->update($user->id, $data);

        return redirect()->back()->with('message', 'Profil berhasil diperbarui.');
    }
}
