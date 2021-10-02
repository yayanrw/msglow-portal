<?= $this->extend('layout/user/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->include('user/home/home_css_view'); ?>
<style>
    .hvr-float-shadow {
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        position: relative;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-property: transform;
        transition-property: transform;
    }

    .hvr-float-shadow:before {
        pointer-events: none;
        position: absolute;
        z-index: -1;
        content: '';
        top: 100%;
        left: 5%;
        height: 10px;
        width: 90%;
        opacity: 0;
        background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0.35) 0%, rgba(0, 0, 0, 0) 80%);
        background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.35) 0%, rgba(0, 0, 0, 0) 80%);
        /* W3C */
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-property: transform, opacity;
        transition-property: transform, opacity;
    }

    .hvr-float-shadow:hover,
    .hvr-float-shadow:focus,
    .hvr-float-shadow:active {
        -webkit-transform: translateY(-5px);
        transform: translateY(-5px);
        /* move the element up by 5px */
    }

    .hvr-float-shadow:hover:before,
    .hvr-float-shadow:focus:before,
    .hvr-float-shadow:active:before {
        opacity: 1;
        -webkit-transform: translateY(5px);
        transform: translateY(5px);
        /* move the element down by 5px (it will stay in place because it's attached to the element that also moves up 5px) */
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('custom_js'); ?>
<script>
    $(function() {
        "use strict";
        var e = $("#searchbar"),
            t = $(".kb-search-content-info .kb-search-content"),
            n = $(".kb-search-content-info .no-result"),
            a = $(".kb-search-content-info-apps .kb-search-content-apps"),
            p = $(".kb-search-content-info-apps .no-result-apps"),
            z = $(".kb-search-content-info-apps2 .kb-search-content-apps2"),
            x = $(".kb-search-content-info-apps2 .no-result-apps2");
        e.on("keyup", function() {
            var e = $(this).val().toLowerCase();
            "" != e
                ?
                (t.filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(e) > -1);
                    }),
                    0 == $(".kb-search-content-info .kb-search-content:visible").length ?
                    n.removeClass("no-items") :
                    n.hasClass("no-items") || n.addClass("no-items")) :
                t.show();

            "" != e
                ?
                (a.filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(e) > -1);
                    }),
                    0 == $(".kb-search-content-info-apps .kb-search-content-apps:visible").length ?
                    $('#apps-not-found').toggle(true) :
                    $('#apps-not-found').toggle(false)) :
                a.show();
            "" != e
                ?
                (z.filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(e) > -1);
                    }),
                    0 == $(".kb-search-content-info-apps2 .kb-search-content-apps2:visible").length ?
                    $('#apps2-not-found').toggle(true) :
                    $('#apps2-not-found').toggle(false)) :
                z.show();
        });
    });
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- Knowledge base Jumbotron -->
<section id="knowledge-base-search">
    <div class="row">
        <div class="col-12">
            <div class="card knowledge-base-bg text-center" style="background-image: url('<?= base_url('assets/img/banner/banner_home.jpg'); ?>')">
                <div class="card-body" style="padding: 8rem">
                    <h2 class="text-black">Welcome back, <?= session()->get('users_name'); ?></h2>
                    <p class="card-text mb-2 text-black">
                        <span>What are you looking for today?</span>
                    </p>
                    <form class="kb-search-input">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i data-feather="search"></i></span>
                            <input type="text" class="form-control" id="searchbar" placeholder="Search apps or documents..." />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Knowledge base Jumbotron -->

