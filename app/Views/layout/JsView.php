<!-- Start JS -->
<script src="<?= base_url('assets/js/vendors.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/app-menu.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/app.min.js'); ?>"></script>

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
<!-- End JS -->