$(document).ready(function(){

});

$("#mymodal").on('hide.bs.modal', function(){
	reset_modal();
});

$("#form_barang").on('submit',function(e){
	e.preventDefault();
	if(validated('form_barang')){

		$("#myModalLabel").html("Tambah Barang");
		$("#btn-simpan-barang").empty().html("<i class='fa fa-refresh fa-spin fa-1x fa-fw'></i>Menyimpan data...").prop('disabled', true);
		$("#btn-reset-barang").prop('disabled', true);

		$.ajax({
			url			: "katalog/store",
			type 		: "POST",
			data 		: new FormData(this),
			contentType	: false,
			cache		: false,
			processData	: false,
			success: function(data){
				alert('Data berhasil diinputkan');
				reset_modal();
			},
			error: function(xhr, ajaxOption, thrownError){
				// console.log(xhr);
				alert("Terjadi kesalahan");
				$("#btn-simpan-barang").empty().html("Simpan").prop('disabled', false);
				$("#btn-reset-barang").prop('disabled', false);
			} 	        
		});
	}else{
		$("#myModalLabel").html("Tambah Barang <font color='red'>(isi data yang kosong)</font>")
	}
});

// function barang_simpan()
// {
// 	if (validated('form_barang')) {
// 		$("#myModalLabel").html("Tambah Barang");
// 		$("#btn-simpan-barang").empty().html("<i class='fa fa-refresh fa-spin fa-1x fa-fw'></i>Menyimpan data...").prop('disabled', true);
// 		$("#btn-reset-barang").prop('disabled', true);

// 		// AJAX Simpan barang
// 		var form = $('#form_barang')[0];
// 		var formData = new formData();
// 		formData.append('section', 'general');
// 		formData.append('action', 'previewImg');
// 		formData.append('image', $('input[type=file]')[0].files[0], '153set-f.jpg');

// 		$.ajax({
// 			type: 'POST',
// 			url	: 'katalog/store',
// 			data: data,
// 			contentType: false,
//     		processData: false,
// 			success: function(result){
// 				console.log(result);
// 			},
// 			error: function(xhr, ajaxOption, thrownError){
// 				console.log(xhr+"");
// 			}
// 		});

// 	}else{
// 		$("#myModalLabel").html("Tambah Barang <font color='red'>(isi data yang kosong)</font>")
// 	}
// }

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
	$("#form_barang input[required], #form_barang textarea[required]").val('').removeClass('kosong');
	$("#form_barang select option[value='0']").prop('selected', true);
	$("#form_barang select").removeClass('kosong');
	$("#myModalLabel").html("Tambah Barang");
	$("#btn-simpan-barang").empty().html("Simpan").prop('disabled', false);
	$("#btn-reset-barang").prop('disabled', false);
}