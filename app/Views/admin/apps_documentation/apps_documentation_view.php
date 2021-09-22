<?= $this->extend('layout/admin/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<style>
    .dataTables_length {
        color: #fff;
        padding-left: 20px;
    }

    .dataTables_filter {
        color: #fff;
        padding-right: 20px;
    }

    div.dataTables_wrapper .dataTables_info {
        color: #fff;
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
        $("#datatable-documentation-list").DataTable({})
        $("#datatable-category-list").DataTable({})
    })
</script>
<?= $this->endSection(); ?>

<?= $this->section('content_button'); ?>
<div class="dt-action-buttons text-end">
    <div class="dt-buttons d-inline-flex">
        <a class="dt-button create-new btn btn-primary me-1" href="<?= base_url('admin/apps-documentation/input'); ?>">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Input New Documentation
            </span>
        </a>
        <a class="dt-button create-new btn btn-primary" href="<?= base_url('admin/apps-sub-category/input'); ?>">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Create New Sub-Category
            </span>
        </a>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card bg-primary">
            <div class="card-header">
                <h4 class="card-title text-white fw-bolder">Documentation List</h4>
            </div>
            <div class="table-responsive">
                <table id="datatable-documentation-list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-black" style="background-color: #F0EFFA;">No</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Title</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Category</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Sub-Category</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($apps_documentation as $key) { ?>
                            <td class="bg-white"><?= $no++; ?></td>
                            <td class="bg-white"><?= $key['apps_document_title']; ?></td>
                            <td class="bg-white"><?= $key['apps_name']; ?> <?= $key['apps_subname']; ?></td>
                            <td class="bg-white"><?= $key['apps_sub_category_title']; ?></td>
                            <td class="bg-white">
                                <a href="<?= base_url('admin/apps-documentation/edit/' . $key['apps_document_pid']); ?>" class="btn btn-icon btn-warning waves-effect waves-float waves-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                    <i data-feather='edit-3'></i>
                                </a>
                                <?php if ($key['is_active']) { ?>
                                    <a href="<?= base_url('admin/apps-documentation/active/' . $key['apps_document_pid']); ?>" class="btn btn-icon btn-danger waves-effect waves-float waves-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Disable document">
                                        <i data-feather='lock'></i>
                                    </a>
                                <?php } else { ?>
                                    <a href="<?= base_url('admin/apps-documentation/active/' . $key['apps_document_pid']); ?>" class="btn btn-icon btn-success waves-effect waves-float waves-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Enable document">
                                        <i data-feather='upload-cloud'></i>
                                    </a>
                                <?php } ?>
                            </td>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card bg-primary">
            <div class="card-header">
                <h4 class="card-title text-white fw-bolder">Category List</h4>
            </div>
            <div class="table-responsive">
                <table id="datatable-category-list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-black" style="background-color: #F0EFFA;">No</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Title</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Document Assigned</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Date Created</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>