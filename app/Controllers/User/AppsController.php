<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\AccessMappingModel;
use App\Models\AppsDocumentationModel;
use App\Models\AppsModel;
use App\Models\LogErrorModel;

class AppsController extends BaseController
{
    protected $router;
    protected $logErrorModel;
    protected $appsModel;
    protected $appsDocumentationModel;
    protected $accessMappingModel;

    public function __construct()
    {
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->appsModel = new AppsModel();
        $this->appsDocumentationModel = new AppsDocumentationModel();
        $this->accessMappingModel = new AccessMappingModel();
    }

    public function Detail($apps_pid = null)
    {
        try {
            $apps = $this->appsModel->find($apps_pid);
            $data = [
                'title'                 => $apps['apps_name'],
                'apps'                  => $apps,
                'access_mapping'        => $this->accessMappingModel->AccessMappingWithUsersApps(session()->get('users_email'), $apps_pid),
                'apps_documentation'    => $this->appsDocumentationModel->AppsDocumentationWithAppsSubCategoryByApps($apps_pid)
            ];
            return view('user/apps/apps_detail_view', $data);
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
