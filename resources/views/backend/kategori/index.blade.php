@extends('layouts.app')

@section('content')
@include('backend.kategori.modal')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Kategori</div>

                <div class="card-body">
                    <div id="body-category"></div>
                        <input class="form-control inputKategori" type="text" name="inputKategori">
                    <p></p>
                    <button type="button" class="btn btn-success tambah">Tambah</button>
                <p></p>
                    <table class="table dataTable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="data-kategori">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
