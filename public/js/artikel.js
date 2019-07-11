$(document).ready(function () {
    $('.tag').select2();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var alamat = "/api/artikel";
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
                        <td>
                            <img src="/assets/backend/artikel/img/${val.foto}" width="200px" height="200px"></td>
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

    $('.tambah-artikel').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/api/category',
            method: "GET",
            dataType: "JSON",
            success: function (data) {
                $.each(data.data, function(key, val) {
                    $('.kategori').append(
                        `
                        <option value="${val.id}">${val.nama}</option>
                        `
                    )
                })
            },
            error: function (err) {
                console.log(err);
            }
        });

        $.ajax({
            url: '/api/tag',
            method: "GET",
            dataType: "JSON",
            success: function (data) {
                $.each(data.data, function(key, val) {
                    $('.tag').append(
                        `
                        <option value="${val.id}">${val.nama}</option>
                        `
                    )
                })
            },
            error: function (err) {
                console.log(err);
            }
        });
    })

    var formData = new FormData();

    $('#form-create-artikel').on('submit', function (e) {
        e.preventDefault();

        formData.append('foto', $('input[type="file"]')[0].files[0])
        formData.append('judul', $('.judul').val());
        formData.append('konten', $('.konten').val());
        // formData.append('', $('.foto').val());
        formData.append('kategori',  $('.kategori option:selected').attr('value'));
        formData.append('tag', $('.tag option:selected').attr('value'));

        $.ajax({
            url: alamat,
            method: "POST",
            dataType: "JSON",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                console.log(res.message);
                location.reload();
            },
            error: function (err) {
                console.log(err);

            }
        })


    })
})
