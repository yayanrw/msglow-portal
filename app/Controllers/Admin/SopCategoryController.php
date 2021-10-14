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
    protected $validation;

    public function __construct()
    {
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->sopCategoryModel = new SopCategoryModel();
        $this->validation =  \Config\Services::validation();
    }

    public function Input()
    {
        try {
            $data = [
                'title' => 'SOP Documents',
                'subtitle' => 'Input New Sub-Category',
                'validation' => $this->validation
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
                'validation' => $this->validation,
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
            if (!$this->validate([
                'sop_category_banner_img' => [
                    'rules' => 'max_size[sop_category_banner_img,200]|mime_in[sop_category_banner_img,image/png,image/jpg,image/jpeg]|ext_in[sop_category_banner_img,png,jpg,jpeg]|is_image[sop_category_banner_img]',
                ]
            ])) {
                return redirect()->back()->withInput();
            }

            $sopCategoryBannerImg = $this->request->getFile('sop_category_banner_img');

            $sopCategoryBannerImgName = $sopCategoryBannerImg->getError() == 4 ? null : $sopCategoryBannerImg->getName();

            $this->sopCategoryModel->insert([
                'sop_category_title' => $this->request->getVar('sop_category_title'),
                'sop_category_banner_img' => $sopCategoryBannerImgName,
                'created_by' => session()->get('users_email')
            ]);

            if (!empty($sopCategoryBannerImgName)) {
                if ($sopCategoryBannerImg->isValid() && !$sopCategoryBannerImg->hasMoved()) {
                    $sopCategoryBannerImg->move('assets/uploads/banners/');
                }
            }

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
            if (!$this->validate([
                'sop_category_banner_img' => [
                    'rules' => 'max_size[sop_category_banner_img,200]|mime_in[sop_category_banner_img,image/png,image/jpg,image/jpeg]|ext_in[sop_category_banner_img,png,jpg,jpeg]|is_image[sop_category_banner_img]',
                ]
            ])) {
                return redirect()->back()->withInput();
            }

            $sopCategoryBannerImg = $this->request->getFile('sop_category_banner_img');

            $sopCategoryBannerImgName = $sopCategoryBannerImg->getError() == 4 ? null : $sopCategoryBannerImg->getName();

            $sopCategory = $this->sopCategoryModel->find($this->request->getVar('sop_category_pid'));

            $this->sopCategoryModel->update($this->request->getVar('sop_category_pid'), [
                'sop_category_title' => $this->request->getVar('sop_category_title'),
                'sop_category_banner_img' => !empty($sopCategoryBannerImgName) ? $sopCategoryBannerImgName : $sopCategory['sop_category_banner_img'],
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => session()->get('users_email')
            ]);

            if (!empty($sopCategoryBannerImgName)) {
                if (isset($sopCategory['sop_category_banner_img'])) {
                    unlink('assets/uploads/banners/' . $sopCategory['sop_category_banner_img']);
                }

                if ($sopCategoryBannerImg->isValid() && !$sopCategoryBannerImg->hasMoved()) {
                    $sopCategoryBannerImg->move('assets/uploads/banners/');
                }
            }

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
                'is_active'   => $sop_category['is_active'] == "1" ? 0 : 1,
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
