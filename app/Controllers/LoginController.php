<?php

namespace App\Controllers;

use App\Models\UsersModel;

class LoginController extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }
    public function Index()
    {
        if (session()->get('logged_in')) {
            if (session()->get('is_administrator')) {
                return redirect()->to('/admin');
            } else {
                return redirect()->to('/user');
            }
        } else {
            return view('Login/LoginView');
        }
    }

    public function Auth()
    {
        $session = session();
        $loginInformation = [
            'users_email' => $this->request->getVar('users_email'),
            'users_password' => $this->request->getVar('users_password')
        ];

        $users = $this->usersModel->find($loginInformation['users_email']);

        if ($users) {
            if (password_verify($loginInformation['users_password'], $users['users_password'])) {
                $sessionData = [
                    'users_email'      => $users['users_email'],
                    'users_name'       => $users['users_name'],
                    'users_division'   => $users['users_division'],
                    'is_administrator' => $users['is_administrator'],
                    'logged_in'        => true,
                    'last_logged_in'   => date("Y-m-d H:i:s")
                ];
                $session->set($sessionData);

                return $users['is_administrator'] ? redirect()->to('/admin') : redirect()->to('/user');
            } else {
                $session->setFlashdata('login_notification', 'Your email or password is incorrect');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('login_notification', 'Your email or password  is incorrect');
            return redirect()->to('/login');
        }
    }

    public function Logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
