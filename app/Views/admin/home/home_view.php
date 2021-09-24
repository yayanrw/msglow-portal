<?= $this->extend('layout/admin/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-6 col-sm-12">
        <div class="card bg-primary">
            <div class="card-header">
                <h4 class="card-title text-white fw-bolder">Latest Apps</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-black" style="background-color: #F0EFFA;">No</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Name</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Date Released</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($latest_apps as $a) { ?>
                            <tr>
                                <td class="bg-white"><?= $no++; ?></td>
                                <td class="bg-white"><?= $a['apps_name']; ?> • <?= $a['apps_subname']; ?></td>
                                <td class="bg-white"><?= $a['apps_date_release']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="card bg-primary">
            <div class="card-header">
                <h4 class="card-title text-white fw-bolder">Latest Categories</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-black" style="background-color: #F0EFFA;">No</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Name</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Category</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Date Released</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($latest_categories as $key) { ?>
                            <tr>
                                <td class="bg-white"><?= $no++; ?></td>
                                <td class="bg-white"><?= $key['apps_sub_category_title']; ?></td>
                                <td class="bg-white"><?= $key['apps_name']; ?> - <?= $key['apps_subname']; ?></td>
                                <td class="bg-white"><?= date('Y-m-d', strtotime($key['created_at'])) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 col-sm-12">
        <div class="card bg-primary">
            <div class="card-header">
                <h4 class="card-title text-white fw-bolder">Latest Documents</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-black" style="background-color: #F0EFFA;">No</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Name</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Category</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Sub-Category</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($latest_documents as $key) { ?>
                            <tr>
                                <td class="bg-white"><?= $no++; ?></td>
                                <td class="bg-white"><?= $key['apps_document_title']; ?></td>
                                <td class="bg-white"><?= $key['apps_name']; ?> - <?= $key['apps_subname']; ?></td>
                                <td class="bg-white"><?= $key['apps_sub_category_title']; ?></td>
                                <td class="bg-white"><?= date('Y-m-d', strtotime($key['created_at'])) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>