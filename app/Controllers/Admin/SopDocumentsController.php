<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class SopDocumentsController extends BaseController
{

    public function __construct()
    {
    }

    public function Index()
    {
        $data = [
            'title'   => 'SOP Documents',
        ];
        return view('Admin/SopDocuments/SopDocumentsView', $data);
    }
}
