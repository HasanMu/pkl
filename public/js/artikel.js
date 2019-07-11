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
    var i = 0;

    // $.ajax({
    //     url: alamat,
    //     method: "GET",
    //     dataType: "json",
    //     success: function (berhasil) {
    //         console.log(berhasil)
    //         $.each(berhasil.data, function(key, val) {
    //             $('.data-artikel').append(
    //                 `
    //                 <tr>
    //                     <td>${val.judul}</td>
    //                     <td>
    //                         <img src="/assets/backend/artikel/img/${val.foto}" width="150px" height="100px">
    //                     </td>
    //                     <td>${val.user.name}</td>
    //                     <td>${val.category.nama}</td>
    //                     <td>${val.tag[0].nama}</td>
    //                     <td>
    //                         <button
    //                             type="button"
    //                             class="btn btn-primary e-artikel"
    //                             data-toggle="modal"
    //                             data-target="#edit-artikel"
    //                             data-id="${val.id}"
    //                             data-judul="${val.judul}"
    //                             data-konten="${val.konten}"
    //                             data-foto="${val.foto}"
    //                             data-kategori="${val.category.nama}"
    //                             data-tag="${val.tag.nama}">Edit</button>
    //                         <button
    //                             type="button"
    //                             class="btn btn-danger h-artikel"
    //                             data-id="${val.id}">Hapus</button>
    //                     </td>
    //                 </tr>
    //                 `
    //             )
    //         })
    //     }
    // });

    $('.dataTable').dataTable({
        dataType: 'json',
        ajax: alamat,
        responsive: true,
        columns: [
            {data: 'judul', name: 'judul'},
            { data: 'foto', render :  function(foto){
                    return '<img src="/assets/backend/artikel/img/'+foto+'" style="width:150px; height:100px;" alt="foto">';
                }
            },
            {data: 'user.name', name: 'user.name'},
            {data: 'category.nama', name: 'category.nama'},
            {data: 'tag[].nama', render: function(nama) {
                    return `${nama}`
                }
            },
            {data: 'id', render: function (id) {
                return `<button
                                 type="button"
                                 class="btn btn-primary e-artikel"
                                 data-toggle="modal"
                                 data-target="#edit-artikel"
                                 onclick="${editArtikel(id)}">Edit</button>
                             <button
                                 type="button"
                                 class="btn btn-danger h-artikel"
                                 data-id="${id}">Hapus</button>`
            }}
        ]
    })


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


    $('#form-create-artikel').on('submit', function (e) {
        var formData = new FormData($('#form-create-artikel')[0]);
        e.preventDefault();

        // var tag = $('.tag option:selected').attr('value');

        // formData.append('foto', $('input[type="file"]')[0].files[0])
        // formData.append('judul', $('.judul').val());
        // formData.append('konten', $('.konten').val());
        // // formData.append('', $('.foto').val());
        // formData.append('kategori',  $('.kategori option:selected').attr('value'));
        // formData.append('tag', [tag]);

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

    // $('.data-artikel').on('click', '.e-artikel', function() {

    //     var id = $(this).data('id')
    //     var judul = $(this).data('judul')
    //     var konten = $(this).data('konten')
    //     var foto = $(this).data('foto')
    //     var kategori = $(this).data('kategori')
    //     var tag = $(this).data('tag')

    //     $('.e-judul').val(judul)
    //     $('.e-konten').val(konten)
    //     $('.prev-foto').attr('src', '/assets/backend/artikel/img/'+foto)

    //     $.ajax({
    //         url: '/api/category',
    //         method: "GET",

    //     })
    // })

    $('.data-artikel').on('click', '.h-artikel', function(){
        var id = $(this).data('id')

        $.ajax({
            url: alamat+'/'+id,
            method: "DELETE",
            dataType: "json",
            data: {
                id: id
            },
            success: function (succ) {
                location.reload();
                console.log(succ.messsage)
            },
            error: function (err) {
                console.log(err);

            }
        })
    });

    function editArtikel(id) {

        var id;

        $.ajax({
            url: alamat+'/'+id,
            method: 'GET',
            dataType: 'json',
            success: function (res) {
                console.log(res);
            }
        })

    }
})
