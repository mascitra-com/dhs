<!--   Core JS Files   -->
<script src="<?= base_url() ?>assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<!-- Bootsrtap -->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Jquery UI -->
<script src="<?= base_url() ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<!-- <script src="<?= base_url() ?>assets/js/bootstrap-checkbox-radio-switch.js"></script> -->
<!--  Notifications Plugin    -->
<script src="<?= base_url() ?>assets/js/bootstrap-notify.js"></script>
<!-- Data Table -->
<script src="<?= base_url() ?>assets/js/datatable.js" type="text/javascript"></script>
<!-- Custom Helper -->
<script src="<?= base_url() ?>assets/js/helper.js" type="text/javascript"></script>
<!--  Custom JS -->

<script>
    function goBack() {
        window.history.back();
    }
</script>

<?php if (isset($js)): ?>
    <script src="<?= base_url() . 'assets/js-view/' . $js . '.js' ?>"></script>
<?php endif; ?>