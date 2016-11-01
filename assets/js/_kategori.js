$(document).ready(function(){
    $('table').DataTable();
});


$(document).ready(function() {
    $("#checkInduk").click(function() {
        if ($(this).is(":checked")) {
            $("#induk").val("");
            $("#induk").prop("disabled", true);
            indukKategori();
        } else {
            $("#induk").prop("disabled", false);
            $("#sub_kategori").val("");
        }
    });
});