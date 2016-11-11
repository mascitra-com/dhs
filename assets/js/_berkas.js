function edit(id)
{
	var judul = $("#baris"+id+" #judul").html();
	var keterangan = $("#baris"+id+" #keterangan").html();

	$("input[name='nomor']").val(id);
	$("input[name='judul']").val(judul);
	$("textarea[name='keterangan']").html(keterangan);
	$("input[name='nama_file']").val(file);
	$("input[name='berkas']").prop('required',false);

	$(":submit").html('perbaharui');
	$("form").prop('action', site_url+'/berkas/update');

	console.log(site_url);
}

$(":reset").click(function(){
	$("input[name='judul']").val("");
	$("textarea[name='keterangan']").html("");
	$("input[name='nama_file']").val("");
	$("input[name='nomor']").val("");

	$(":submit").html('simpan');
	$("form").prop('action', site_url+'/berkas/store');
});