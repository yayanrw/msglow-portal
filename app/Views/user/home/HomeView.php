<?= $this->extend('Layout/User/TemplateView'); ?>

<?= $this->section('CustomCss'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->include('User/Home/HomeCssView'); ?>
<?= $this->endSection(); ?>

<?= $this->section('Content'); ?>

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
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 d-inline-flex d-flex align-items-center pb-3 pointer" onclick="window.location='<?= base_url('User/Apps/Detail/1'); ?>'">
                <div class="card text-center bg-primary w-20 m-0">
                    <div class="card-body p-1">
                        <img src="<?= base_url('assets/img/icons/' . $a['apps_icon']) ?>" alt="<?= $a['apps_name']; ?>" width="32" height="32">
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
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-black fw-bolder">Category #1</h5>
                    <ul style="list-style-type: none;" class="p-0">
                        <li class="list-padding"><a href="<?= base_url('User/Documentations/detail/1'); ?>" class="card-link">Sub Category #1</a></li>
                        <li class="list-padding"><a href="<?= base_url('User/Documentations/detail/1'); ?>" class="card-link">Sub Category #2</a></li>
                        <li class="list-padding"><a href="<?= base_url('User/Documentations/detail/1'); ?>" class="card-link">Sub Category #3</a></li>
                        <li class="list-padding"><a href="<?= base_url('User/Documentations/detail/1'); ?>" class="card-link">Sub Category #4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-black fw-bolder">Category #2</h5>
                    <ul style="list-style-type: none;" class="p-0">
                        <li class="list-padding"><a href="<?= base_url('User/Documentations/detail/1'); ?>" class="card-link">Sub Category #1</a></li>
                        <li class="list-padding"><a href="<?= base_url('User/Documentations/detail/1'); ?>" class="card-link">Sub Category #2</a></li>
                        <li class="list-padding"><a href="<?= base_url('User/Documentations/detail/1'); ?>" class="card-link">Sub Category #3</a></li>
                        <li class="list-padding"><a href="<?= base_url('User/Documentations/detail/1'); ?>" class="card-link">Sub Category #4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-black fw-bolder">Category #3</h5>
                    <ul style="list-style-type: none;" class="p-0">
                        <li class="list-padding"><a href="<?= base_url('User/Documentations/detail/1'); ?>" class="card-link">Sub Category #1</a></li>
                        <li class="list-padding"><a href="<?= base_url('User/Documentations/detail/1'); ?>" class="card-link">Sub Category #2</a></li>
                        <li class="list-padding"><a href="<?= base_url('User/Documentations/detail/1'); ?>" class="card-link">Sub Category #3</a></li>
                        <li class="list-padding"><a href="<?= base_url('User/Documentations/detail/1'); ?>" class="card-link">Sub Category #4</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Documentations -->
<?= $this->endSection(); ?>