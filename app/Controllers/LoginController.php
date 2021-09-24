<?php

namespace App\Controllers;

use App\Models\LogErrorModel;
use App\Models\LogLoginModel;
use App\Models\UsersModel;

class LoginController extends BaseController
{
    protected $router;
    protected $logErrorModel;
    protected $logLoginModel;
    protected $usersModel;

    public function __construct()
    {
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->usersModel = new UsersModel();
        $this->logLoginModel = new LogLoginModel();
    }
    public function Index()
    {
        try {
            if (session()->get('logged_in')) {
                if (session()->get('is_administrator')) {
                    return redirect()->to('/admin');
                } else {
                    return redirect()->to('/user');
                }
            } else {
                return view('login/login_view');
            }
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            return view('errors/html/production');
        }
    }

    public function Auth()
    {
        try {
            $session = session();
            $loginInformation = [
                'users_email' => $this->request->getVar('users_email'),
                'users_password' => $this->request->getVar('users_password')
            ];

            $users = $this->usersModel->where('users_email', $loginInformation['users_email'])->get()->getRow();

            if ($users) {
                if (password_verify($loginInformation['users_password'], $users->users_password)) {
                    //store session
                    $sessionData = [
                        'users_email'      => $users->users_email,
                        'users_name'       => $users->users_name,
                        'users_division'   => $users->users_division,
                        'is_administrator' => $users->is_administrator,
                        'logged_in'        => true,
                        'last_logged_in'   => date("Y-m-d H:i:s")
                    ];
                    $session->set($sessionData);


                    //update users
                    $this->usersModel->update($users->users_pid, [
                        'last_login'   => date("Y-m-d H:i:s")
                    ]);

                    //insert log
                    $this->logLoginModel->insert([
                        'users_email'  => $users->users_email,
                        'device'       => null,
                        'ip'           => null,
                        'location'     => null,
                    ]);
                    $session->setFlashdata('successMsg', 'Welcome back, ' . $users->users_name . '. Have a nice day :)');
                    return $users->is_administrator ? redirect()->to('/admin') : redirect()->to('/user');
                } else {
                    $session->setFlashdata('errorMsg', 'Your email or password is incorrect');
                    return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('errorMsg', 'Your email or password  is incorrect');
                return redirect()->to('/login');
            }
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            return redirect()->back()->with('successMsg', $this->errorProcessingMsg);
        }
    }

    public function Logout()
    {
        try {
            $session = session();
            $session->destroy();
            return redirect()->to('/login');
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            return view('errors/html/production');
        }
    }
}
