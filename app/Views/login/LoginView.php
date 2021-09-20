<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Msglow Portal Apps">
    <meta name="keywords" content="msglow portal, msglow app">
    <meta name="author" content="msglow">

    <title>Msglow Portal</title>

    <?= $this->include('Layout/CssView'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/authentication.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/form-validation.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="<?= base_url(); ?>">
                            <h2 class=" text-black">
                                <strong>MSGLOW</strong>PORTAL
                            </h2>
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/pages/login-v2.svg" alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Welcome to Msglow Portal! 👋</h2>
                                <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
                                <form id="frmLogin" class="auth-login-form mt-2" action="<?= base_url('Login/Auth'); ?>" method="POST">
                                    <div class="mb-1">
                                        <label class="form-label" for="users_email">Email</label>
                                        <input class="form-control" id="users_email" type="text" name="users_email" placeholder="john@example.com" aria-describedby="users_email" autofocus="" tabindex="1" required />
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="users_password">Password</label>
                                            <a href="auth-forgot-password-cover.html" hidden>
                                                <small>Forgot Password?</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="users_password" type="password" name="users_password" placeholder="············" aria-describedby="users_password" tabindex="2" required /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check hidden">
                                            <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3" />
                                            <label class="form-check-label" for="remember-me"> Remember Me</label>
                                        </div>
                                    </div>
                                    <button id="btnSubmit" type="submit" class="btn btn-primary w-100" tabindex="4">
                                        <span id="btnSubmitLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" hidden></span>
                                        Sign in
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <script src="<?= base_url('assets/js/vendors.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.validate.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/app-menu.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/app.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(function() {
            'use strict';
            var pageLoginForm = $('.auth-login-form');
            if (pageLoginForm.length) {
                pageLoginForm.validate({
                    rules: {
                        'users_email': {
                            required: true,
                            email: true
                        },
                        'users_password': {
                            required: true
                        }
                    },
                });
            }
        });

        $('#frmLogin').on('submit', function(e) {
            if ($('.auth-login-form').valid()) {
                $('#btnSubmit').prop('disabled', true)
                $('#btnSubmitLoading').prop('hidden', false)
            }
        });

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "slideDown",
            "hideMethod": "slideUp"
        }

        <?php
        $session = session();
        $flashData = $session->getFlashdata('login_notification');
        if ($flashData) {
            echo "toastr.error('" . $flashData . "', 'Notifications')";
        }
        ?>
    </script>

</body>
<!-- END: Body-->

</html>