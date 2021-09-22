<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class UsersController extends BaseController
{

    public function __construct()
    {
    }

    public function Index()
    {
        $data = [
            'title'   => 'Users',
        ];
        return view('admin/users/users_view', $data);
    }
}
