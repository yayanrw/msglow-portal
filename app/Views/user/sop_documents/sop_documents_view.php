<?= $this->extend('layout/user/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section id="knowledge-base-search">
    <div class="row">
        <div class="col-12">
            <div class="card knowledge-base-bg" style="background-image: url('<?= base_url('assets/img/banner/banner_sop.jpg'); ?>')">
                <div class="card-body">
                    <h1 class="text-black" style="font-size: 56px;"><?= $title; ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="knowledge-base-content">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills">
                <?php
                foreach ($sop_category as $key) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" id="<?= strtolower(str_replace(' ', '-', $key['sop_category_title'])); ?>-tab" data-bs-toggle="pill" href="#<?= strtolower(str_replace(' ', '-', $key['sop_category_title'])); ?>" aria-expanded="true"><?= $key['sop_category_title']; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="tab-content">
        <?php
        foreach ($sop_category as $key) { ?>
            <div role="tabpanel" class="tab-pane active" id="<?= strtolower(str_replace(' ', '-', $key['sop_category_title'])); ?>" aria-labelledby="<?= strtolower(str_replace(' ', '-', $key['sop_category_title'])); ?>-tab" aria-expanded="true">
                <?php
                foreach ($sop_documents as $key2) {
                    if ($key2['sop_category_pid'] == $key['sop_category_pid']) { ?>
                        <div class="row pt-2">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="card-title text-black"><?= $key2['sop_documents_title']; ?></h4>
                                            <p class="card-text">
                                                <?= $key2['sop_documents_desc']; ?>
                                            </p>
                                            <a href="<?= base_url('user/sop-documents/detail/' . $key2['sop_documents_pid']); ?>" class="btn btn-outline-primary waves-effect">Open Document</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                    }
                }
                    ?>
                        </div>
                    <?php } ?>
            </div>
    </div>

    <!-- <div class="row">
        <div class="d-flex justify-content-center">
            <ul class="pagination mt-2">
                <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">4</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item next-item"><a class="page-link" href="#"></a></li>
            </ul>
        </div>
    </div> -->
</section>
<?= $this->endSection(); ?>