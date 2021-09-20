<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title'   => 'Home'
        ];
        return view('User/Home/HomeView', $data);
    }
}
