<?php

namespace App\Models;

use CodeIgniter\Model;

class AppsSubCategoryModel extends Model
{
    protected $table      = 't_apps_sub_category';
    protected $primaryKey = 'apps_sub_category_pid';
    protected $allowedFields = ['apps_pid', 'apps_sub_category_title', 'apps_sub_category_banner_img', 'is_active', 'created_by', 'updated_at', 'updated_by'];

    public function AppsSubCategoryWithAppsTop5Latest()
    {
        return $this->select('t_apps_sub_category.*, m_apps.apps_name, m_apps.apps_subname')
            ->join('m_apps', 'm_apps.apps_pid = t_apps_sub_category.apps_pid')
            ->get()
            ->getResultArray();
    }

    public function AppsSubCategoryWithAppsDetail($apps_sub_category_pid = null)
    {
        return $this->select('t_apps_sub_category.*, m_apps.apps_name, m_apps.apps_subname')
            ->join('m_apps', 'm_apps.apps_pid = t_apps_sub_category.apps_pid')
            ->where('t_apps_sub_category.apps_sub_category_pid', $apps_sub_category_pid)
            ->get()
            ->getRow();
    }
}
