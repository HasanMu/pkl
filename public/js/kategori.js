$(document).ready(function (){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var alamat = "/api/category";
    var nama = $('input[name="nama"]').val();
    var id = $('input[id="id"]').val();

    $.ajax({
        url: alamat,
        method: "GET",
        dataType: "json",
        success: function (berhasil) {
            console.log(berhasil)
            $.each(berhasil.data, function(key, val) {
                $('.data-kategori').append(
                    `
                    <tr>
                        <td>${val.nama}</td>
                        <td>
                            <button type="button" class="btn btn-primary e-kategori"  data-id="${val.id}"  data-toggle="modal" data-target="#ubah-kategori" data-nama="${val.nama}">Edit</button>
                            <button type="button" class="btn btn-danger h-kategori" data-id="${val.id}">Hapus</button>
                        </td>
                    </tr>
                    `
                )
            })
        }
    })

    $('.tambah').on('click', function(e) {
        e.preventDefault()

        var input = $('input[name="inputKategori"]').val()

        $.ajax({
            url: alamat,
            method: "POST",
            dataType: "json",
            data: {
                nama: input
            },
            success: function (data) {
                $('.inputKategori').val('');
                location.reload();
                console.log(data.message);
            },
            error: function (err) {
                console.log(err);

            }
        });
    });

    $('.data-kategori').on('click', '.h-kategori', function(){
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


    $('#ubah-kategori').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var nama = button.data('nama')
        var id = button.data('id') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body input[name="id"]').val(id)
        modal.find('.modal-body input[name="ubahKategori"]').val(nama)
    })

    $('.ubah-category').on('click', function(e) {
        e.preventDefault();

        var id = $('input[name="id"]').val()
        var nama = $('input[name="ubahKategori"]').val()

        $.ajax({
            url: alamat + '/'+id,
            method: "PUT",
            dataType: "JSON",
            data: {
                nama: nama
            },
            success: function (succ) {
                location.reload()
                console.log(succ.message)
            }
        })
    })
    // var $table = $('.dataTable').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{ route('kategori.index') }}",
    //     columns: [
    //         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    //         {data: 'nama', name: 'nama'},
    //         {data: 'action', name: 'action', orderalbe: false, searchable: false}
    //     ]
    // });
})
