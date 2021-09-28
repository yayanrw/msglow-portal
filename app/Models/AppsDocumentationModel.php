<?php

namespace App\Models;

use CodeIgniter\Model;

class AppsDocumentationModel extends Model
{
    protected $table      = 't_apps_document';
    protected $primaryKey = 'apps_document_pid';
    protected $allowedFields = ['apps_sub_category_pid', 'apps_document_title', 'apps_document_desc', 'apps_document_file', 'apps_document_banner_img', 'is_active', 'created_by', 'updated_at', 'updated_by'];

    public function AppsDocumentationWithAppsSubCategory()
    {
        return $this->select('t_apps_document.*, m_apps.apps_name, m_apps.apps_subname, t_apps_sub_category.apps_sub_category_title')
            ->join('t_apps_sub_category', 't_apps_sub_category.apps_sub_category_pid = t_apps_document.apps_sub_category_pid')
            ->join('m_apps', 'm_apps.apps_pid = t_apps_sub_category.apps_pid')
            ->get()
            ->getResult('array');
    }

    public function AppsDocumentationWithAppsSubCategoryByApps($apps_pid = null)
    {
        return $this->select('t_apps_document.*, m_apps.apps_name, m_apps.apps_subname, t_apps_sub_category.apps_sub_category_title')
            ->join('t_apps_sub_category', 't_apps_sub_category.apps_sub_category_pid = t_apps_document.apps_sub_category_pid')
            ->join('m_apps', 'm_apps.apps_pid = t_apps_sub_category.apps_pid')
            ->where('m_apps.apps_pid', $apps_pid)
            ->get()
            ->getResultArray();
    }

    public function AppsDocumentationWithAppsSubCategoryTop5Latest()
    {
        return $this->select('t_apps_document.*, m_apps.apps_name, m_apps.apps_subname, t_apps_sub_category.apps_sub_category_title')
            ->join('t_apps_sub_category', 't_apps_sub_category.apps_sub_category_pid = t_apps_document.apps_sub_category_pid')
            ->join('m_apps', 'm_apps.apps_pid = t_apps_sub_category.apps_pid')
            ->orderBy('t_apps_document.created_at desc')
            ->get()
            ->getResult('array');
    }

    public function AppsDocumentationWithAppsSubCategoryDetail($apps_document_pid = null)
    {
        return $this->select('t_apps_document.*, m_apps.apps_name, m_apps.apps_subname, t_apps_sub_category.apps_sub_category_title')
            ->join('t_apps_sub_category', 't_apps_sub_category.apps_sub_category_pid = t_apps_document.apps_sub_category_pid')
            ->join('m_apps', 'm_apps.apps_pid = t_apps_sub_category.apps_pid')
            ->where('t_apps_document.apps_document_pid', $apps_document_pid)
            ->get()
            ->getRow();
    }

    public function AppsDocumentationWithAppsSubCategoryGrouped()
    {
        return $this->select('t_apps_document.*, m_apps.apps_name, m_apps.apps_subname, t_apps_sub_category.apps_sub_category_title, count(t_apps_document.apps_document_pid) count_documents_assigned, t_apps_sub_category.apps_sub_category_pid, t_apps_sub_category.is_active apps_sub_category_is_active')
            ->join('t_apps_sub_category', 't_apps_sub_category.apps_sub_category_pid = t_apps_document.apps_sub_category_pid', 'right')
            ->join('m_apps', 'm_apps.apps_pid = t_apps_sub_category.apps_pid')
            ->groupBy('t_apps_sub_category.apps_sub_category_pid')
            ->get()
            ->getResult('array');
    }
}
