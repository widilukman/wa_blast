<!-- Modal -->
<div class="modal fade" id="modal-tambah-karyawan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTambahLabel">Tambah Data Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body tambahKaryawan" id="modalTambahKaryawan">
                <form action="../functions/tambahKaryawan.php" method="POST">
                    <div class="form-group">
                        <label for="tambah_nama_karyawan">Nama</label>
                        <input type="text" class="form-control" name="nama_karyawan" id="tambah_nama_karyawan" required>
                    </div>
                    <div class="form-group">
                        <label for="tambah_telp_karyawan">No. Telepon</label>
                        <input type="number" class="form-control" name="no_telp_karyawan" id="tambah_telp_karyawan" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="tambahKaryawan" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>