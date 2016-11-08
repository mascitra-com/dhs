// Variabel declaration
var link = window.location.href;

$(document).ready(function(){
	$("input[name='nama']").autocomplete({source:ac_nama});
	$("input[name='merk']").autocomplete({source:ac_merk});
	$("input[name='tipe']").autocomplete({source:ac_tipe});
	// $("input[name='kode_kategori']").autocomplete({source:ac_kategori});

	tinymce.init({
		selector: '#spesifikasi',
		menubar: false
	});

});

//hapus data
function hapus(id, gambar) {
	if (confirm('Apakah anda yakin akan menghapus barang ini?')) {
		$.post('katalog/hapus', {id: id, gambar: gambar}, function (result, status) {
			if (status == 'success' && result == 'true') {
				alert('Data berhasil dihapus.');
				$("#brg" + id).remove();
			} else if (status == 'success' && result == 'true-false') {
				alert('Data berhasil dihapus namun gambar gagal dihapus.');
				$("#brg" + id).remove();
			} else {
				alert('Data gagal dihapus.');
			}
		}, 'html');
	}
}

$("#bt-filter").click(function(){
	var nama = $("#ip-nama").val();
	var merk = $("#ip-merk").val();
	var tipe = $("#ip-tipe").val();
	var hargamin = $("#ip-hargamin").val();
	var hargamax = $("#ip-hargamax").val();

	link = link.substr(0, link.lastIndexOf('?'));
	
	if(nama!=''){link = replace_link(/nama=[a-z0-9]/i, 'nama='+nama);}
	if(merk!=''){link = replace_link(/merk=[a-z0-9]/i, 'merk='+merk);}
	if(tipe!=''){link = replace_link(/tipe=[a-z0-9]/i, 'tipe='+tipe);}
	if(hargamin!=''){link = replace_link(/hargamin=[a-z0-9]/i, 'hargamin='+hargamin);}
	if(hargamax!=''){link = replace_link(/hargamax=[a-z0-9]/i, 'hargamax='+hargamax);}

	window.location = link;
});

// Order
$("#sl-urut").change(function(){
	window.location = replace_link(/order=([0-9]|[10])/i, 'order='+$(this).val());
});

//Offset
function offset(id)
{
	window.location = replace_link(/offset=[0-9]{1,}/i, 'offset='+id);
}

function pagination(pg)
{
	pg = (pg==0)?1:pg;
	window.location = replace_link(/pg=[0-9]{1,}/i, 'pg='+pg);
}


function replace_link(data, dengan)
{
	lnk = link;
	if (data.test(lnk)){
		lnk = lnk.replace(data, dengan);
	}else{
		if (/katalog[^a-z]/i.test(lnk)){
			lnk = lnk + '&'+dengan;
		}else{
			lnk = lnk + '?'+dengan;
		}
	}

	return lnk;
}

//////////// FORM KATALOG

// Simpan data
$("#form-katalog").on('submit', function(e){
	e.preventDefault();
	if(validasi()){
    	//proses simpan data
    	freeze();
    	var formdata = new FormData(this);
    	formdata.set('spesifikasi', tinymce.activeEditor.getContent());
    	$.ajax({
    		url: $(this).attr('action'),
    		type: "POST",
    		data: formdata,
    		contentType: false,
    		cache: false,
    		processData: false,
    		success:function(result){
    			alert((result=='sukses')?'data berhasil diinputkan':result);
    			unfreeze();
    			if(result=='sukses'){
            		// reset
            	}
            },
            error: function (xhr, ajaxOption, thrownError) {
            	alert('terjadi kesalahan: '+thrownError);
            	unfreeze();
            }
        });
    }
});

var jum = 0;
var hp 	= 0;
var bk 	= 0;
var rs 	= 0;
var ppn = 0;

$("input[name='hargaPasar'], input[name='biayaKirim'], input[name='resistensi']").keyup(function(){
	hp 	= parseInt($("input[name='hargaPasar']").val());
	bk 	= parseInt($("input[name='biayaKirim']").val());
	rs 	= parseInt($("input[name='resistensi']").val());
	ppn = Math.round((hp+bk+rs)*0.10);
	jum = hp+bk+rs+ppn;
	$("input[name='ppn']").val(ppn);
	$("input[name='hargashsb']").val(jum);

});

// Preview IMAGE
$("input[name='gambar']").change(function ()
{
	readURL(this);
});

// validasi
function validasi()
{	
	var par = true;
	$("form input[required]").each(function(){
		if ($(this).val()==''){
			$(this).css('border-color','red');
			par = false;
		}else{
			$(this).css('border-color','grey');
		}
	});
	return par;
}

function freeze()
{
	$(":submit").empty().html("<i class='fa fa-refresh fa-spin fa-1x fa-fw'></i>Menyimpan data...").prop('disabled', true);
	$(":reset").prop('disabled', true);
}

function unfreeze()
{
	$(":submit").empty().html("Simpan").prop('disabled', false);
	$(":reset").prop('disabled', false);
}

// function preview image
function readURL(input)
{

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#img-preview').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}