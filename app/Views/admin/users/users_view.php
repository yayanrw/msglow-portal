<?= $this->extend('layout/admin/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

<style>
    .dataTables_length {
        color: #000;
        padding-left: 20px;
    }

    .dataTables_filter {
        color: #000;
        padding-right: 20px;
    }

    div.dataTables_wrapper .dataTables_info {
        color: #000;
        padding-left: 20px;
        padding-top: 20apx;
        padding-bottom: 20px;
    }

    .dataTables_paginate {
        padding-right: 20px;
        padding-top: 20px;
        padding-bottom: 20px;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('custom_js'); ?>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#datatable").DataTable({})
    })
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-primary fw-bolder">List of Users</h4>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-white bg-primary">No</th>
                            <th class="text-white bg-primary">Email</th>
                            <th class="text-white bg-primary">Access to Apps</th>
                            <th class="text-white bg-primary">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($users as $key) { ?>
                            <tr>
                                <td class="bg-white"><?= $no++; ?></td>
                                <td class="bg-white"><?= $key['users_email'] ?></td>
                                <td class="bg-white">

                                    <?php
                                    $apps_name = explode(',', $key['apps_name']);
                                    $apps_subname = explode(',', $key['apps_subname']);

                                    for ($a = 0; $a < count($apps_name); $a++) { ?>
                                        <span class="badge badge-light-primary"><?= $apps_name[$a] . ' ' . $apps_subname[$a]; ?></span>
                                    <?php } ?>

                                </td>
                                <td class="bg-white">
                                    <a href="<?= base_url('admin/users/edit/' . $key['users_pid']); ?>" class="btn btn-icon btn-warning waves-effect waves-float waves-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                        <i data-feather='edit-3'></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>