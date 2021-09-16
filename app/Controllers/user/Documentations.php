<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class Documentations extends BaseController
{
    public function index()
    {
        return "Documentations";
    }

    public function detail($pid = null)
    {
        return view('User/Documentations/DocumentationsView');
    }
}
