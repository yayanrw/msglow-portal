<?= $this->extend('layout/admin/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/form-validation.css'); ?>">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection__arrow b {
        display: none !important;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('custom_js'); ?>
<script src="<?= base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sop_category_pid').select2();
    });
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
    $(function() {
        'use strict';
        if ($('#frm_sop_documents').length) {
            $('#frm_sop_documents').validate({
                rules: {
                    'sop_documents_title': {
                        required: true
                    },
                    'sop_category_pid': {
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
                <form id="frm_sop_documents" name="frm_sop_documents" class="form form-horizontal" action="<?= base_url('admin/sop-documents/insert'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="sop_documents_title">Document Title</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="sop_documents_title" class="form-control text-black" name="sop_documents_title" placeholder="Document title" value="<?= old('sop_documents_title'); ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="sop_documents_desc">Document Description</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea name="sop_documents_desc" id="sop_documents_desc" class="form-control text-black" cols="30" rows="5"><?= old('sop_documents_desc'); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="sop_documents_file">Upload Document File</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="sop_documents_file" name="sop_documents_file" class="form-control text-black <?= $validation->hasError('sop_documents_file') ? 'is-invalid' : null; ?>" type="file">
                                    <div class="invalid-feedback"><?= $validation->getError('sop_documents_file'); ?></div>
                                    <div class="alert alert-warning font-small-3 mt-1" role="alert">
                                        <div class="alert-body">
                                            <ul class="m-0">
                                                <li>File format: PDF</li>
                                                <li>Max file size: 5Mb</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="sop_documents_banner_img">Page Banner Image</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="sop_documents_banner_img" name="sop_documents_banner_img" class="form-control <?= $validation->hasError('sop_documents_banner_img') ? 'is-invalid' : null; ?>" type="file">
                                    <div class="invalid-feedback"><?= $validation->getError('sop_documents_banner_img'); ?></div>
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
                                    <label class="col-form-label text-black" for="sop_category_pid">Assign to</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="select2 form-select" id="sop_category_pid" name="sop_category_pid">
                                        <option value="">- Choose category -</option>
                                        <?php foreach ($sop_category as $key) { ?>
                                            <option value="<?= $key['sop_category_pid']; ?>" <?= $key['sop_category_pid'] == old('sop_category_pid') ? 'selected' : null ?>><?= $key['sop_category_title'] ?></option>
                                        <?php } ?>
                                    </select>
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