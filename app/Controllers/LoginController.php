<?php

namespace App\Controllers;

use App\Models\LogLoginModel;
use App\Models\UsersModel;

class LoginController extends BaseController
{
    protected $usersModel;
    protected $logLoginModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->logLoginModel = new LogLoginModel();
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
            return view('Login\LoginView');
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
                //store session
                $sessionData = [
                    'users_email'      => $users['users_email'],
                    'users_name'       => $users['users_name'],
                    'users_division'   => $users['users_division'],
                    'is_administrator' => $users['is_administrator'],
                    'logged_in'        => true,
                    'last_logged_in'   => date("Y-m-d H:i:s")
                ];
                $session->set($sessionData);

                //update users
                $this->usersModel->update($users['users_email'], [
                    'last_login'   => date("Y-m-d H:i:s")
                ]);

                //insert log
                $this->logLoginModel->insert([
                    'users_email'  => $users['users_email'],
                    'device'       => null,
                    'ip'           => null,
                    'location'     => null,
                ]);

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
