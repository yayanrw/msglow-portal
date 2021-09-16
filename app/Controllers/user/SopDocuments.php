<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class SopDocuments extends BaseController
{
    public function index()
    {
        return view('User/SopDocuments/SopDocumentsView');
    }
}
