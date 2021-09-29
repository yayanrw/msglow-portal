<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AppsModel;
use App\Models\LogErrorModel;

class AppsController extends BaseController
{
    protected $router;
    protected $logErrorModel;
    protected $validation;
    protected $appsModel;

    public function __construct()
    {
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->appsModel = new AppsModel();
        $this->validation =  \Config\Services::validation();
    }

    public function Index()
    {
        try {
            $data = [
                'title'   => 'Apps Management',
                'apps'  => $this->appsModel->findAll()
            ];
            return view('admin/apps/apps_view', $data);
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
                'title'   => 'Apps Management',
                'subtitle'   => 'Input New Apps',
                'validation' => $this->validation,
            ];
            return view('admin/apps/apps_input_view', $data);
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

    public function Edit($apps_pid = null)
    {
        try {
            $apps = $this->appsModel->find($apps_pid);
            $data = [
                'title'   => 'Apps Management',
                'subtitle'   => 'Edit Apps',
                'validation' => $this->validation,
                'apps'    => $apps
            ];
            return view('admin/apps/apps_edit_view', $data);
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
                'apps_icon' => [
                    'rules' => 'max_size[apps_icon,100]|ext_in[apps_icon,png,svg]|is_image[apps_icon]',
                ],
                'apps_banner_img' => [
                    'rules' => 'max_size[apps_banner_img,200]|mime_in[apps_banner_img,image/png,image/jpg,image/jpeg]|ext_in[apps_banner_img,png,jpg,jpeg]|is_image[apps_banner_img]',
                ]
            ])) {
                return redirect()->back()->withInput();
            }

            $appsIcon = $this->request->getFile('apps_icon');
            $appsBannerImg = $this->request->getFile('apps_banner_img');

            $appsIconName = $appsIcon->getError() == 4 ? null : $appsIcon->getName();
            $appsBannerImgName = $appsBannerImg->getError() == 4 ? null : $appsBannerImg->getName();

            $this->appsModel->insert([
                'apps_name'         => $this->request->getVar('apps_name'),
                'apps_subname'      => $this->request->getVar('apps_subname'),
                'apps_desc'         => $this->request->getVar('apps_desc'),
                'apps_owner'        => $this->request->getVar('apps_owner'),
                'apps_url'          => $this->request->getVar('apps_url'),
                'apps_date_release' => $this->request->getVar('apps_date_release'),
                'apps_icon'         => $appsIconName,
                'apps_banner_img'   => $appsBannerImgName,
                'apps_key_session'  => $this->request->getVar('apps_key_session'),
                'created_by'        => session()->get('users_email')
            ]);

            if (!empty($appsIconName)) {
                if ($appsIcon->isValid() && !$appsIcon->hasMoved()) {
                    $appsIcon->move('assets/uploads/icons/');
                }
            }

            if (!empty($appsBannerImgName)) {
                if ($appsBannerImg->isValid() && !$appsBannerImg->hasMoved()) {
                    $appsBannerImg->move('assets/uploads/banners/');
                }
            }

            session()->setFlashdata('successMsg', $this->savedSuccessMsg);
            return redirect()->to('admin/apps-management');
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

    public function Update()
    {
        try {
            if (!$this->validate([
                'apps_icon' => [
                    'rules' => 'max_size[apps_icon,100]|ext_in[apps_icon,png,svg]|is_image[apps_icon]',
                ],
                'apps_banner_img' => [
                    'rules' => 'max_size[apps_banner_img,200]|mime_in[apps_banner_img,image/png,image/jpg,image/jpeg]|ext_in[apps_banner_img,png,jpg,jpeg]|is_image[apps_banner_img]',
                ]
            ])) {
                return redirect()->back()->withInput();
            }

            $appsIcon = $this->request->getFile('apps_icon');
            $appsBannerImg = $this->request->getFile('apps_banner_img');

            $appsIconName = $appsIcon->getError() == 4 ? null : $appsIcon->getName();
            $appsBannerImgName = $appsBannerImg->getError() == 4 ? null : $appsBannerImg->getName();

            $apps = $this->appsModel->find($this->request->getVar('apps_pid'));

            $this->appsModel->update($this->request->getVar('apps_pid'), [
                'apps_name'         => $this->request->getVar('apps_name'),
                'apps_subname'      => $this->request->getVar('apps_subname'),
                'apps_desc'         => $this->request->getVar('apps_desc'),
                'apps_owner'        => $this->request->getVar('apps_owner'),
                'apps_url'          => $this->request->getVar('apps_url'),
                'apps_date_release' => $this->request->getVar('apps_date_release'),
                'apps_icon'         => !empty($appsIconName) ? $appsIconName : $apps['apps_icon'],
                'apps_banner_img'   => !empty($appsBannerImgName) ? $appsBannerImgName : $apps['apps_banner_img'],
                'apps_key_session'  => $this->request->getVar('apps_key_session'),
                'updated_at'        => date("Y-m-d H:i:s"),
                'updated_by'        => session()->get('users_email')
            ]);

            if (!empty($appsIconName)) {
                if (isset($apps['apps_icon'])) {
                    unlink('assets/uploads/icons/' . $apps['apps_icon']);
                }
                if ($appsIcon->isValid() && !$appsIcon->hasMoved()) {
                    $appsIcon->move('assets/uploads/icons/');
                }
            }

            if (!empty($appsBannerImgName)) {
                if (isset($apps['apps_banner_img'])) {
                    unlink('assets/uploads/banners/' . $apps['apps_banner_img']);
                }
                if ($appsBannerImg->isValid() && !$appsBannerImg->hasMoved()) {
                    $appsBannerImg->move('assets/uploads/banners/');
                }
            }
            session()->setFlashdata('successMsg', $this->updatedSuccessMsg);
            return redirect()->to('admin/apps-management');
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

    public function Active($apps_pid = null)
    {
        try {
            $apps = $this->appsModel->find($apps_pid);
            $this->appsModel->update($apps_pid, [
                'is_active'   => !$apps['is_active'],
                'updated_at'  => date('Y-m-d H:i:s'),
                'updated_by'  => session()->get('users_email')
            ]);
            $apps_name = $apps['apps_name'] . ' - ' . $apps['apps_subname'];
            $message = $apps['is_active'] ? $apps_name . ' successfully disabled' : $apps_name . ' successfully enabled';
            return redirect()->back()->with('successMsg', $message);
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

    // public function ActiveAjax($apps_pid = null)
    // {
    //     try {
    //         $apps = $this->appsModel->find($apps_pid);

    //         $this->appsModel->update($apps_pid, [
    //             'is_active'   => !$apps['is_active']
    //         ]);

    //         $apps_name = $apps['apps_name'] . ' - ' . $apps['apps_subname'];
    //         $message = $apps['is_active'] ? $apps_name . ' successfully deactivated' : 'Aplikasi ' . $apps_name . ' successfully activated';


    //         $data = [
    //             'status' => true,
    //             'message' => $message,
    //         ];
    //         return $this->response->setJSON($data);
    //     } catch (\Throwable $th) {
    //         $data = [
    //             'status' => false,
    //             'message' => $th,
    //         ];
    //         return $this->response->setJSON($data);
    //     }
    // }
}
