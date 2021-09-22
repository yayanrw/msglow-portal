<?= $this->extend('layout/admin/template_view'); ?>

<?= $this->section('custom_css'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-3">
            <form class="form form-horizontal" action="<?= base_url('admin/apps-management/update'); ?>" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_name">App Title</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="apps_pid" class="form-control text-black" name="apps_pid" placeholder="App pid" value="<?= $apps['apps_pid']; ?>" required hidden>
                                    <input type="text" id="apps_name" class="form-control text-black" name="apps_name" placeholder="App title" value="<?= $apps['apps_name']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_subname">App Subtitle</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="apps_subname" class="form-control text-black" name="apps_subname" placeholder="App subtitle" value="<?= $apps['apps_subname']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_desc">App Description</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea id="apps_desc" name="apps_desc" class="form-control text-black" placeholder="App description"><?= $apps['apps_desc']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_owner">App Owner</label>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-select text-black" id="apps_owner" name="apps_owner">
                                        <option value="">- Choose owner -</option>
                                        <option value="IT" <?= $apps['apps_owner'] == "IT" ? 'selected' : null ?>>IT</option>
                                        <option value="HRGA" <?= $apps['apps_owner'] == "HRGA" ? 'selected' : null ?>>HRGA</option>
                                        <option value="Marketing" <?= $apps['apps_owner'] == "Marketing" ? 'selected' : null ?>>Marketing</option>
                                        <option value="Legal" <?= $apps['apps_owner'] == "Legal" ? 'selected' : null ?>>Legal</option>
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
                                    <input type="text" id="apps_url" class="form-control text-black" name="apps_url" placeholder="For example: http://erp.msglow.work/" value="<?= $apps['apps_url']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_date_release">App Date Release</label>
                                </div>
                                <div class="col-sm-3">
                                    <input type="date" id="apps_date_release" class="form-control text-black" name="apps_date_release" value="<?= $apps['apps_date_release']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="contact-info">App Icon</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="apps_icon" name="apps_icon" class="form-control text-black" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="contact-info">App Banner</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="apps_banner_img" name="apps_banner_img" class="form-control text-black" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label text-black" for="apps_key_session">App Key Session</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="apps_key_session" class="form-control text-black" name="apps_key_session" placeholder="App key session" value="<?= $apps['apps_key_session']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-sm-3">
                                <a href="<?= base_url('admin/apps-management'); ?>" class="btn btn-outline-secondary waves-effect">Cancel</a>
                            </div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success me-1 waves-effect waves-float waves-light">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>