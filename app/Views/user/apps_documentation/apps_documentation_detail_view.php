<?= $this->extend('layout/user/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section id="knowledge-base-search">
    <div class="row">
        <div class="col-12">
            <div class="card knowledge-base-bg" style="background-image: url('<?= base_url('assets/uploads/banners/' . $apps_documentation->apps_document_banner_img); ?>')">
                <div class="card-body">
                    <h1 class="text-black" style="font-size: 56px;"><?= $apps_documentation->apps_document_title; ?></h1>
                    <a href="#" class="btn btn-light me-1"><?= $apps_documentation->apps_name; ?> - <?= $apps_documentation->apps_subname; ?></a>
                    <a href="#" class="btn btn-light waves-effect waves-float waves-light"><?= $apps_documentation->apps_sub_category_title; ?></a>
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