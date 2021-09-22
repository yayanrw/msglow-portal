<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AppsModel;

class AppsController extends BaseController
{
    protected $appsModel;

    public function __construct()
    {
        $this->appsModel = new AppsModel();
    }

    public function Index()
    {
        $data = [
            'title'   => 'Apps Management',
            'apps'  => $this->appsModel->findAll()
        ];
        return view('admin/apps/apps_view', $data);
    }

    public function Input()
    {
        $data = [
            'title'   => 'Apps Management • Input New Apps',
        ];
        return view('admin/apps/apps_input_view', $data);
    }

    public function Edit($apps_pid = null)
    {
        $apps = $this->appsModel->find($apps_pid);

        $data = [
            'title'   => 'Apps Management • Edit Apps',
            'apps'    => $apps
        ];
        return view('admin/apps/apps_edit_view', $data);
    }

    public function Insert()
    {
        $this->appsModel->insert([
            'apps_name'         => $this->request->getVar('apps_name'),
            'apps_subname'      => $this->request->getVar('apps_subname'),
            'apps_desc'         => $this->request->getVar('apps_desc'),
            'apps_owner'        => $this->request->getVar('apps_owner'),
            'apps_url'          => $this->request->getVar('apps_url'),
            'apps_date_release' => $this->request->getVar('apps_date_release'),
            'apps_icon'         => $this->request->getVar('apps_icon'),
            'apps_banner_img'   => $this->request->getVar('apps_banner_img'),
            'apps_key_session'  => $this->request->getVar('apps_key_session'),
            'created_by'        => session()->get('users_email')
        ]);
        session()->setFlashdata('apps_notification', 'Saved successfully');
        return redirect()->to('admin/apps-management');
    }

    public function Update()
    {
        $this->appsModel->update($this->request->getVar('apps_pid'), [
            'apps_name'         => $this->request->getVar('apps_name'),
            'apps_subname'      => $this->request->getVar('apps_subname'),
            'apps_desc'         => $this->request->getVar('apps_desc'),
            'apps_owner'        => $this->request->getVar('apps_owner'),
            'apps_url'          => $this->request->getVar('apps_url'),
            'apps_date_release' => $this->request->getVar('apps_date_release'),
            'apps_icon'         => $this->request->getVar('apps_icon'),
            'apps_banner_img'   => $this->request->getVar('apps_banner_img'),
            'apps_key_session'  => $this->request->getVar('apps_key_session'),
            'updated_at'        => date("Y-m-d H:i:s"),
            'updated_by'        => session()->get('users_email')
        ]);
        session()->setFlashdata('apps_notification', 'Updated successfully');
        return redirect()->to('admin/apps-management');
    }

    public function Active($apps_pid = null)
    {
        $apps = $this->appsModel->find($apps_pid);

        $this->appsModel->update($apps_pid, [
            'is_active'   => !$apps['is_active']
        ]);

        $apps_name = $apps['apps_name'] . ' - ' . $apps['apps_subname'];
        $message = $apps['is_active'] ? $apps_name . ' successfully deactivated' : 'Aplikasi ' . $apps_name . ' successfully activated';

        return redirect()->back()->with('apps_notification', $message);
    }

    public function ActiveAjax($apps_pid = null)
    {
        try {
            $apps = $this->appsModel->find($apps_pid);

            $this->appsModel->update($apps_pid, [
                'is_active'   => !$apps['is_active']
            ]);

            $apps_name = $apps['apps_name'] . ' - ' . $apps['apps_subname'];
            $message = $apps['is_active'] ? $apps_name . ' successfully deactivated' : 'Aplikasi ' . $apps_name . ' successfully activated';


            $data = [
                'status' => true,
                'message' => $message,
            ];
            return $this->response->setJSON($data);
        } catch (\Throwable $th) {
            $data = [
                'status' => false,
                'message' => $th,
            ];
            return $this->response->setJSON($data);
        }
    }
}
