<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
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
        $this->router = \Config\Services::router();
        $this->logErrorModel = new LogErrorModel();
        $this->sopDocumentsModel = new SopDocumentsModel();
        $this->sopCategoryModel = new SopCategoryModel();
    }

    public function Index()
    {
        try {
            $data = [
                'title'                 => 'SOP Documents',
                'sop_documents'         => $this->sopDocumentsModel->SopDocumentsWithSopCategory(),
                'sop_category'         => $this->sopCategoryModel->findAll(),
            ];
            return view('user/sop_documents/sop_documents_view', $data);
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

    public function Detail($sop_documents_pid = null)
    {
        try {
            $data = [
                'title'          => 'SOP Documents',
                'sop_documents'  => $this->sopDocumentsModel->SopDocumentsWithSopCategoryDetail($sop_documents_pid),
            ];
            return view('user/sop_documents/sop_documents_detail_view', $data);
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
}
