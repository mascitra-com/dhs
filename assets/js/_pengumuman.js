function hapus(id)
{
	if (confirm('Apakah anda yakin akan menghapus data ini?')) {
		$.post('pengumuman/delete',{'id':id}, function(result){
			if (result == 'sukses') {
				$("#tr"+id).remove();
			}else{
				alert('Terjadi kesalahan, data gagal dihapus');
			}
		}, 'html');
	}
}

function set_status(e,id)
{
	var status 	= ($(e).html()=='aktif')?'0':'1';
	var kelas 	= (status!='1')?'btn-danger':'btn-info';
	var caption = (status!='1')?'non-aktif':'aktif';

	$.post('pengumuman/update',{'id':id, 'status':status}, function(result){
		if (result == 'sukses') {
			$(e).removeClass('btn-info').removeClass('btn-danger').addClass(kelas).html(caption);
		}else{
			alert('Terjadi kesalahan, data gagal dihapus');
		}
	}, 'html');
}

function edit(id)
{
	var status = ($("#tr"+id+" #dt-status").html()=='aktif')?'1':'0';

	$("form input[name='judul']").val($("#tr"+id+" td #dt-judul").html());
	$("form textarea[name='isi']").val($("#tr"+id+" td #dt-isi").html());
	$("form input[name='masa_aktif']").val($("#tr"+id+" td #dt-masaaktif").html());
	$("form input[name=id]").val(id);
	$("form input[name='status'][value='"+status+"']").prop('checked', true);
	$("form").prop('action', site_url+'pengumuman/updateForm');
}

function resets()
{
	$("input, textarea").val("");
	$("form input[name='status'][value='1']").prop('checked', true);
	$("form").prop('action', site_url+'pengumuman/store');
}

function cek()
{
	console.log($("form").prop('action'));
}
