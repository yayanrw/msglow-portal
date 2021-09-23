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

    public function Edit($users_pid = null)
    {
        try {
            $users = $this->usersModel->UsersWithAppsRow($users_pid);
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
