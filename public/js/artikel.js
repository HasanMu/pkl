$(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var alamat = "http://forum-prakerin.test/api/artikel";
    var nama = $('input[name="nama"]').val();
    var id = $('input[id="id"]').val();

    $.ajax({
        url: alamat,
        method: "GET",
        dataType: "json",
        success: function (berhasil) {
            console.log(berhasil)
            $.each(berhasil.data, function(key, val) {
                $('.data-artikel').append(
                    `
                    <tr>
                        <td>${val.judul}</td>
                        <td>${val.user.name}</td>
                        <td>${val.foto}</td>
                        <td>${val.category.nama}</td>
                        <td>${val.tag.nama}</td>
                        <td>
                            <button type="button" class="btn btn-primary e-kategori"  data-id="${val.id}"  data-toggle="modal" data-target="#ubah-kategori" data-nama="${val.nama}">Edit</button>
                            <button type="button" class="btn btn-danger h-kategori" data-id="${val.id}">Hapus</button>
                        </td>
                    </tr>
                    `
                )
            })
        }
    });

    
})