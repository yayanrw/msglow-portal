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
        if ($('#frm_apps').length) {
            $('#frm_apps').validate({
                rules: {
                    'apps_name': {
                        required: true
                    },
                    'apps_owner': {
                        required: true
                    },
                    'apps_url': {
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
                <form id="frm_apps" name="frm_apps" class="form form-horizontal" action="<?= base_url('admin/apps-management/insert'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_name">App Title</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="apps_name" class="form-control" name="apps_name" placeholder="App title" value="<?= old('apps_name'); ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_subname">App Subtitle</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="apps_subname" class="form-control" name="apps_subname" placeholder="App subtitle" value="<?= old('apps_subname'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_desc">App Description</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea id="apps_desc" name="apps_desc" class="form-control" placeholder="App description"><?= old('apps_desc'); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_owner">App Owner</label>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-select" id="apps_owner" name="apps_owner">
                                        <option value="">- Choose owner -</option>
                                        <option value="Accounting" <?= old('apps_owner') == "Accounting" ? 'selected' : null ?>>Accounting</option>
                                        <option value="Audit" <?= old('apps_owner') == "Audit" ? 'selected' : null ?>>Audit</option>
                                        <option value="Business Development" <?= old('apps_owner') == "Business Development" ? 'selected' : null ?>>Business Development</option>
                                        <option value="Design" <?= old('apps_owner') == "Design" ? 'selected' : null ?>>Design</option>
                                        <option value="Human Resource" <?= old('apps_owner') == "Human Resource" ? 'selected' : null ?>>Human Resource</option>
                                        <option value="Information Technology" <?= old('apps_owner') == "Information Technology" ? 'selected' : null ?>>Information Technology</option>
                                        <option value="Marketing" <?= old('apps_owner') == "Marketing" ? 'selected' : null ?>>Marketing</option>
                                        <option value="Product" <?= old('apps_owner') == "Product" ? 'selected' : null ?>>Product</option>
                                        <option value="Sales" <?= old('apps_owner') == "Sales" ? 'selected' : null ?>>Sales</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_url">App URL</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="apps_url" class="form-control" name="apps_url" placeholder="For example: http://erp.msglow.work/">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_date_release">App Date Release</label>
                                </div>
                                <div class="col-sm-3">
                                    <input type="date" id="apps_date_release" class="form-control" name="apps_date_release">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="contact-info">App Icon</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="apps_icon" name="apps_icon" class="form-control <?= $validation->hasError('apps_icon') ? 'is-invalid' : null; ?>" type="file">
                                    <div class="invalid-feedback"><?= $validation->getError('apps_icon'); ?></div>
                                    <div class="alert alert-warning font-small-3 mt-1" role="alert">
                                        <div class="alert-body">
                                            <ul class="m-0">
                                                <li>File format: SVG/PNG</li>
                                                <li>Recommended size: 100x100 px</li>
                                                <li>Max file size: 100kb</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="contact-info">App Banner</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="apps_banner_img" name="apps_banner_img" class="form-control <?= $validation->hasError('apps_banner_img') ? 'is-invalid' : null; ?>" type="file">
                                    <div class="invalid-feedback"><?= $validation->getError('apps_banner_img'); ?></div>
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
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_key_session">App Key Session</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="apps_key_session" class="form-control" name="apps_key_session" placeholder="App key session">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-sm-3">
                                <a href="<?= base_url('admin/apps-management'); ?>" class="btn btn-outline-secondary waves-effect">Cancel</a>
                            </div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success me-1 waves-effect waves-float waves-light">Save to draft</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>