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
    protected $validation;

    public function __construct()
    {
        $this->appsSubCategoryModel = new AppsSubCategoryModel();
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->validation =  \Config\Services::validation();
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
                'validation' => $this->validation,
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
                'validation' => $this->validation,
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
            if (!$this->validate([
                'sop_documents_file' => [
                    'rules' => 'max_size[sop_documents_file,5000]|mime_in[sop_documents_file,application/pdf]|ext_in[sop_documents_file,pdf]',
                ],
                'sop_documents_banner_img' => [
                    'rules' => 'max_size[sop_documents_banner_img,200]|mime_in[sop_documents_banner_img,image/png,image/jpg,image/jpeg]|ext_in[sop_documents_banner_img,png,jpg,jpeg]|is_image[sop_documents_banner_img]',
                ]
            ])) {
                return redirect()->back()->withInput();
            }

            $sopDocumentsFile = $this->request->getFile('sop_documents_file');
            $sopDocumentsBannerImg = $this->request->getFile('sop_documents_banner_img');

            $sopDocumentsFileName = $sopDocumentsFile->getError() == 4 ? null : $sopDocumentsFile->getName();
            $sopDocumentsBannerImgName = $sopDocumentsBannerImg->getError() == 4 ? null : $sopDocumentsBannerImg->getName();

            $this->sopDocumentsModel->insert([
                'sop_category_pid' =>  $this->request->getVar('sop_category_pid'),
                'sop_documents_title' =>  $this->request->getVar('sop_documents_title'),
                'sop_documents_desc' =>  $this->request->getVar('sop_documents_desc'),
                'sop_documents_file' =>  $sopDocumentsFileName,
                'sop_documents_banner_img' =>  $sopDocumentsBannerImgName,
                'created_by' =>  session()->get('users_email')
            ]);

            if (!empty($sopDocumentsFileName)) {
                $sopDocumentsFile->move('assets/uploads/documents/', $sopDocumentsFileName);
            }

            if (!empty($sopDocumentsBannerImgName)) {
                $sopDocumentsBannerImg->move('assets/uploads/banners/', $sopDocumentsBannerImgName);
            }

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
            if (!$this->validate([
                'sop_documents_file' => [
                    'rules' => 'max_size[sop_documents_file,5000]|mime_in[sop_documents_file,application/pdf]|ext_in[sop_documents_file,pdf]',
                ],
                'sop_documents_banner_img' => [
                    'rules' => 'max_size[sop_documents_banner_img,200]|mime_in[sop_documents_banner_img,image/png,image/jpg,image/jpeg]|ext_in[sop_documents_banner_img,png,jpg,jpeg]|is_image[sop_documents_banner_img]',
                ]
            ])) {
                return redirect()->back()->withInput();
            }

            $sopDocumentsFile = $this->request->getFile('sop_documents_file');
            $sopDocumentsBannerImg = $this->request->getFile('sop_documents_banner_img');

            $sopDocumentsFileName = $sopDocumentsFile->getError() == 4 ? null : $sopDocumentsFile->getName();
            $sopDocumentsBannerImgName = $sopDocumentsBannerImg->getError() == 4 ? null : $sopDocumentsBannerImg->getName();

            $sopDocuments = $this->sopDocumentsModel->find($this->request->getVar('sop_documents_pid'));

            $this->sopDocumentsModel->update($this->request->getVar('sop_documents_pid'), [
                'sop_category_pid' => $this->request->getVar('sop_category_pid'),
                'sop_documents_title' => $this->request->getVar('sop_documents_title'),
                'sop_documents_desc' => $this->request->getVar('sop_documents_desc'),
                'sop_documents_file' => !empty($sopDocumentsFileName) ? $sopDocumentsFileName : $sopDocuments['sop_documents_file'],
                'sop_documents_banner_img' => !empty($sopDocumentsBannerImgName) ? $sopDocumentsBannerImgName : $sopDocuments['sop_documents_banner_img'],
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => session()->get('users_email')
            ]);

            if (!empty($sopDocumentsFileName)) {
                if (isset($sopDocuments['sop_documents_file'])) {
                    unlink('assets/uploads/documents/' . $sopDocuments['sop_documents_file']);
                }
                $sopDocumentsFile->move('assets/uploads/documents/', $sopDocumentsFileName);
            }

            if (!empty($sopDocumentsBannerImgName)) {
                if (isset($sopDocuments['sop_documents_banner_img'])) {
                    unlink('assets/uploads/banners/' . $sopDocuments['sop_documents_banner_img']);
                }
                $sopDocumentsBannerImg->move('assets/uploads/banners/', $sopDocumentsBannerImgName);
            }
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
