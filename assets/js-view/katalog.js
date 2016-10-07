$(document).ready(function(){
	// Set auto complete
	$("input[name='nama']").autocomplete({source:data_nama});
	$("input[name='tipe']").autocomplete({source:data_tipe});
	$("input[name='merk']").autocomplete({source:data_merk});
	// Set tampilan autocomplete setelah form agar tidak ketindihan
	$("input[name='nama']").autocomplete("widget").insertAfter($("#form_barang"));
	$("input[name='tipe']").autocomplete("widget").insertAfter($("#form_barang"));
	$("input[name='merk']").autocomplete("widget").insertAfter($("#form_barang"));
});

$("#mymodal").on('hide.bs.modal', function(){
	reset_modal();
});

$("#form_barang").on('submit',function(e){
	e.preventDefault();
	if(validated('form_barang')){

		$("#btn-simpan-barang").empty().html("<i class='fa fa-refresh fa-spin fa-1x fa-fw'></i>Menyimpan data...").prop('disabled', true);
		$("#btn-reset-barang").prop('disabled', true);

		$.ajax({
			url			: $(this).attr('action'),
			type 		: "POST",
			data 		: new FormData(this),
			contentType	: false,
			cache		: false,
			processData	: false,
			success: function(result){
				alert('Data berhasil diinputkan');
				window.location = '';
			},
			error: function(xhr, ajaxOption, thrownError){
				// console.log(xhr);
				alert("Terjadi kesalahan");
				$("#btn-simpan-barang").empty().html("Simpan").prop('disabled', false);
				$("#btn-reset-barang").prop('disabled', false);
			} 	        
		});
	}
});

function validated(form_id){
	var par = true;
	$("#"+form_id+" input[required], #"+form_id+" textarea[required]").each(function(){
		if ($(this).val()=='') {
			par = false;
			$(this).addClass('kosong');

		}else{
			$(this).removeClass('kosong');
		}
	});

	$("#"+form_id+" input[type='number'][required]").each(function(){
		if ($(this).val()=='0') {
			par = false;
			$(this).addClass('kosong');
		}else{
			$(this).removeClass('kosong');
		}
	});

	$("#"+form_id+" select").each(function(){
		if($(this).val()==0){
			par = false;
			$(this).addClass('kosong');
		}else{
			$(this).removeClass('kosong');
		}
	});
	return par;
}

function get_data(form_id)
{
	var tmp = {};
	$.each($("#"+form_id).serializeArray(),
		function(i, field){
			tmp[field.name] = field.value;
		});
	return tmp;
}

function reset_modal()
{
	$("#form_barang input, #form_barang textarea").val('').removeClass('kosong');
	$("#form_barang input[type='number']").val('0');
	$("#form_barang select option[value='0']").prop('selected', true);
	$("#form_barang select").removeClass('kosong');
	$("#btn-simpan-barang").empty().html("Simpan").prop('disabled', false);
	$("#btn-reset-barang").prop('disabled', false);
}