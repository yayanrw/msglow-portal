<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\AppsModel;

class Apps extends BaseController
{
    protected $appsModel;

    public function __construct()
    {
        $this->appsModel = new AppsModel();
    }

    public function Index()
    {
        return "Index";
    }

    public function Detail($apps_pid)
    {
        $apps = $this->appsModel->find($apps_pid);

        $data = [
            'title'     => $apps['apps_name'] ?? "No Data",
            'apps'      => $apps
        ];
        return view('User/Apps/AppsDetailView', $data);
    }
}
