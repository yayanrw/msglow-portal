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
        $loginInformation = [
            'users_email' => $this->request->getVar('users_email'),
            'users_password' => $this->request->getVar('users_password')
        ];

        $users = $this->usersModel->find($loginInformation['users_email']);

        if ($users) {
            if (password_verify($loginInformation['users_password'], $users['users_password'])) {
                return redirect()->to('/User/Home');
            } else {
                echo "NOT OK";
            }
        } else {
            echo 'Email is incorrect';
        }
    }
}
