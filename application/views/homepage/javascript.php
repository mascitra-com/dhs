<!--  Load jQuery -->
<script src="<?=base_url('assets/plugin/jquery/jquery-1.10.1.min.js')?>" type="text/javascript"></script>
<!--  Load Bootstrap JS -->
<script src="<?=base_url('assets/plugin/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
<!-- jQuery UI -->
<script src="<?=base_url('assets/plugin/jquery-ui/jquery-ui.min.js')?>"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="<?=base_url('assets/plugin/template/js/bootstrap-checkbox-radio-switch.js')?>"></
<script src="<?=base_url('assets/plugin/template/js/homepage.js')?>"></script>
 <!-- jQuery Marquee -->
<script src="<?=base_url('assets/plugin/jquery-marquee/jquery.marquee.min.js')?>"></script>

<script>
$(document).ready(function(){
	$(".pengumuman").marquee({direction:'left',duration:17000,duplicated:true});
	$("input[type='date']").datepicker({dateFormat: "yy-mm-dd"});
});

</script>