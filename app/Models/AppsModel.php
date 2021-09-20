<?php

namespace App\Models;

use CodeIgniter\Model;

class AppsModel extends Model
{
    protected $table      = 'm_apps';
    protected $primaryKey = 'apps_pid';
    protected $allowedFields = ['apps_name', 'apps_subname', 'apps_desc', 'apps_owner', 'apps_url', 'apps_date_release', 'apps_icon', 'apps_banner_img', 'apps_key_session', 'is_active', 'updated_at', 'updated_by'];
}
