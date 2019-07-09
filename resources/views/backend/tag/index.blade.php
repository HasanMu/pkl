@extends('layouts.app')

@section('content')
@include('backend.tag.modal')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Tag</div>

                <div class="card-body">
                    <div id="body-tag"></div>
                        <input class="form-control inputTag" type="text" name="inputTag">
                    <p></p>
                    <button type="button" class="btn btn-success tambah-tag">Tambah</button>
                <p></p>
                    <table class="table dataTable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="data-tag">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
