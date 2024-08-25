<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    public function register()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[3]|is_unique[users.username]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
                'password_confirm' => 'matches[password]'
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $this->userModel->save([
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                ]);
                
                
                return redirect()->to('/welcome'); //to welcome page for logging out
            }
        }
        return view('auth/register', $data);
    }

    public function login()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required',
                'password' => 'required'
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $user = $this->userModel->getUserByUsername($this->request->getPost('username'));
                if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                    $this->setUserSession($user);
                    return redirect()->to('/welcome');
                } else {
                    $data['validation'] = ['password' => 'Invalid username or password'];
                }
            }
        }
        return view('auth/login', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
