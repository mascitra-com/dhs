<!-- LOAD JAVASCRIPT -->

<!--  Load jQuery -->
<script src="<?=base_url()?>/assets/plugin/jquery/jquery-1.10.1.min.js" type="text/javascript"></script>
<!--  Load Bootstrap JS -->
<script src="<?=base_url()?>/assets/plugin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="<?=base_url()?>/assets/plugin/template/js/bootstrap-checkbox-radio-switch.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="<?=base_url()?>/assets/plugin/template/js/light-bootstrap-dashboard.js"></script>
<!--  Load custom JS -->
<?php if(isset($css) && $js != ''): ?>
<script src="assets/js/<?=(isset($js))?$js.'.js':''?>"></script>
<?php endif ?>