@extends('layouts.app')

@section('content')
@include('backend.tag.modal')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Tag</div>

                <div class="card-body">
                    <div id="body-artikel"></div>
                        <input class="form-control inputTag" type="text" name="inputTag">
                    <p></p>
                    <button type="button" class="btn btn-success tambah-artikel">Tambah</button>
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
