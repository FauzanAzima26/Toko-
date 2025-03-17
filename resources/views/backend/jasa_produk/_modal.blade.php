<div class="modal fade" id="jasaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jasa/Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formJasa">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="jasa_produk" class="form-label">Nama Jasa/Produk</label>
                            <input type="text" class="form-control" id="jasa_produk" name="jasa_produk" required>
                        </div>
                        <div class="col">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <img id="imagePreview" src="" alt="Preview Gambar" class="img-fluid mt-2"
                        style="max-height: 150px; display: none;">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="formJasa" class="btn btn-primary btnSubmit">Simpan</button>
            </div>
        </div>
    </div>
</div>