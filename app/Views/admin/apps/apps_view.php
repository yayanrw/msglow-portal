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

<?= $this->section('content_button'); ?>
<div class="dt-action-buttons text-end">
    <div class="dt-buttons d-inline-flex">
        <a class="dt-button create-new btn btn-primary" href="<?= base_url('admin/apps-management/input'); ?>">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Input New Apps
            </span>
        </a>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('custom_js'); ?>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#datatable").DataTable({})
    })

    btnActive = (apps_pid) => {
        $.ajax({
            url: '<?= base_url('admin/apps-management/active'); ?>/' + apps_pid,
            method: "GET",
            dataType: 'json',
            success: function(data, status, xhr) {
                if (data.status) {
                    toastr.success(data.message, 'Notifications')
                    $('#datatable').DataTable().ajax.reload();
                } else {
                    toastr.error(data.message, 'Notifications')
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            }
        })
    }
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-primary fw-bolder">List of all apps</h4>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-white bg-primary">No</th>
                            <th class="text-white bg-primary">Name</th>
                            <th class="text-white bg-primary">Date Release</th>
                            <th class="text-white bg-primary">Link to Site</th>
                            <th class="text-white bg-primary">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($apps as $a) { ?>
                            <tr>
                                <td class="bg-white"><?= $no++; ?></td>
                                <td class="bg-white"><?= $a['apps_name']; ?> • <?= $a['apps_subname']; ?></td>
                                <td class="bg-white"><?= $a['apps_date_release']; ?></td>
                                <td class="bg-white"><a href="<?= $a['apps_url']; ?>" target="_blank"><?= $a['apps_url']; ?></a></td>
                                <td class="bg-white">
                                    <a href="<?= base_url('admin/apps-management/edit/' . $a['apps_pid']); ?>" class="btn btn-icon btn-warning waves-effect waves-float waves-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                        <i data-feather='edit-3'></i>
                                    </a>
                                    <?php if ($a['is_active']) { ?>
                                        <a href="<?= base_url('admin/apps-management/active/' . $a['apps_pid']); ?>" class="btn btn-icon btn-danger waves-effect waves-float waves-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Disable app">
                                            <i data-feather='lock'></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('admin/apps-management/active/' . $a['apps_pid']); ?>" class="btn btn-icon btn-success waves-effect waves-float waves-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Enable app">
                                            <i data-feather='upload-cloud'></i>
                                        </a>
                                    <?php } ?>
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