<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AppsDocumentationModel;
use App\Models\AppsModel;
use App\Models\AppsSubCategoryModel;
use App\Models\LogErrorModel;

class HomeController extends BaseController
{
    protected $router;
    protected $logErrorModel;
    protected $appsModel;
    protected $appsDocumentationModel;
    protected $appsSubCategoryModel;

    public function __construct()
    {
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->appsModel = new AppsModel();
        $this->appsDocumentationModel = new AppsDocumentationModel();
        $this->appsSubCategoryModel = new AppsSubCategoryModel();
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
                    ->getResult('array'),
                'latest_categories' => $this->appsSubCategoryModel->AppsSubCategoryWithAppsTop5Latest(),
                'latest_documents' => $this->appsDocumentationModel->AppsDocumentationWithAppsSubCategoryTop5Latest(),
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
