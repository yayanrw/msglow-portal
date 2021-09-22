<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AppsModel;
use App\Models\AppsSubCategoryModel;
use App\Models\LogErrorModel;

class AppsSubCategoryController extends BaseController
{
    protected $router;
    protected $logErrorModel;
    protected $appsSubCategoryModel;
    protected $appsModel;

    public function __construct()
    {
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->appsSubCategoryModel = new AppsSubCategoryModel();
        $this->appsModel = new AppsModel();
    }

    public function Input()
    {
        try {
            $data = [
                'title' => 'Apps Documentation',
                'subtitle' => 'Input New Sub-Category',
                'apps' => $this->appsModel->findAll()
            ];
            return view('admin/apps_sub_category/sub_category_input_view', $data);
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
            $this->appsSubCategoryModel->insert([
                'apps_pid' => $this->request->getVar('apps_pid'),
                'apps_sub_category_title' => $this->request->getVar('apps_sub_category_title'),
                'apps_sub_banner_img' => $this->request->getVar('apps_sub_banner_img'),
                'created_by' => session()->get('users_email')
            ]);
            session()->setFlashdata('successMsg', $this->savedSuccessMsg);
            return redirect()->to('admin/apps-documentation');
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
}
