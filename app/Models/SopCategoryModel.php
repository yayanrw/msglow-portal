<?php

namespace App\Models;

use CodeIgniter\Model;

class SopCategoryModel extends Model
{
    protected $table      = 'm_sop_category';
    protected $primaryKey = 'sop_category_pid';
    protected $allowedFields = ['sop_category_title', 'sop_category_banner_img', 'is_active', 'created_by', 'updated_at', 'updated_by'];
}
