<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class DocumentationsController extends BaseController
{
    public function index()
    {
        return "Documentations";
    }

    public function detail($pid = null)
    {
        return view('user/documentations/documentations_view');
    }
}
