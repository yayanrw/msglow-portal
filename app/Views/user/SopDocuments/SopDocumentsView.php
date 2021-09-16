<?= $this->extend('Layout/User/TemplateView'); ?>

<?= $this->section('CustomCss'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('Content'); ?>
<section id="knowledge-base-search">
    <div class="row">
        <div class="col-12">
            <div class="card knowledge-base-bg" style="background-image: url('<?= base_url('assets/img/banner/banner_sop.jpg'); ?>')">
                <div class="card-body">
                    <h1 class="text-black" style="font-size: 56px;">SOP Documents</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="knowledge-base-content">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="pill" href="#home" aria-expanded="true">Category #1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="pill" href="#profile" aria-expanded="false">Category #2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="about-tab" data-bs-toggle="pill" href="#about" aria-expanded="false">Category #3</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row pt-2">
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
                        <a href="./document.html" class="btn btn-outline-primary waves-effect">Open
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
                        <a href="./document.html" class="btn btn-outline-primary waves-effect">Open
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
                        <a href="./document.html" class="btn btn-outline-primary waves-effect">Open
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
                        <a href="./document.html" class="btn btn-outline-primary waves-effect">Open
                            Document</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
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
    </div>
</section>
<?= $this->endSection(); ?>