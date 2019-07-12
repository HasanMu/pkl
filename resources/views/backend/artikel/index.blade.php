@extends('layouts.app')

@section('content')
@include('backend.artikel.modal')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Artikel</div>

                <div class="card-body">
                    <button type="button" class="btn btn-success tambah-artikel" data-toggle="modal" data-target="#create-artikel">Tambah</button>
                <p></p>
                    <table class="table dataTable">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Foto</th>
                                <th>Author</th>
                                <th>Kategori</th>
                                <th>Tag</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="data-artikel">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        $('.dataTable').dataTable({
            dataType: 'json',
            ajax: {
                url: '/api/artikel/',
                dataType: "json",
                type: "GET",
                stateSave : true,
                serverSide: true,
                processing: true,
            },
            responsive: true,
            columns: [
                {data: 'judul', name: 'judul'},
                {data: 'foto', render :  function(foto){
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
                                     data-id="${id}">Edit</button>
                                 <button
                                     type="button"
                                     class="btn btn-danger h-artikel"
                                     data-id="${id}">Hapus</button>`
                }}
            ]
        })
    })
</script>
@endpush
