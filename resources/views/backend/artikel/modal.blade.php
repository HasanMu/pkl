<!-- Modal -->
<div class="modal fade" id="create-artikel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="my-input">judul</label>
                    <input id="my-input" class="form-control" type="text" name="judul">
                </div>
                <div class="form-group">
                    <label for="my-textarea">Konten</label>
                    <textarea id="my-textarea" class="form-control" name="konten" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" class="form-control-file" name="foto" id="foto" placeholder="" aria-describedby="foto">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="custom-select" name="kategori" id="kategori">
                        <option selected>Pilih kategori</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-select">Tag</label>
                    <select id="my-select" class="custom-select" name="tag[]" multiple>
                        <option>Text</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>