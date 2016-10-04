<!--   Core JS Files   -->
<script src="<?= base_url() ?>assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<!-- <script src="<?= base_url() ?>assets/js/bootstrap-checkbox-radio-switch.js"></script> -->
<!--  Charts Plugin -->
<!-- <script src="<?= base_url() ?>assets/js/chartist.min.js"></script> -->
<!--  Notifications Plugin    -->
<script src="<?= base_url() ?>assets/js/bootstrap-notify.js"></script>
<!-- Data Table -->
<script src="<?= base_url() ?>assets/js/datatable.js" type="text/javascript"></script>
<!-- Custom Helper -->
<script src="<?= base_url() ?>assets/js/helper.js" type="text/javascript"></script>
<!--  Custom JS -->
<?php if (isset($js)): ?>
    <script src="<?= base_url() . 'assets/js-view/' . $js . '.js' ?>"></script>
<?php endif; ?>