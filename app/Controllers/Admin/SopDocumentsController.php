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
        return view('admin/sop_documents/sop_documents_view', $data);
    }
}
