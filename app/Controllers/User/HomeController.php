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
            'apps_accessible'  => $this->appsModel->AppsWithUsers(session()->get('users_pid')),
            'apps_with_no_login_system'  => $this->appsModel->AppsWithNoLoginSystem(),
            'apps_nonaccessible'  => $this->appsModel->AppsNotWithUsers(session()->get('users_pid')),
            'documents' => db_connect()
                ->query("select * from v_documents order by rand() where ")
                ->getResultArray()
        ];
        return view('user/home/home_view', $data);
    }
}
