<?= $this->extend('layout/admin/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection__arrow b {
        display: none !important;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('custom_js'); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#apps_sub_category_pid').select2();
    });
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-3">
                <form class="form form-horizontal" action="<?= base_url('admin/apps-documentation/insert'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_document_title">Document Title</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="apps_document_title" class="form-control" name="apps_document_title" placeholder="Document title" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_document_file">Upload Document File</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="apps_document_file" name="apps_document_file" class="form-control" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_banner_img">Page Banner Image</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="apps_banner_img" name="apps_banner_img" class="form-control" type="file">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_sub_category_pid">Assign to</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="select2 form-select" id="apps_sub_category_pid" name="apps_sub_category_pid">
                                        <option value="">- Choose category -</option>
                                        <?php foreach ($apps_sub_category as $key) { ?>
                                            <option value="<?= $key['apps_sub_category_pid']; ?>"><?= $key['apps_name'] . ' ' . $key['apps_subname'] . ' - ' . $key['apps_sub_category_title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-sm-3">
                                <a href="<?= base_url('admin/apps-documentation'); ?>" class="btn btn-outline-secondary waves-effect">Cancel</a>
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