<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\AppsModel;

class HomeController extends BaseController
{
    protected $appsModel;

    public function __construct()
    {
        $this->appsModel = new AppsModel();
    }

    public function Index()
    {
        $data = [
            'title'   => 'Home',
            'apps'  => $this->appsModel->AppsWithUsers(session()->get('users_pid')),
            'documents' => db_connect()
                ->query("select * from v_documents order by rand()")
                ->getResultArray()
        ];
        return view('user/home/home_view', $data);
    }
}
