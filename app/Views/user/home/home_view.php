<?= $this->extend('layout/user/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->include('user/home/home_css_view'); ?>
<?= $this->endSection(); ?>

<?= $this->section('custom_js'); ?>
<script>
    $(function() {
        "use strict";
        var e = $("#searchbar"),
            t = $(".kb-search-content-info .kb-search-content"),
            n = $(".kb-search-content-info .no-result"),
            a = $(".kb-search-content-info-apps .kb-search-content-apps"),
            p = $(".kb-search-content-info-apps .no-result-apps");
        e.on("keyup", function() {
            var e = $(this).val().toLowerCase();
            "" != e
                ?
                (t.filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(e) > -1);
                        // console.log($(".kb-search-content-info .kb-search-content:visible").length);
                    }),
                    0 == $(".kb-search-content-info .kb-search-content:visible").length ?
                    n.removeClass("no-items") :
                    n.hasClass("no-items") || n.addClass("no-items")) :
                t.show();

            "" != e
                ?
                (a.filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(e) > -1);
                        // console.log($(".kb-search-content-info-apps .kb-search-content-apps:visible").length);
                    }),

                    0 == $(".kb-search-content-info-apps .kb-search-content-apps:visible").length ?
                    p.removeClass("no-items-apps") :
                    p.hasClass("no-items-apps") || p.addClass("no-items-apps")) :
                a.show();
        });
    });
</script>
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
    <div class="row kb-search-content-info-apps">
        <?php
        foreach ($apps as $a) { ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 d-inline-flex d-flex align-items-center pb-3 pointer kb-search-content-apps" onclick="window.location='<?= base_url('user/apps/detail/' . $a['apps_pid']); ?>'">
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
        <?php } ?>
        <div class="col-12 text-center no-result-apps no-items-apps">
            <h4 class="mt-4">Search result not found!!</h4>
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
            <h4 class="mt-4">Search result not found!!</h4>
        </div>
    </div>
</section>
<!-- End Documentations -->
<?= $this->endSection(); ?>