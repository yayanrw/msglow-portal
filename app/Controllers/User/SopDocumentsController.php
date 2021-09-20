<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class SopDocumentsController extends BaseController
{
    public function index()
    {
        return view('User/SopDocuments/SopDocumentsView');
    }
}
