$(document).ready(function(){
	console.log("halo dunia");
});

function barang_simpan()
{
	if (validated('form_barang')) {

	}else{
		$("#myModalLabel").html("Tambah Barang <font color='red'>(isi data yang kosong)</font>")
	}
}

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