<?php

namespace App\Models;

use CodeIgniter\Model;

class SopDocumentsModel extends Model
{
    protected $table      = 't_sop_documents';
    protected $primaryKey = 'sop_documents_pid';
    protected $allowedFields = ['sop_category_pid', 'sop_documents_title', 'sop_documents_file', 'sop_documents_banner_img', 'is_active', 'created_by', 'updated_at', 'updated_by'];
}
