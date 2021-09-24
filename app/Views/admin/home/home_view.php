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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-black" style="background-color: #F0EFFA;">Name</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Date Publish</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($latest_apps as $a) { ?>
                            <tr>
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-black" style="background-color: #F0EFFA;">Name</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Category</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Date Publish</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-white">Sub-Category #2</td>
                            <td class="bg-white">Category #1</td>
                            <td class="bg-white">20 Agustus 2021</td>
                        </tr>
                        <tr>
                            <td class="bg-white">Sub-Category #1</td>
                            <td class="bg-white">Category #1</td>
                            <td class="bg-white">20 Agustus 2021</td>
                        </tr>
                        <tr>
                            <td class="bg-white">Sub-Category #3</td>
                            <td class="bg-white">Category #1</td>
                            <td class="bg-white">20 Agustus 2021</td>
                        </tr>
                        <tr>
                            <td class="bg-white">Sub-Category #4</td>
                            <td class="bg-white">Category #1</td>
                            <td class="bg-white">20 Agustus 2021</td>
                        </tr>
                        <tr>
                            <td class="bg-white">Sub-Category #5</td>
                            <td class="bg-white">Category #1</td>
                            <td class="bg-white">20 Agustus 2021</td>
                        </tr>
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
                <table class="table table-bordered">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-black" style="background-color: #F0EFFA;">Name</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Category</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Sub-Category</th>
                            <th class="text-black" style="background-color: #F0EFFA;">Date Publish</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-white">Sub-Category #2</td>
                            <td class="bg-white">Category #1</td>
                            <td class="bg-white">Sub-Category #3</td>
                            <td class="bg-white">20 Agustus 2021</td>
                        </tr>
                        <tr>
                            <td class="bg-white">Sub-Category #1</td>
                            <td class="bg-white">Category #1</td>
                            <td class="bg-white">Sub-Category #3</td>
                            <td class="bg-white">20 Agustus 2021</td>
                        </tr>
                        <tr>
                            <td class="bg-white">Sub-Category #3</td>
                            <td class="bg-white">Category #1</td>
                            <td class="bg-white">Sub-Category #3</td>
                            <td class="bg-white">20 Agustus 2021</td>
                        </tr>
                        <tr>
                            <td class="bg-white">Sub-Category #4</td>
                            <td class="bg-white">Category #1</td>
                            <td class="bg-white">Sub-Category #3</td>
                            <td class="bg-white">20 Agustus 2021</td>
                        </tr>
                        <tr>
                            <td class="bg-white">Sub-Category #5</td>
                            <td class="bg-white">Category #1</td>
                            <td class="bg-white">Sub-Category #3</td>
                            <td class="bg-white">20 Agustus 2021</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>