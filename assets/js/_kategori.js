var link = window.location.href;

$(document).ready(function () {
    $("#checkInduk").click(function () {
        if ($(this).is(":checked")) {
            $("#induk").val("");
            $("#induk").prop("disabled", true);
            kategoriInduk();
        } else {
            $("#induk").prop("disabled", false);
            $("#sub_kategori").val("");
        }
    });

    $('#induk').change(function (e) {
        var kode_kategori = $('#induk').val();
        $.ajax({
            type: "GET",
            url: "get_kode?kategori=" + kode_kategori,
            success: function (data) {
                $("#sub_kategori").val(data);
            }
        });
    });
});

$('#page').change(function (e) {
    var total = $("#page").val();
    link = replace_link(/page=[A-Za-z0-9]/i, 'page=' + total);
    window.location = link;
})

$("#btn-filter").click(function () {
    var status = $("#ip-status").val();
    var kode = $("#ip-kode").val();
    var nama = $("#ip-nama").val();

    link = link.substr(0, link.indexOf('kategori') + 8);

    if (status != '') {
        link = replace_link(/status=[A-Za-z0-9]/i, 'status=' + status);
    }


    if (kode != '') {
        link = replace_link(/kode_kategori=[A-Za-z0-9]/i, 'kode_kategori=' + kode);
    }

    if (nama != '') {
        link = replace_link(/nama=[A-Za-z0-9]/i, 'nama=' + nama);
    }

    window.location = link;
});

function replace_link(data, dengan) {
    lnk = link;
    if (data.test(lnk)) {
        lnk = lnk.replace(data, dengan);
    } else {
        if (/kategori[^A-Za-z0-9]/i.test(lnk)) {
            lnk = lnk + '&' + dengan;
        } else {
            lnk = lnk + '?' + dengan;
        }
    }

    return lnk;
}