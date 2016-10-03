function notif(pesan, jenis)
{
	var tipe = ['','info','success','warning','danger'];
	var icon = ['','pe-7s-info','pe-7s-smile','pe-7s-attention','pe-7s-close-circle'];

	$.notify({
		icon: icon[jenis],
		message: pesan
	},{
		type: tipe[jenis],
		timer: 4000,
		placement:{from:'top', align:'center'}
	});
}