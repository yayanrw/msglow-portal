<?= $this->extend('Layout/User/TemplateView'); ?>

<?= $this->section('CustomCss'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('Content'); ?>

<section id="knowledge-base-search">
    <div class="row">
        <div class="col-12">
            <div class="card knowledge-base-bg" style="background-image: url('<?= base_url('assets/img/banner/banner_sales.jpg'); ?>')">
                <div class="card-body">
                    <div class="row">
                        <div class="text-end col-lg-3">
                            <h1 class="text-black" style="font-size: 56px;">Sales</h1>
                            <p class="d-inline card-text mb-2 text-black">
                                <span>ERP Systems</span>
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
            <p class="text-black">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Praesentium
                aspernatur eum natus
                laudantium voluptatum quaerat modi, consectetur architecto molestias perspiciatis,
                dolorum culpa inventore eos temporibus. Esse rerum doloremque voluptate magnam
                blanditiis, atque voluptatem porro sed accusantium et sapiente! A neque minima
                reiciendis facere, blanditiis fugit exercitationem assumenda nesciunt dolore consequatur
                deserunt quos illum, esse dolor nam ab dicta debitis qui commodi numquam quam
                dignissimos consectetur! Quos, explicabo quibusdam! Modi rerum et tempore at delectus
                nemo, numquam veniam dolores, molestias itaque optio hic quam vitae labore corrupti
                similique aliquam excepturi sit, quae inventore animi architecto magnam atque! Qui vitae
                hic vel minus aliquam quis, repudiandae possimus, autem laborum vero culpa voluptatem
                quam neque quibusdam saepe magni quidem esse ullam sit quisquam ab delectus placeat
                ratione! Accusamus laboriosam at sunt numquam tempora ipsam? Quasi dolore vel
                consectetur tenetur accusantium eligendi esse quaerat incidunt ipsam? In recusandae illo
                natus cumque ut exercitationem aliquid.</p>
        </div>
        <div class="col-lg-3 offset-lg-1">
            <div class="row">
                <h6 class="text-black">Go to:</h6>
                <a href="#" class="btn btn-primary btn-lg pt-2 pb-2">Sales ERP System</a>
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