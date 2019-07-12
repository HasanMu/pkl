<!-- Modal -->
<div class="modal fade" id="create-artikel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-create-artikel" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Artikel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="my-input">judul</label>
                        <input id="my-input" class="form-control judul" type="text" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="my-textarea">Konten</label>
                        <textarea id="my-textarea" class="form-control konten" name="konten" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control-file foto" name="foto" id="foto" placeholder="" aria-describedby="foto">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="custom-select kategori" name="kategori" id="kategori">
                            <option selected>Pilih kategori</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="my-select">Tag</label>
                        <select class="form-control tag" name="tag[]" width="100%" multiple></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary simpan-artikel">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit-artikel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-edit-artikel" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Artikel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="my-input">judul</label>
                        <input id="my-input" class="form-control e-judul" type="text" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="my-textarea">Konten</label>
                        <textarea id="my-textarea" class="form-control e-konten" name="konten" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file e-foto" name="foto" id="foto" placeholder="" aria-describedby="foto">
                        <img src="/assets/backend/artikel/img/" class="e-prev-foto" width="150px" height="150px">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="custom-select e-kategori" name="kategori" id="kategori">
                            <option selected>Pilih kategori</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="my-select">Tag</label>
                        <select class="form-control e-tag" name="tag[]" multiple></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary ubah-artikel">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
