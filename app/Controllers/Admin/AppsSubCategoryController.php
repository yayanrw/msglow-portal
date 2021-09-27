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
    protected $validation;

    public function __construct()
    {
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->appsSubCategoryModel = new AppsSubCategoryModel();
        $this->appsModel = new AppsModel();
        $this->validation =  \Config\Services::validation();
    }

    public function Input()
    {
        try {
            $data = [
                'title' => 'Apps Documentation',
                'subtitle' => 'Input New Sub-Category',
                'validation' => $this->validation,
                'apps' => $this->appsModel->findAll()
            ];
            return view('admin/apps_sub_category/apps_sub_category_input_view', $data);
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

    public function Edit($apps_sub_category_pid = null)
    {
        try {
            $data = [
                'title' => 'Apps Documentation',
                'subtitle' => 'Edit Sub-Category',
                'validation' => $this->validation,
                'apps_sub_category' => $this->appsSubCategoryModel->find($apps_sub_category_pid),
                'apps' => $this->appsModel->findAll()
            ];
            return view('admin/apps_sub_category/apps_sub_category_edit_view', $data);
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
            if (!$this->validate([
                'apps_sub_category_banner_img' => [
                    'rules' => 'max_size[apps_sub_category_banner_img,200]|mime_in[apps_sub_category_banner_img,image/png,image/jpg,image/jpeg]|ext_in[apps_sub_category_banner_img,png,jpg,jpeg]|is_image[apps_sub_category_banner_img]',
                ]
            ])) {
                return redirect()->back()->withInput();
            }

            $appsSubCategoryBannerImg = $this->request->getFile('apps_sub_category_banner_img');
            $appsSubCategoryBannerImgName = $appsSubCategoryBannerImg->getError() == 4 ? null : $appsSubCategoryBannerImg->getName();

            $this->appsSubCategoryModel->insert([
                'apps_pid' => $this->request->getVar('apps_pid'),
                'apps_sub_category_title' => $this->request->getVar('apps_sub_category_title'),
                'apps_sub_category_banner_img' => $appsSubCategoryBannerImgName,
                'created_by' => session()->get('users_email')
            ]);

            if (!empty($appsSubCategoryBannerImgName)) {
                $appsSubCategoryBannerImg->move('assets/uploads/banners/', $appsSubCategoryBannerImgName);
            }

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
            if (!$this->validate([
                'apps_sub_category_banner_img' => [
                    'rules' => 'max_size[apps_sub_category_banner_img,200]|mime_in[apps_sub_category_banner_img,image/png,image/jpg,image/jpeg]|ext_in[apps_sub_category_banner_img,png,jpg,jpeg]|is_image[apps_sub_category_banner_img]',
                ]
            ])) {
                return redirect()->back()->withInput();
            }

            $appsSubCategoryBannerImg = $this->request->getFile('apps_sub_category_banner_img');
            $appsSubCategoryBannerImgName = $appsSubCategoryBannerImg->getError() == 4 ? null : $appsSubCategoryBannerImg->getName();

            $appsSubCategory = $this->appsSubCategoryModel->find($this->request->getVar('apps_sub_category_pid'));

            $this->appsSubCategoryModel->update($this->request->getVar('apps_sub_category_pid'), [
                'apps_pid' => $this->request->getVar('apps_pid'),
                'apps_sub_category_title' => $this->request->getVar('apps_sub_category_title'),
                'apps_sub_category_banner_img' => !empty($appsSubCategoryBannerImgName) ? $appsSubCategoryBannerImgName : $appsSubCategory['apps_sub_category_banner_img'],
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => session()->get('users_email')
            ]);

            if (!empty($appsSubCategoryBannerImgName)) {
                if (isset($appsSubCategory['apps_sub_category_banner_img'])) {
                    unlink('assets/uploads/banners/' . $appsSubCategory['apps_sub_category_banner_img']);
                }
                $appsSubCategoryBannerImg->move('assets/uploads/banners/', $appsSubCategoryBannerImgName);
            }

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

    public function Active($apps_sub_category_pid = null)
    {
        try {
            $apps_sub_category = $this->appsSubCategoryModel
                ->AppsSubCategoryWithAppsDetail($apps_sub_category_pid);
            $this->appsSubCategoryModel->update($apps_sub_category_pid, [
                'is_active'   => !$apps_sub_category->is_active,
                'updated_at'  => date('Y-m-d H:i:s'),
                'updated_by'  => session()->get('users_email')
            ]);
            $apps_sub_category_name = $apps_sub_category->apps_sub_category_title  . ' - ' . $apps_sub_category->apps_name . ' ' . $apps_sub_category->apps_subname;
            $message = $apps_sub_category->is_active ? $apps_sub_category_name . ' successfully disabled' : $apps_sub_category_name . ' successfully enabled';
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
