<?= $this->extend('Layout/User/TemplateView'); ?>

<?= $this->section('CustomCss'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('Content'); ?>
<section id="knowledge-base-search">
    <div class="row">
        <div class="col-12">
            <div class="card knowledge-base-bg" style="background-image: url('<?= base_url('assets/img/banner/banner.png'); ?>')">
                <div class="card-body">
                    <h1 class="text-black" style="font-size: 56px;">Document Title #1</h1>
                    <a href="#" class="btn btn-light me-1">Category #1</a>
                    <a href="#" class="btn btn-light">Sub-Category #1</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="knowledge-base-content">
    <div class="row">
        <div class="col-8">
            <h4 class="pt-3 text-black fw-bolder pb-1">Heading 1</h4>
            <p class="text-black">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis ut, esse praesentium
                neque inventore hic corporis voluptate totam fugit aliquid necessitatibus reprehenderit
                laudantium magni nemo dicta et quos quae debitis quis obcaecati repellendus mollitia
                tempore
                quam. Praesentium a distinctio illum culpa quidem voluptatem temporibus dolor
                reiciendis,
                suscipit quis. Nesciunt amet veritatis provident placeat. Maxime ut quidem optio saepe
                corrupti inventore nulla numquam. Illo ipsam animi fuga eveniet, recusandae veritatis
                saepe
                soluta sed molestiae, sequi rem officiis quaerat in provident tempore possimus ab natus
                necessitatibus, ex laborum? Sunt ipsa doloribus quae, maxime quasi, consequuntur eius
                nostrum impedit a aliquid mollitia dolor?
            </p>
            <p class="text-black">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis ut, esse praesentium
                neque inventore hic corporis voluptate totam fugit aliquid necessitatibus reprehenderit
                laudantium magni nemo dicta et quos quae debitis quis obcaecati repellendus mollitia
                tempore
                quam. Praesentium a distinctio illum culpa quidem voluptatem temporibus dolor
                reiciendis,
                suscipit quis. Nesciunt amet veritatis provident placeat. Maxime ut quidem optio saepe
                corrupti inventore nulla numquam. Illo ipsam animi fuga eveniet, recusandae veritatis
                saepe
                soluta sed molestiae, sequi rem officiis quaerat in provident tempore possimus ab natus
                necessitatibus, ex laborum? Sunt ipsa doloribus quae, maxime quasi, consequuntur eius
                nostrum impedit a aliquid mollitia dolor?
            </p>

            <h4 class="pt-3 text-black fw-bolder pb-1">Heading 2</h4>
            <p class="text-black">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis ut, esse praesentium
                neque inventore hic corporis voluptate totam fugit aliquid necessitatibus reprehenderit
                laudantium magni nemo dicta et quos quae debitis quis obcaecati repellendus mollitia
                tempore
                quam. Praesentium a distinctio illum culpa quidem voluptatem temporibus dolor
                reiciendis,
                suscipit quis. Nesciunt amet veritatis provident placeat. Maxime ut quidem optio saepe
                corrupti inventore nulla numquam. Illo ipsam animi fuga eveniet, recusandae veritatis
                saepe
                soluta sed molestiae, sequi rem officiis quaerat in provident tempore possimus ab natus
                necessitatibus, ex laborum? Sunt ipsa doloribus quae, maxime quasi, consequuntur eius
                nostrum impedit a aliquid mollitia dolor?
            </p>
            <p class="text-black">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis ut, esse praesentium
                neque inventore hic corporis voluptate totam fugit aliquid necessitatibus reprehenderit
                laudantium magni nemo dicta et quos quae debitis quis obcaecati repellendus mollitia
                tempore
                quam. Praesentium a distinctio illum culpa quidem voluptatem temporibus dolor
                reiciendis,
                suscipit quis. Nesciunt amet veritatis provident placeat. Maxime ut quidem optio saepe
                corrupti inventore nulla numquam. Illo ipsam animi fuga eveniet, recusandae veritatis
                saepe
                soluta sed molestiae, sequi rem officiis quaerat in provident tempore possimus ab natus
                necessitatibus, ex laborum? Sunt ipsa doloribus quae, maxime quasi, consequuntur eius
                nostrum impedit a aliquid mollitia dolor?
            </p>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>