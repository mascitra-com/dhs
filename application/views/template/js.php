<!-- LOAD JAVASCRIPT -->

<!--  Load jQuery -->
<script src="<?= base_url('assets/plugin/jquery/jquery-1.10.1.min.js') ?>" type="text/javascript"></script>
<!--  Load Bootstrap JS -->
<script src="<?= base_url('assets/plugin/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- jQuery UI -->
<script src="<?= base_url('assets/plugin/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="<?= base_url('assets/plugin/template/js/light-bootstrap-dashboard.js') ?>"></script>
 <!-- jQuery Marquee -->
<script src="<?= base_url('assets/plugin/jquery-marquee/jquery.marquee.min.js') ?>"></script>
<!-- Choosen -->
<script src="<?= base_url('assets/plugin/chosen/chosen.jquery.min.js') ?>"></script>

<!--  Load custom JS -->
<?php 
$loadDT 	= array();
$loadTMCE 	= array('katalog');
$loadChart 	= array('dashboard');

if (isset($js) && $js != ''):

	if (in_array($js, $loadDT)): ?>
	    <script src="<?= base_url('assets/plugin/datatables/js/jquery.dataTables.min.js') ?>"></script>
	<?php endif;
		if (in_array($js, $loadTMCE)): ?>
	    <script src="<?= base_url('assets/plugin/tinymce/tinymce.min.js') ?>"></script>
	<?php endif;
		if (in_array($js, $loadChart)): ?>
	    <script src="<?= base_url('assets/plugin/chartjs/chart.js') ?>"></script>
	<?php endif;?>

    <script type="text/javascript" src="<?= base_url('assets/js/_'.$js.'.js') ?>"></script>
<?php endif; ?>

<script>
$(document).ready(function(){
	$(".pengumuman").marquee({direction:'left',duration:17000,duplicated:true});
	$("input[type='date']").datepicker({dateFormat: "yy-mm-dd"});
});

</script>
<script>
    function goBack() {
        window.history.back();
    }
</script>