<!-- Knowledge base -->
<section id="knowledge-base-content" class="pt-3" <?= count($apps_accessible) < 1 ? 'hidden' : null; ?>>
    <h4 class="fw-bolder text-black pb-1 pt-2">Accessible Apps</h4>
    <div class="row kb-search-content-info-apps">
        <?php
        foreach ($apps_with_no_login_system as $a) { ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 kb-search-content-apps hvr-float-shadow mb-3">
                <div class="d-inline-flex d-flex align-items-center pointer" onclick="window.location='<?= base_url('user/apps/detail/' . $a['apps_pid']); ?>'">
                    <div class="card text-center w-20 m-0" style="background-color: <?= $a['apps_bg_color']; ?>;">
                        <div class="card-body p-1">
                            <img src="<?= base_url('assets/uploads/icons/' . $a['apps_icon']) ?>" alt="<?= $a['apps_name']; ?>" width="32" height="32">
                        </div>
                    </div>
                    <div class="ps-1">
                        <h5 class="fw-bolder mb-0 text-black text-wrap"><?= $a['apps_name']; ?></h5>
                        <p class="card-text"><?= $a['apps_subname']; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php
        foreach ($apps_accessible as $a) { ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 kb-search-content-apps hvr-float-shadow mb-3">
                <div class="d-inline-flex d-flex align-items-center pointer" onclick="window.location='<?= base_url('user/apps/detail/' . $a['apps_pid']); ?>'">
                    <div class="card text-center w-20 m-0" style="background-color: <?= $a['apps_bg_color']; ?>;">
                        <div class="card-body p-1">
                            <img src="<?= base_url('assets/uploads/icons/' . $a['apps_icon']) ?>" alt="<?= $a['apps_name']; ?>" width="32" height="32">
                        </div>
                    </div>
                    <div class="ps-1">
                        <h5 class="fw-bolder mb-0 text-black text-wrap"><?= $a['apps_name']; ?></h5>
                        <p class="card-text"><?= $a['apps_subname']; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-12 text-center no-result-apps no-items-apps">
            <h4 id="apps-not-found" class="mt-4" style="display: none;">Accessible apps not found!!</h4>
        </div>
    </div>
</section>

<section id="knowledge-base-content">
    <h4 class="fw-bolder text-black pb-1 pt-2">Non-accessible Apps</h4>
    <div class="row kb-search-content-info-apps2">
        <?php
        foreach ($apps_nonaccessible as $a) { ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 kb-search-content-apps2 hvr-float-shadow mb-3">
                <div class="d-inline-flex d-flex align-items-center pointer" onclick="window.location='<?= base_url('user/apps/detail/' . $a['apps_pid']); ?>'">
                    <div class="card text-center w-20 m-0" style="background-color: <?= $a['apps_bg_color']; ?>;">
                        <div class="card-body p-1">
                            <img src="<?= base_url('assets/uploads/icons/' . $a['apps_icon']) ?>" alt="<?= $a['apps_name']; ?>" width="32" height="32">
                        </div>
                    </div>
                    <div class="ps-1">
                        <h5 class="fw-bolder mb-0 text-black text-wrap"><?= $a['apps_name']; ?></h5>
                        <p class="card-text"><?= $a['apps_subname']; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-12 text-center no-result-apps2 no-items-apps2">
            <h4 id="apps2-not-found" class="mt-4" style="display: none;">Non-accessible apps not found!!</h4>
        </div>
    </div>
</section>



<!-- Knowledge base ends -->

<!-- Documentations -->
<section id="knowledge-base-documentation">
    <h4 class="fw-bolder text-black pb-1 pt-2">Documentations</h4>
    <div class="row kb-search-content-info match-height">
        <?php foreach ($documents as $key) { ?>
            <div class="col-lg-4 kb-search-content">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-black fw-bolder"><?= $key['category_title']; ?></h5>
                        <ul style="list-style-type: none;" class="p-0">
                            <?php foreach ($documents as $key2) {
                                if ($key2['category_title'] == $key['category_title']) {
                                    $link = $key2['document_type'] == 'sop' ? 'sop-documents' : 'apps-documentation';
                            ?>
                                    <li class="list-padding"><a href="<?= base_url('user/' . $link . '/detail/' . $key['pid']); ?>" class="card-link"><?= $key['document_title']; ?></a></li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="col-12 text-center no-result no-items">
            <h4 class="mt-4">Documentations not found!!</h4>
        </div>
    </div>
</section>
<!-- End Documentations -->
<?= $this->endSection(); ?>