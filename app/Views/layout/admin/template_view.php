<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

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
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <ul class="nav navbar-nav align-items-center ms-auto">
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


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <h2 class="brand-text pt-2 text-black">
                        <strong>MSGLOW</strong>PORTAL
                    </h2>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content mt-2">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="<?= $title == 'Home' ? 'active' : null; ?> nav-item" onclick="sideBarClick('home')">
                    <a class="d-flex align-items-center" href="<?= base_url('admin'); ?>">
                        <i id="icon-home" data-feather='home'></i>
                        <div id="spinner-home" class="spinner-grow spinner-grow-sm me-1" role="status" hidden>
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span class="menu-title text-truncate" data-i18n="Email">Home</span>
                    </a>
                </li>
                <li class="<?= $title == 'Apps Management' ? 'active' : null; ?> nav-item" onclick="sideBarClick('apps-management')">
                    <a class="d-flex align-items-center" href="<?= base_url('admin/apps-management'); ?>">
                        <i id="icon-apps-management" data-feather='layers'></i>
                        <div id="spinner-apps-management" class="spinner-grow spinner-grow-sm me-1" role="status" hidden>
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span class="menu-title text-truncate" data-i18n="Email">Apps Management</span>
                    </a>
                </li>
                <li class="<?= $title == 'Apps Documentation' ? 'active' : null; ?> nav-item" onclick="sideBarClick('apps-documentation')">
                    <a class="d-flex align-items-center" href="<?= base_url('admin/apps-documentation'); ?>">
                        <i id="icon-apps-documentation" data-feather='codepen'></i>
                        <div id="spinner-apps-documentation" class="spinner-grow spinner-grow-sm me-1" role="status" hidden>
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span class="menu-title text-truncate" data-i18n="Chat">Apps Documentation</span>
                    </a>
                </li>
                <li class="<?= $title == 'SOP Documents' ? 'active' : null; ?> nav-item" onclick="sideBarClick('sop-documents')">
                    <a class="d-flex align-items-center" href="<?= base_url('admin/sop-documents'); ?>">
                        <i id="icon-sop-documents" data-feather='book-open'></i>
                        <div id="spinner-sop-documents" class="spinner-grow spinner-grow-sm me-1" role="status" hidden>
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span class="menu-title text-truncate" data-i18n="Chat">SOP Documents</span>
                    </a>
                </li>
                <li class="<?= $title == 'Manage Users' ? 'active' : null; ?> nav-item" onclick="sideBarClick('users')">
                    <a class="d-flex align-items-center" href="<?= base_url('admin/users'); ?>">
                        <i id="icon-users" data-feather='user'></i>
                        <div id="spinner-users" class="spinner-grow spinner-grow-sm me-1" role="status" hidden>
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span class="menu-title text-truncate" data-i18n="Chat">Users</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="float-start mb-0 text-black"><?= $title == 'Home' ? 'Welcome, Admin!' : $title; ?><?= isset($subtitle) ? ' • ' . $subtitle : null; ?></h2>
                            <?= $this->renderSection('content_button'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <!-- Content -->
                <?= $this->renderSection('content'); ?>
                <!-- End content -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light text-end" style="background-color: #f2f2f2;">
        <p class="clearfix mb-0 fst-italic">Copyright by MSGLOW IT Team 2021. All Right Reserved.</p>
    </footer>
    <!-- END: Footer-->

    <?= $this->include('layout/js_view'); ?>
    <?= $this->renderSection('custom_js'); ?>
    <script>
        sideBarClick = menu => {
            $('#icon-' + menu).hide()
            $('#spinner-' + menu).prop('hidden', false)
        }
    </script>

</body>
<!-- END: Body-->

</html>