<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\AppsDocumentationModel;
use App\Models\AppsModel;
use App\Models\LogErrorModel;

class AppsDocumentationController extends BaseController
{
    protected $router;
    protected $logErrorModel;
    protected $appsModel;
    protected $appsDocumentationModel;

    public function __construct()
    {
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->appsModel = new AppsModel();
        $this->appsDocumentationModel = new AppsDocumentationModel();
    }

    public function Detail($apps_documentation = null)
    {
        try {
            $apps_documentation = $this->appsDocumentationModel->AppsDocumentationWithAppsSubCategoryDetail($apps_documentation);
            $data = [
                'title'                 => $apps_documentation->apps_document_title,
                'apps_documentation'    => $apps_documentation
            ];
            return view('user/apps_documentation/apps_documentation_detail_view', $data);
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
