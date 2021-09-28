<?= $this->extend('layout/admin/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/form-validation.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('custom_js'); ?>
<script src="<?= base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script>
    $(function() {
        'use strict';
        if ($('#frm_sop_category').length) {
            $('#frm_sop_category').validate({
                rules: {
                    'sop_category_title': {
                        required: true
                    },
                }
            });
        }
    });
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-3">
                <form id="frm_sop_category" name="frm_sop_category" class="form form-horizontal" action="<?= base_url('admin/sop-category/update'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="sop_category_title">Category Title</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="sop_category_pid" class="form-control text-black" name="sop_category_pid" placeholder="App pid" value="<?= $sop_category['sop_category_pid']; ?>" hidden required>
                                    <input type="text" id="sop_category_title" class="form-control text-black" name="sop_category_title" placeholder="Category title" value="<?= $sop_category['sop_category_title']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="sop_category_banner_img">Page Banner Image</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="alert alert-primary <?= $sop_category['sop_category_banner_img'] == "" ? 'hidden' : null ?>" role="alert">
                                        <div class="alert-body">
                                            <strong>
                                                <?= $sop_category['sop_category_banner_img']; ?>
                                            </strong>
                                        </div>
                                    </div>
                                    <input id="sop_category_banner_img" name="sop_category_banner_img" class="form-control text-black <?= $validation->hasError('sop_category_banner_img') ? 'is-invalid' : null; ?>" type="file">
                                    <div class="invalid-feedback"><?= $validation->getError('sop_category_banner_img'); ?></div>
                                    <div class="alert alert-warning font-small-3 mt-1" role="alert">
                                        <div class="alert-body">
                                            <ul class="m-0">
                                                <li>File format: JPG/JPEG/PNG</li>
                                                <li>Recommended size: 1440x400 px</li>
                                                <li>Max file size: 200kb</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-sm-3">
                                <a href="<?= base_url('admin/sop-documents'); ?>" class="btn btn-outline-secondary waves-effect">Cancel</a>
                            </div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success me-1 waves-effect waves-float waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>