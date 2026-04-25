<?php

namespace App\Controllers\Supervisor;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Entities\User;

class Users extends BaseController
{
    public function index()
    {
        $users = auth()->getProvider();

        $data['users'] = $users
            ->withIdentities()
            ->withGroups()
            ->withPermissions()
            ->findAll();

        $data['groups'] = config('AuthGroups')->groups;

        return view('supervisor/users/index', $data);
    }

    function create() {
        $users = auth()->getProvider();

        $user = new User([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'full_name' => $this->request->getPost('full_name'),
            'phone' => $this->request->getPost('phone'),
        ]);
        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Add to default group
        // $users->addToDefaultGroup($user);
        $groups = $this->request->getPost('groups');
        if (is_array($groups)) {
            $user->syncGroups(...$groups);
        } elseif ($groups) {
            $user->addGroup($groups);
        }

        return redirect()->to(site_url('supervisor/users'))->with('success', 'User created successfully.');
    }

    function edit($id) {
        $users = auth()->getProvider();

        $user = $users->findById($id);

        if (!$user) {
            return redirect()->to(site_url('supervisor/users'))->with('error', 'User not found.');
        }

        $data['user'] = $user;
        $data['groups'] = config('AuthGroups')->groups;

        return view('supervisor/users/edit', $data);
    }

    function update($id) {
        // Get the User Provider (UserModel by default)
        // validation
        $validation = \Config\Services::validation();
        $rules = [];
        $password = $this->request->getPost('password');
        
        if (!empty($password)) {
            $rules['password'] = 'required';
        }

        if (!empty($rules)) {
            $validation->setRules($rules);
            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('error', $validation->getErrors());
            }
        }

        $users = auth()->getProvider();

        $user = $users->findById($id);
        
        if (!empty($password)) {
            $user->fill([
                'password' => $password,
            ]);
        }

        $groups = $this->request->getPost('groups');
        if ($groups !== null) {
            if (is_array($groups)) {
                $user->syncGroups(...$groups);
            } else {
                $user->syncGroups($groups);
            }
        }

        $users->save($user);

        return redirect()->to(site_url('supervisor/users'))->with('success', 'User updated successfully.');
    }

    function delete($id)
    {
        $users = auth()->getProvider();

        $user = $users->findById($id);

        if ($user && $users->delete($id)) {
            return redirect()->to(site_url('supervisor/users'))->with('success', 'User deleted successfully.');
        }

        return redirect()->to(site_url('supervisor/users'))->with('error', 'User not found or could not be deleted.');
        
    }

    function activate($id) {
        $users = auth()->getProvider();

        $user = $users->findById($id);

        if ($user) {
            $user->active = true;
            $users->save($user);
            return redirect()->to(site_url('supervisor/users'))->with('success', 'User activated successfully.');
        }

        return redirect()->to(site_url('supervisor/users'))->with('error', 'User not found.');
    }

    function deactivate($id) {
        $users = auth()->getProvider();

        $user = $users->findById($id);

        if ($user) {
            $user->active = false;
            $users->save($user);
            return redirect()->to(site_url('supervisor/users'))->with('success', 'User activated successfully.');
        }

        return redirect()->to(site_url('supervisor/users'))->with('error', 'User not found.');
    }
}
