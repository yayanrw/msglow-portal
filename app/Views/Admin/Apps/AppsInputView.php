<?= $this->extend('Layout/Admin/TemplateView'); ?>

<?= $this->section('CustomCss'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/page-knowledge-base.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('Content'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>