// Variabel declaration
var link = window.location.href;

$(document).ready(function(){
	$('.dropdown-submenu a').next('ul').hide();
	$('.dropdown-submenu a').on("click", function(e){
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
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

	link = link.substr(0, link.lastIndexOf('?'));
	
	if(nama!=''){link = replace_link(/nama=[a-z0-9]/i, 'nama='+nama);}
	if(merk!=''){link = replace_link(/merk=[a-z0-9]/i, 'merk='+merk);}
	if(tipe!=''){link = replace_link(/tipe=[a-z0-9]/i, 'tipe='+tipe);}

	window.location = link;
});

// Preview IMAGE
$("input[name='gambar']").change(function ()
{
	readURL(this);
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