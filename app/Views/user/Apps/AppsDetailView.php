<?= $this->extend('Layout/User/TemplateView'); ?>

<?= $this->section('CustomCss'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('Content'); ?>

<section id="knowledge-base-search">
    <div class="row">
        <div class="col-12">
            <div class="card knowledge-base-bg" style="background-image: url('<?= base_url('assets/img/banner/' . $apps['apps_banner_img']); ?>')">
                <div class="card-body">
                    <div class="row">
                        <div class="text-end col-lg-3">
                            <h1 class="text-black" style="font-size: 56px;"><?= $apps['apps_subname']; ?></h1>
                            <p class="d-inline card-text mb-2 text-black">
                                <span><?= $apps['apps_name']; ?></span>
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
                <h6 class="text-black">Go to:</h6>
                <a href="<?= $apps['apps_url']; ?>" target="_blank" class="btn btn-primary btn-lg pt-2 pb-2"><?= $apps['apps_subname']; ?> <?= $apps['apps_name']; ?></a>
            </div>
        </div>
    </div>

    <div class="row pt-3">
        <h2 class="text-black pb-1 text-center text-center">Documentations</h2>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="card-title text-black">Documentation #1</h4>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi laborum
                            corporis dolores animi, veniam inventore. Repellendus fuga voluptatibus
                            magni autem eum blanditiis facilis, nisi ipsam ducimus doloremque corporis,
                            placeat odit similique sapiente! Ipsum enim fuga voluptatibus eligendi velit
                            ratione laboriosam blanditiis reiciendis facilis itaque! Quod consequuntur
                            voluptate maxime error cum.
                        </p>
                        <a href="<?= base_url('User/Documentations/detail/1'); ?>" class="btn btn-outline-primary waves-effect">Open
                            Document</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="card-title text-black">Documentation #1</h4>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi laborum
                            corporis dolores animi, veniam inventore. Repellendus fuga voluptatibus
                            magni autem eum blanditiis facilis, nisi ipsam ducimus doloremque corporis,
                            placeat odit similique sapiente! Ipsum enim fuga voluptatibus eligendi velit
                            ratione laboriosam blanditiis reiciendis facilis itaque! Quod consequuntur
                            voluptate maxime error cum.
                        </p>
                        <a href="<?= base_url('User/Documentations/detail/1'); ?>" class="btn btn-outline-primary waves-effect">Open
                            Document</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="card-title text-black">Documentation #1</h4>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi laborum
                            corporis dolores animi, veniam inventore. Repellendus fuga voluptatibus
                            magni autem eum blanditiis facilis, nisi ipsam ducimus doloremque corporis,
                            placeat odit similique sapiente! Ipsum enim fuga voluptatibus eligendi velit
                            ratione laboriosam blanditiis reiciendis facilis itaque! Quod consequuntur
                            voluptate maxime error cum.
                        </p>
                        <a href="<?= base_url('User/Documentations/detail/1'); ?>" class="btn btn-outline-primary waves-effect">Open
                            Document</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="card-title text-black">Documentation #1</h4>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi laborum
                            corporis dolores animi, veniam inventore. Repellendus fuga voluptatibus
                            magni autem eum blanditiis facilis, nisi ipsam ducimus doloremque corporis,
                            placeat odit similique sapiente! Ipsum enim fuga voluptatibus eligendi velit
                            ratione laboriosam blanditiis reiciendis facilis itaque! Quod consequuntur
                            voluptate maxime error cum.
                        </p>
                        <a href="<?= base_url('User/Documentations/detail/1'); ?>" class="btn btn-outline-primary waves-effect">Open
                            Document</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <p class="text-center fw-bolder text-primary pt-4">
        <a href="#">Show More</a>
    </p>
</section>
<?= $this->endSection(); ?>