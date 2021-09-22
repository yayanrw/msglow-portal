<?php

namespace App\Models;

use CodeIgniter\Model;

class AppsModel extends Model
{
    protected $table      = 'm_apps';
    protected $primaryKey = 'apps_pid';
    protected $allowedFields = ['apps_name', 'apps_subname', 'apps_desc', 'apps_owner', 'apps_url', 'apps_date_release', 'apps_icon', 'apps_banner_img', 'apps_key_session', 'is_active', 'created_at', 'created_by', 'updated_at', 'updated_by'];

    public function AppsWithSubCategory()
    {
        return $this->join('t_apps_sub_category', 't_apps_sub_category.apps_pid = m_apps.apps_pid')->get();
    }
}
