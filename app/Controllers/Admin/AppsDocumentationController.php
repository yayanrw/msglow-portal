<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AppsSubCategoryModel;

class AppsDocumentationController extends BaseController
{
    protected $appsSubCategoryModel;

    public function __construct()
    {
        $this->appsSubCategoryModel = new AppsSubCategoryModel();
    }

    public function Index()
    {
        $data = [
            'title'   => 'Apps Documentation',
            'apps_sub_category'  => $this->appsSubCategoryModel->findAll()
        ];
        return view('admin/apps_documentation/apps_documentation_view', $data);
    }
}
