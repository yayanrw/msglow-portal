<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AppsDocumentationModel;
use App\Models\AppsModel;
use App\Models\AppsSubCategoryModel;
use App\Models\LogErrorModel;

class AppsDocumentationController extends BaseController
{
    protected $router;
    protected $logErrorModel;
    protected $appsModel;
    protected $appsSubCategoryModel;
    protected $appsDocumentationModel;

    public function __construct()
    {
        $this->appsSubCategoryModel = new AppsSubCategoryModel();
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->appsModel = new AppsModel();
        $this->appsDocumentationModel = new AppsDocumentationModel();
    }

    public function Index()
    {
        try {
            $data = [
                'title'   => 'Apps Documentation',
                'apps_documentation' => $this->appsDocumentationModel->AppsDocumentationWithAppsSubCategory(),
                'apps_sub_category'  => $this->appsDocumentationModel->AppsDocumentationWithAppsSubCategoryGrouped()
            ];
            return view('admin/apps_documentation/apps_documentation_view', $data);
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
                'title' => 'Apps Documentation',
                'subtitle' => 'Input New Document',
                'apps_sub_category' => $this->appsModel->AppsWithAppsSubCategory()->getResult('array')
            ];
            return view('admin/apps_documentation/apps_documentation_input_view', $data);
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

    public function Edit($apps_document_pid = null)
    {
        try {
            $data = [
                'title' => 'Apps Documentation',
                'subtitle' => 'Edit Document',
                'apps_documentation' => $this->appsDocumentationModel->find($apps_document_pid),
                'apps_sub_category' => $this->appsModel->AppsWithAppsSubCategory()->getResult('array')
            ];
            return view('admin/apps_documentation/apps_documentation_edit_view', $data);
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
            $this->appsDocumentationModel->insert([
                'apps_sub_category_pid' =>  $this->request->getVar('apps_sub_category_pid'),
                'apps_document_title' =>  $this->request->getVar('apps_document_title'),
                'apps_document_file' =>  $this->request->getVar('apps_document_file'),
                'apps_document_banner_img' =>  $this->request->getVar('apps_document_banner_img'),
                'created_by' =>  session()->get('users_email')
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
            return redirect()->to('admin/apps-documentation');
        }
    }

    public function Update()
    {
        try {
            $this->appsDocumentationModel->update($this->request->getVar('apps_documentation_pid'), [
                'apps_sub_category_pid' => $this->request->getVar('apps_sub_category_pid'),
                'apps_document_file' => $this->request->getVar('apps_document_file'),
                'apps_document_banner_img' => $this->request->getVar('apps_document_banner_img'),
                'apps_document_title' => $this->request->getVar('apps_document_title'),
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => session()->get('users_email')
            ]);
            session()->setFlashdata('successMsg', $this->updatedSuccessMsg);
            return redirect()->to('admin/apps-documentation');
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            session()->setFlashdata('errorMsg', $this->errorProcessingMsg);
            return redirect()->to('admin/apps-documentation');
        }
    }

    public function Active($apps_documentation_pid = null)
    {
        try {
            $apps_documentation = $this->appsDocumentationModel
                ->AppsDocumentationWithAppsSubCategoryDetail($apps_documentation_pid);
            $this->appsDocumentationModel->update($apps_documentation_pid, [
                'is_active'   => !$apps_documentation->is_active,
                'updated_at'  => date('Y-m-d H:i:s'),
                'updated_by'  => session()->get('users_email')
            ]);
            $apps_documentation_name = $apps_documentation->apps_document_title  . ' - ' . $apps_documentation->apps_name . ' ' . $apps_documentation->apps_subname;
            $message = $apps_documentation->is_active ? $apps_documentation_name . ' successfully disabled' : $apps_documentation_name . ' successfully enabled';
            return redirect()->back()->with('successMsg', $message);
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            session()->setFlashdata('errorMsg', $this->errorProcessingMsg);
            return redirect()->to('admin/apps-documentation');
        }
    }
}
