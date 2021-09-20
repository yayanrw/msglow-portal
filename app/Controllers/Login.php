<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }
    public function Index()
    {
        return view('Login/LoginView');
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
                    'logged_in'     => true,
                    'last_logged_in'   => date("Y-m-d H:i:s")
                ];
                $session->set($sessionData);
                return redirect()->to('/User/Home');
            } else {
                $session->setFlashdata('login_notification', 'Your email or password is incorrect');
                return redirect()->to('/Login');
            }
        } else {
            $session->setFlashdata('login_notification', 'Your email or password  is incorrect');
            return redirect()->to('/Login');
        }
    }

    public function Logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/Login');
    }
}
