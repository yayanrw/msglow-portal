<?= $this->extend('Layout/Admin/TemplateView'); ?>

<?= $this->section('CustomCss'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('ContentButton'); ?>
<div class="dt-action-buttons text-end">
    <div class="dt-buttons d-inline-flex">
        <a class="dt-button create-new btn btn-primary" href="<?= base_url('admin/apps/input'); ?>">
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

<?= $this->section('Content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card bg-primary">
            <div class="card-header">
                <h4 class="card-title text-white fw-bolder">List of all apps</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-black" style="background-color: #F0EFFA;">No</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Name</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Date Release</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Link to Site</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Actions</th>
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
                                    <a class="btn btn-icon btn-warning waves-effect waves-float waves-light" href="#">
                                        <i data-feather='edit-3'></i>
                                    </a>
                                    <?php if ($a['is_active']) { ?>
                                        <a href="<?= base_url('admin/apps/active/' . $a['apps_pid']); ?>" class="btn btn-icon btn-danger waves-effect waves-float waves-light">
                                            <i data-feather='lock'></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('admin/apps/active/' . $a['apps_pid']); ?>" class="btn btn-icon btn-success waves-effect waves-float waves-light">
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