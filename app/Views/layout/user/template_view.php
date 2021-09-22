<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Msglow Portal Apps">
    <meta name="keywords" content="msglow portal, msglow app">
    <meta name="author" content="msglow">
    <title>Msglow Portal <?= isset($title) ? ' • ' . $title : null; ?></title>

    <?= $this->include('layout/css_view'); ?>
    <?= $this->renderSection('custom_css'); ?>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center navbar-shadow navbar-light ps-3 pe-3 fixed-top" style="left: 0;">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <a href="<?= base_url(); ?>" style="color: #000; font-size: 20px;">
                    <strong>MSGLOW</strong>PORTAL
                </a>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item">
                    <a class="text-black" href="<?= base_url('user/sop-documents'); ?>">SOP Documents</a>
                </li>
                <li class="nav-item dropdown dropdown-user ps-3"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar">
                            <img class="round" src="<?= base_url('assets/img/avatar/1.png'); ?>" alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                        <span class="ps-1 text-black"><?= session()->get('users_name'); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="<?= base_url('logout'); ?>">
                            <i class="me-50" data-feather="power"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Content-->
    <div class="app-content content bg-white m-0 mt-2 pt-5 pb-3">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl ps-2 pe-2">
            <div class="content-body">

                <!-- Content -->
                <?= $this->renderSection('content'); ?>
                <!-- End content -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-light text-center pt-2 pb-2 m-0" style="background-color: #f2f2f2;">
        <p class="clearfix mb-0 fst-italic">Copyright by MSGLOW IT Team 2021. All Right Reserved.</p>
    </footer>
    <!-- END: Footer-->

    <?= $this->include('layout/js_view'); ?>
    <?= $this->renderSection('custom_js'); ?>

</body>
<!-- END: Body-->

</html>