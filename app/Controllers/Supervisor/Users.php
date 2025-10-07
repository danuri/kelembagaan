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

        return view('supervisor/users/index', $data);
    }

    function create() {
        $users = auth()->getProvider();

        $user = new User([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ]);
        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Add to default group
        // $users->addToDefaultGroup($user);
        $user->addGroup($this->request->getPost('group'));

        return redirect()->to(site_url('supervisor/users'))->with('success', 'User created successfully.');
    }

    function edit($id) {
        $users = auth()->getProvider();

        $user = $users->findById($id);

        if (!$user) {
            return redirect()->to(site_url('supervisor/users'))->with('error', 'User not found.');
        }

        $data['user'] = $user;

        return view('supervisor/users/edit', $data);
    }

    function update($id) {
        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();

        $user = $users->findById(123);
        $user->fill([
            'username' => 'JoeSmith111',
            'email' => 'joe.smith@example.com',
            'password' => 'secret123'
        ]);
        $users->save($user);
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
