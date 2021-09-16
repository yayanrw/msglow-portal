<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Apps extends BaseController
{
    public function index()
    {
        return "Index";
    }

    public function detail($pid = null)
    {
        return view('User/Apps/AppsDetailView');
    }
}
