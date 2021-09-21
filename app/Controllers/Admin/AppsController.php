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

    public function Management()
    {
        $data = [
            'title'   => 'Apps Management',
            'apps'  => $this->appsModel->findAll()
        ];
        return view('Admin/Apps/AppsManagementView', $data);
    }

    public function Documentation()
    {
        $data = [
            'title'   => 'Apps Documentation',
            'apps'  => $this->appsModel->findAll()
        ];
        return view('Admin/Apps/AppsDocumentationView', $data);
    }

    public function Input()
    {
        $data = [
            'title'   => 'Apps Management • Input New Apps',
        ];
        return view('Admin/Apps/AppsInputView', $data);
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
        session()->setFlashdata('apps_notification', 'Save successfully');
        return redirect()->to('admin/apps-management');
    }

    public function Active($apps_pid = null)
    {
        $apps = $this->appsModel->find($apps_pid);

        $this->appsModel->update($apps_pid, [
            'is_active'   => !$apps['is_active']
        ]);

        $status = $apps['is_active'] ? 'Inactive' : 'Active';

        return redirect()->back()->with('apps_notification', $apps['apps_name'] . ' • ' . $apps['apps_subname'] . ' set to ' . $status);
    }
}
