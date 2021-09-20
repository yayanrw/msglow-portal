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
            'apps'  => $this->appsModel
                ->where('is_active', true)
                ->get()
                ->getResult('array')
        ];
        return view('User/Home/HomeView', $data);
    }
}
