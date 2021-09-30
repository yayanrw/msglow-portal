<?= $this->extend('layout/user/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section id="knowledge-base-search">
    <div class="row">
        <div class="col-12">
            <div class="card knowledge-base-bg" style="background-image: url('<?= base_url('assets/uploads/banners/' . $apps['apps_banner_img']); ?>')">
                <div class="card-body">
                    <div class="row">
                        <div class="text-end col-lg-3">
                            <h1 class="text-black" style="font-size: 56px;"><?= $apps['apps_name']; ?></h1>
                            <p class="d-inline card-text mb-2 text-black">
                                <span><?= $apps['apps_subname']; ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="knowledge-base-content">
    <div class="row">
        <div class="col-lg-8">
            <h3 class="text-black fw-bolder">Short description intro</h3>
            <p class="text-black"><?= $apps['apps_desc']; ?></p>
        </div>
        <div class="col-lg-3 offset-lg-1">
            <div class="row">
                <h6 class="text-black p-0 mb-1">Go to:</h6>
                <?php $is_auth = !isset($access_mapping); ?>
                <a href="<?= $apps['apps_url']; ?>" target="_blank" class="btn btn-primary btn-lg pt-2 pb-2 mb-1 <?= $is_auth ? 'disabled' : null; ?>" style="font-size: 14px;width: auto;"><?= $apps['apps_name']; ?> - <?= $apps['apps_subname']; ?> </a>
                <span class="text-danger font-small-2 text-text-start p-0 <?= !$is_auth ? 'hidden' : null; ?>">*You aren't authorized to access this apps</span>
            </div>
        </div>
    </div>

    <div class="row pt-3">
        <h2 class="text-black pb-1 text-center text-center">Documentations</h2>

        <?php
        foreach ($apps_documentation as $key) { ?>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h4 class="card-title text-black"><?= $key['apps_document_title']; ?></h4>
                            <p class="card-text">
                                <?= $key['apps_document_desc']; ?>
                            </p>
                            <a href="<?= base_url('user/apps-documentation/detail/' . $key['apps_document_pid']); ?>" class="btn btn-outline-primary waves-effect">Open Document</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</section>
<?= $this->endSection(); ?>