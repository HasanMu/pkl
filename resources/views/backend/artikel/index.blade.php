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
