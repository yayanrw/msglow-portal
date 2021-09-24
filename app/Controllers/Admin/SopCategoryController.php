<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\LogErrorModel;
use App\Models\SopCategoryModel;

class SopCategoryController extends BaseController
{
    protected $router;
    protected $logErrorModel;
    protected $appsSubCategoryModel;

    public function __construct()
    {
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->sopCategoryModel = new SopCategoryModel();
    }

    public function Input()
    {
        try {
            $data = [
                'title' => 'SOP Documents',
                'subtitle' => 'Input New Sub-Category',
            ];
            return view('admin/sop_category/sop_category_input_view', $data);
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

    public function Edit($sop_category_pid = null)
    {
        try {
            $data = [
                'title' => 'SOP Documents',
                'subtitle' => 'Edit Sub-Category',
                'sop_category' => $this->sopCategoryModel->find($sop_category_pid),
            ];
            return view('admin/sop_category/sop_category_edit_view', $data);
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
            $this->sopCategoryModel->insert([
                'sop_category_title' => $this->request->getVar('sop_category_title'),
                'sop_cateogory_banner_img' => $this->request->getVar('sop_cateogory_banner_img'),
                'created_by' => session()->get('users_email')
            ]);
            session()->setFlashdata('successMsg', $this->savedSuccessMsg);
            return redirect()->to('admin/sop-documents');
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            session()->setFlashdata('errorMsg', $this->errorProcessingMsg);
            return redirect()->to('admin/sop-documents');
        }
    }

    public function Update()
    {
        try {
            $this->sopCategoryModel->update($this->request->getVar('sop_category_pid'), [
                'sop_category_title' => $this->request->getVar('sop_category_title'),
                'sop_category_banner_img' => $this->request->getVar('sop_category_banner_img'),
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => session()->get('users_email')
            ]);
            session()->setFlashdata('successMsg', $this->updatedSuccessMsg);
            return redirect()->to('admin/sop-documents');
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            session()->setFlashdata('errorMsg', $this->errorProcessingMsg);
            return redirect()->to('admin/sop-documents');
        }
    }

    public function Active($sop_category_pid = null)
    {
        try {
            $sop_category = $this->sopCategoryModel->find($sop_category_pid);
            $this->sopCategoryModel->update($sop_category_pid, [
                'is_active'   => !$sop_category['is_active'],
                'updated_at'  => date('Y-m-d H:i:s'),
                'updated_by'  => session()->get('users_email')
            ]);
            $sop_category_name = $sop_category['sop_category_title'];
            $message = $sop_category['is_active'] ? $sop_category_name . ' successfully disabled' : $sop_category_name . ' successfully enabled';
            return redirect()->back()->with('successMsg', $message);
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            session()->setFlashdata('errorMsg', $this->errorProcessingMsg);
            return redirect()->to('admin/sop-documents');
        }
    }
}
