<!-- Modal -->
<div class="modal fade" id="modal-edit-karyawan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalKaryawanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalKaryawanLabel">Edit Info Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body Karyawan" id="modalKaryawan">
                <form action="../functions/updateKaryawan.php" method="POST">
                    <input type="hidden" name="nopol" id="nopol-karyawan">
                    <input type="hidden" name="id_karyawan" id="id-karyawan">
                    <div class="form-group">
                            <label for="nama-karyawan">Nama</label>
                        <input type="text" class="form-control" name="nama_karyawan" id="nama-karyawan" required>
                    </div>
                    <div class="form-group">
                        <label for="telp-karyawan">No. Telepon</label>
                        <input type="number" class="form-control" name="telp_karyawan" id="telp-karyawan" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="updateKaryawan" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>