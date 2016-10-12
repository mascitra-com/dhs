var data_count;
$(document).ready(function(){
	data_count = 0;
	refresh_badge();
	// Set auto complete
	$("input[name='nama']").autocomplete({source:data_nama});
	$("input[name='tipe']").autocomplete({source:data_tipe});
	$("input[name='merk']").autocomplete({source:data_merk});
	// Set tampilan autocomplete setelah form agar tidak ketindihan
	$("#form_barang input[name='nama']").autocomplete("widget").insertAfter($("#form_barang"));
	$("#form_barang input[name='tipe']").autocomplete("widget").insertAfter($("#form_barang"));
	$("#form_barang input[name='merk']").autocomplete("widget").insertAfter($("#form_barang"));
	// Set TinyMCE
	tinymce.init({
		selector: '#tx-spesifikasi',
		menubar	: false
	});
});

$("#mymodal").on('hide.bs.modal', function(){
	reset_modal();
});

// Simpan data
$("#form_barang").on('submit',function(e){
	e.preventDefault();
	if(validated('form_barang')){

		$("#btn-simpan-barang").empty().html("<i class='fa fa-refresh fa-spin fa-1x fa-fw'></i>Menyimpan data...").prop('disabled', true);
		$("#btn-reset-barang").prop('disabled', true);

		var formdata = new FormData(this);
		formdata.set('spesifikasi', tinymce.activeEditor.getContent());

		$.ajax({
			url			: $(this).attr('action'),
			type 		: "POST",
			data 		: formdata,
			contentType	: false,
			cache		: false,
			processData	: false,
			success: function(result){
				// ALert
				alert('Data berhasil diinputkan');
				// Bersihkan form
				reset_modal();
				// refresh badge
				data_count++;
				refresh_badge();
				console.log(data_count);
				// window.location = '';
			},
			error: function(xhr, ajaxOption, thrownError){
				// console.log(xhr);
				alert("Terjadi kesalahan, periksa kembali data anda");
				$("#btn-simpan-barang").empty().html("Simpan").prop('disabled', false);
				$("#btn-reset-barang").prop('disabled', false);
			} 	        
		});
	}
});

//hapus data
function hapus(id, gambar)
{
	if(confirm('Apakah anda yakin akan menghapus barang ini?')){
		$.post('katalog/hapus', {id:id, gambar:gambar}, function(result, status){
			if(status=='success' && result=='true'){
				$.notify('Data berhasil dihapus', 'success');
				$("#barang"+id).remove();
			} else if(status=='success' && result=='true-false'){
				$.notify('Data berhasil dihapus namun gambar tidak bisa dihapus', 'warning');
				$("#barang"+id).remove();
			}else{
				$.notify('Data gagal dihapus', 'danger');
			}
		}, 'html');
	}
}

// Preview IMAGE
$("input[name='gambar']").change(function(){
    readURL(this);
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
	tinyMCE.activeEditor.setContent('');
    $('#img-preview').attr('src', './assets/img-user/default.png');
}

function refresh_badge()
{
	$(".badge").empty();

	if (data_count > 0){
		$(".badge").html(data_count+"");
	}
}

// preview image
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}