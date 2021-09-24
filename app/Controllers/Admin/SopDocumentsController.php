<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AppsSubCategoryModel;
use App\Models\LogErrorModel;
use App\Models\SopCategoryModel;
use App\Models\SopDocumentsModel;

class SopDocumentsController extends BaseController
{
    protected $router;
    protected $logErrorModel;
    protected $sopDocumentsModel;
    protected $sopCategoryModel;

    public function __construct()
    {
        $this->appsSubCategoryModel = new AppsSubCategoryModel();
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->sopDocumentsModel = new SopDocumentsModel();
        $this->sopCategoryModel = new SopCategoryModel();
    }

    public function Index()
    {   
        try {
            $data = [
                'title'   => 'SOP Documents',
                'sop_documents' => $this->sopDocumentsModel->SopDocumentsWithSopCategory(),
                'sop_category'  => $this->sopDocumentsModel->SopDocumentsWithSopCategoryGrouped()
            ];
            return view('admin/sop_documents/sop_documents_view', $data);
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            return view('errors/html/production');
        }
    }

    public function Input()
    {
        try {
            $data = [
                'title' => 'SOP Documents',
                'subtitle' => 'Input New Document',
                'sop_category' => $this->sopCategoryModel->findAll()
            ];
            return view('admin/sop_documents/sop_documents_input_view', $data);
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            return view('errors/html/production');
        }
    }

    public function Edit($sop_documents_pid = null)
    {
        try {
            $data = [
                'title' => 'SOP Documents',
                'subtitle' => 'Edit Document',
                'sop_documents' => $this->sopDocumentsModel->find($sop_documents_pid),
                'sop_category' => $this->sopCategoryModel->findAll()
            ];
            return view('admin/sop_documents/sop_documents_edit_view', $data);
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            return view('errors/html/production');
        }
    }

    public function Insert()
    {
        try {
            $this->sopDocumentsModel->insert([
                'sop_category_pid' =>  $this->request->getVar('sop_category_pid'),
                'sop_documents_title' =>  $this->request->getVar('sop_documents_title'),
                'sop_documents_file' =>  $this->request->getVar('sop_documents_file'),
                'sop_documents_banner_img' =>  $this->request->getVar('sop_documents_banner_img'),
                'created_by' =>  session()->get('users_email')
            ]);
            session()->setFlashdata('successMsg', $this->savedSuccessMsg);
            return redirect()->to('admin/sop-documents');
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            session()->setFlashdata('errorMsg', $this->errorProcessingMsg);
            return redirect()->to('admin/sop-documents');
        }
    }

    public function Update()
    {
        try {
            $this->sopDocumentsModel->update($this->request->getVar('sop_documents_pid'), [
                'sop_category_pid' => $this->request->getVar('sop_category_pid'),
                'sop_documents_file' => $this->request->getVar('sop_documents_file'),
                'sop_documents_banner_img' => $this->request->getVar('sop_documents_banner_img'),
                'sop_documents_title' => $this->request->getVar('sop_documents_title'),
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => session()->get('users_email')
            ]);
            session()->setFlashdata('successMsg', $this->updatedSuccessMsg);
            return redirect()->to('admin/sop-documents');
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            session()->setFlashdata('errorMsg', $this->errorProcessingMsg);
            return redirect()->to('admin/sop-documents');
        }
    }

    public function Active($sop_documents_pid = null)
    {
        try {
            $sop_documents = $this->sopDocumentsModel
                ->SopDocumentsWithSopCategoryDetail($sop_documents_pid);
            $this->sopDocumentsModel->update($sop_documents_pid, [
                'is_active'   => !$sop_documents->is_active,
                'updated_at'  => date('Y-m-d H:i:s'),
                'updated_by'  => session()->get('users_email')
            ]);
            $sop_documents_name = $sop_documents->sop_documents_title  . ' - ' . $sop_documents->sop_category_title;
            $message = $sop_documents->is_active ? $sop_documents_name . ' successfully disabled' : $sop_documents_name . ' successfully enabled';
            return redirect()->back()->with('successMsg', $message);
        } catch (\Throwable $th) {
            $this->logErrorModel->InsertLog(
                $this->router->controllerName(),
                $this->router->methodName(),
                $th,
                session()->get('users_email')
            );
            session()->setFlashdata('errorMsg', $this->errorProcessingMsg);
            return redirect()->to('admin/sop-documents');
        }
    }
}
