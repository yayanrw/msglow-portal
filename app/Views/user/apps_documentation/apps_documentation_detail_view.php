<?= $this->extend('layout/user/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<style>
    iframe {
        display: block;
        /* iframes are inline by default */
        background: #000;
        border: none;
        /* Reset default border */
        height: 100vh;
        /* Viewport-relative units */
    }
</style>
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
        <div class="col-10 offset-1">
            <div class="embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item" id="myIframe" src="<?= base_url('assets/uploads/documents/' . $apps_documentation->apps_document_file); ?>#zoom=100&toolbar=0&navpanes=0&scrollbar=0" width="100%" height="100%" style="border: none;"></iframe>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>