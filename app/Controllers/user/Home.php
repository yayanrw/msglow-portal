<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('User/Home/HomeView');
    }
}
