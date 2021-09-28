<?= $this->extend('layout/user/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->include('user/home/home_css_view'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- Knowledge base Jumbotron -->
<section id="knowledge-base-search">
    <div class="row">
        <div class="col-12">
            <div class="card knowledge-base-bg text-center" style="background-image: url('../assets/img/banner/banner_home.jpg')">
                <div class="card-body">
                    <h2 class="text-black">Welcome back, <?= session()->get('users_name'); ?></h2>
                    <p class="card-text mb-2 text-black">
                        <span>What are you looking for today?</span>
                    </p>
                    <form class="kb-search-input">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i data-feather="search"></i></span>
                            <input type="text" class="form-control" id="searchbar" placeholder="Ask a question..." />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Knowledge base Jumbotron -->

<!-- Knowledge base -->
<section id="knowledge-base-content" class="pt-3">
    <div class="row">
        <?php
        foreach ($apps as $a) { ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 d-inline-flex d-flex align-items-center pb-3 pointer" onclick="window.location='<?= base_url('user/apps/detail/' . $a['apps_pid']); ?>'">
                <div class="card text-center bg-primary w-20 m-0">
                    <div class="card-body p-1">
                        <img src="<?= base_url('assets/uploads/icons/' . $a['apps_icon']) ?>" alt="<?= $a['apps_name']; ?>" width="32" height="32">
                    </div>
                </div>
                <div class="ps-1">
                    <h5 class="fw-bolder mb-0 text-black text-wrap"><?= $a['apps_name']; ?></h5>
                    <p class="card-text"><?= $a['apps_subname']; ?></p>
                </div>
            </div>
        <?php } ?>

    </div>
</section>
<!-- Knowledge base ends -->

<!-- Documentations -->
<section id="knowledge-base-documentation">
    <h4 class="fw-bolder text-black pb-1 pt-2">Documentations</h4>
    <div class="row">
        <?php foreach ($documents as $key) { ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-black fw-bolder"><?= $key['document_title']; ?></h5>
                        <ul style="list-style-type: none;" class="p-0">
                            <?php foreach ($documents as $key2) {
                                if ($key2['document_title'] == $key['document_title']) {
                                    $link = $key2['document_type'] == 'sop' ? 'sop-documents' : 'apps-documentation';
                            ?>
                                    <li class="list-padding"><a href="<?= base_url('user/' . $link . '/detail/' . $key['pid']); ?>" class="card-link"><?= $key['category_title']; ?></a></li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</section>
<!-- End Documentations -->
<?= $this->endSection(); ?>