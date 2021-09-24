<?php

namespace App\Models;

use CodeIgniter\Model;

class SopDocumentsModel extends Model
{
    protected $table      = 't_sop_documents';
    protected $primaryKey = 'sop_documents_pid';
    protected $allowedFields = ['sop_category_pid', 'sop_documents_title', 'sop_documents_file', 'sop_documents_banner_img', 'is_active', 'created_by', 'updated_at', 'updated_by'];

    public function SopDocumentsWithSopCategory()
    {
        return $this->select('t_sop_documents.*, m_sop_category.sop_category_title')
            ->join('m_sop_category', 'm_sop_category.sop_category_pid = t_sop_documents.sop_category_pid')
            ->get()
            ->getResult();
    }

    public function SopDocumentsWithSopCategoryDetail($sop_documents_pid = null)
    {
        return $this->select('t_sop_documents.*, m_sop_category.sop_category_title')
            ->join('m_sop_category', 'm_sop_category.sop_category_pid = t_sop_documents.sop_category_pid')
            ->where('t_sop_documents.sop_documents_pid', $sop_documents_pid)
            ->get()
            ->getRow();
    }
}
