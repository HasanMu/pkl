$(document).ready(function (){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var alamat = "http://forum-prakerin.test/api/category";
    //Create
    $('.kirim').click(function(e) {
        e.preventDefault();

        $.ajax({
            url: alamat,
            method: "POST",
            dataType: "JSON",
            data: {
                nama: $('input[name="nama"]').val()
            },
            success: function (berhasil) {
                console.log(berhasil.message);
                location.reload();
            },
            error: function (error) {
                console.log('gagal');
            }
        });
    });
})
