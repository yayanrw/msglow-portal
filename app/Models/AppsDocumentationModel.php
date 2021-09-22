<?php

namespace App\Models;

use CodeIgniter\Model;

class AppsDocumentationModel extends Model
{
    protected $table      = 't_apps_document';
    protected $primaryKey = 'apps_document_pid';
    protected $allowedFields = ['apps_sub_category_pid', 'apps_document_title', 'apps_document_file', 'apps_document_banner_img', 'created_at', 'created_by', 'updated_at', 'updated_by'];

    public function AppsDocumentationWithAppsSubCategory()
    {
        return $this->join('t_apps_sub_category', 't_apps_sub_category.apps_sub_category_pid = t_apps_document.apps_sub_category_pid')
            ->join('m_apps', 'm_apps.apps_pid = t_apps_sub_category.apps_pid')->get();
    }
}
