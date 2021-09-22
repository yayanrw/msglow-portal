<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AppsModel;
use App\Models\LogErrorModel;

class HomeController extends BaseController
{
    protected $router;
    protected $appsModel;
    protected $logErrorModel;

    public function __construct()
    {
        $this->router = \Config\Services::router();
        $this->appsModel = new AppsModel();
        $this->logErrorModel = new LogErrorModel();
    }

    public function Index()
    {
        try {
            $data = [
                'title'   => 'Home',
                'latest_apps'  => $this->appsModel
                    ->orderBy('apps_date_release desc')
                    ->limit(5)
                    ->get()
                    ->getResult('array')
            ];
            return view('admin/home/home_view', $data);
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
