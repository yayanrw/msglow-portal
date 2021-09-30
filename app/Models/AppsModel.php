<?php

namespace App\Models;

use CodeIgniter\Model;

class AppsModel extends Model
{
    protected $table      = 'm_apps';
    protected $primaryKey = 'apps_pid';
    protected $allowedFields = ['apps_name', 'apps_subname', 'apps_desc', 'apps_owner', 'apps_url', 'apps_date_release', 'apps_icon', 'apps_banner_img', 'apps_bg_color', 'apps_key_session', 'is_active', 'created_at', 'created_by', 'updated_at', 'updated_by'];

    public function AppsWithAppsSubCategory()
    {
        return $this->join('t_apps_sub_category', 't_apps_sub_category.apps_pid = m_apps.apps_pid')->get();
    }

    public function AppsWithUsers($user_pid = null)
    {
        return db_connect()->query('SELECT m_apps.*, m_users.*
            FROM `m_apps`
            LEFT JOIN `t_access_mapping` ON `t_access_mapping`.`apps_pid` = `m_apps`.`apps_pid`
            LEFT JOIN `m_users` ON `m_users`.`users_email` = `t_access_mapping`.`users_email`
            and `m_users`.`users_pid` = "' . $user_pid . '" where is_active = true')
            ->getResultArray();
    }
}
