<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\AppsModel;

class HomeController extends BaseController
{
    protected $appsModel;

    public function __construct()
    {
        $this->appsModel = new AppsModel();
    }

    public function Index()
    {
        $data = [
            'title'   => 'Home',
            'apps'  => $this->appsModel->findAll()
        ];
        return view('User/Home/HomeView', $data);
    }
}
