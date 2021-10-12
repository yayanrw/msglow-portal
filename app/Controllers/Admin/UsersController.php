<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AccessMappingModel;
use App\Models\LogErrorModel;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    protected $router;
    protected $logErrorModel;
    protected $usersModel;
    protected $accessMappingModel;

    public function __construct()
    {
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->usersModel = new UsersModel();
        $this->accessMappingModel = new AccessMappingModel();
    }

    public function Index()
    {
        try {
            $data = [
                'title' => 'Manage Users',
                'users' => $this->usersModel->UsersWithApps()
            ];
            return view('admin/users/users_view', $data);
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

    public function Input()
    {
        try {
            $data = [
                'title'     => 'Manage Users',
                'subtitle'  => 'Input',
            ];
            return view('admin/users/users_input_view', $data);
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

    public function Edit($users_pid = null)
    {
        try {
            $users = $this->usersModel->UsersWithAppsDetail($users_pid);
            $data = [
                'title'     => 'Manage Users',
                'subtitle'  => 'Edit',
                'users'     => $users
            ];
            return view('admin/users/users_edit_view', $data);
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

    public function Insert()
    {
        try {
            $this->usersModel->insert([
                'users_pid'         => $this->request->getVar('users_pid'),
                'users_email'       => $this->request->getVar('users_email'),
                'users_division'    => $this->request->getVar('users_division'),
                'users_password'    => $this->request->getVar('users_password'),
                'is_administrator'  => $this->request->getVar('is_administrator'),
                'created_by'        => session()->get('users_email')
            ]);

            session()->setFlashdata('successMsg', $this->savedSuccessMsg);
            return redirect()->to('admin/apps-management');
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            session()->setFlashdata('errorMsg', $this->errorProcessingMsg);
            return redirect()->to('admin/apps-management');
        }
    }

    public function Update()
    {
        try {
            $oldPassword = $this->usersModel->GetEmail($this->request->getVar('users_pid'));
            $this->usersModel->UpdateUsers(
                $this->request->getVar('users_pid'),
                $this->request->getVar('users_email'),
                $this->request->getVar('users_password')
            );
            $this->accessMappingModel->UpdateOnUsers(
                $oldPassword,
                $this->request->getVar('users_email')
            );

            session()->setFlashdata('successMsg', $this->savedSuccessMsg);
            return redirect()->to('admin/users');
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            session()->setFlashdata('errorMsg', $this->errorProcessingMsg);
            return redirect()->to('admin/users');
        }
    }
}
