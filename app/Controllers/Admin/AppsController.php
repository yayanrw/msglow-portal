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
            // 'apps'  => $this->appsModel->findAll()
        ];
        return view('Admin/Apps/AppsInputView', $data);
    }
}