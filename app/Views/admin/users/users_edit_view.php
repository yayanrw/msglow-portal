<?= $this->extend('layout/admin/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('custom_js'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-3">
                <form class="form form-horizontal" action="<?= base_url('admin/users/update'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="users_email">User Email</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="users_pid" class="form-control" name="users_pid" placeholder="User Pid" value="<?= $users->users_pid; ?>" hidden required>
                                    <input type="text" id="users_email" class="form-control" name="users_email" placeholder="User Email" value="<?= $users->users_email; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="users_password">New Password</label>
                                </div>
                                <div class="col-sm-9">
                                    <input id="users_password" name="users_password" class="form-control" type="password" placeholder="New Password">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="confirm_users_password">Confirm New Password</label>
                                </div>
                                <div class="col-sm-9">
                                    <input id="confirm_users_password" name="confirm_users_password" class="form-control" type="password" placeholder="Confirm New Password">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_pid">Access to Apps</label>
                                </div>
                                <div class="col-sm-9">
                                    <?php
                                    $bg_color = array('bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-dark');
                                    $apps_name = explode(',', $users->apps_name);
                                    $apps_subname = explode(',', $users->apps_subname);

                                    for ($a = 0; $a < count($apps_name); $a++) { ?>
                                        <span class="badge <?= $bg_color[array_rand($bg_color)] ?>"><?= $apps_name[$a] . ' ' . $apps_subname[$a]; ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-sm-3">
                                <a href="<?= base_url('admin/users'); ?>" class="btn btn-outline-secondary waves-effect">Cancel</a>
                            </div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success me-1 waves-effect waves-float waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>