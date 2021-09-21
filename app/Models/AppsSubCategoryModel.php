<?php

namespace App\Models;

use CodeIgniter\Model;

class AppsSubCategoryModel extends Model
{
    protected $table      = 't_apps_sub_category';
    protected $primaryKey = 'apps_sub_category_pid';
    protected $allowedFields = ['apps_pid', 'apps_sub_category_title', 'apps_sub_category_banner_img', 'created_at', 'created_by', 'updated_at', 'updated_by'];
}
