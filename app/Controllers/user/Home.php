<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\AppsModel;

class Home extends BaseController
{
    protected $appsModel;

    public function __construct()
    {
        $this->appsModel = new AppsModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Home',
            'apps'  => $this->appsModel->findAll()
        ];
        return view('User/Home/HomeView', $data);
    }
}
