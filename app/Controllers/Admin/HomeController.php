<?php

namespace App\Controllers\admin;

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
            'latest_apps'  => $this->appsModel
                ->orderBy('apps_date_release desc')
                ->limit(5)
                ->get()
                ->getResult('array')
        ];
        return view('admin/home/home_view', $data);
    }
}
