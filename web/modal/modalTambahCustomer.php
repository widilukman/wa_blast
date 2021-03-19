<!-- Modal -->
<div class="modal fade" id="modal-tambah-customer" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTambahLabel">Tambah Data Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body tambahCustomer" id="modalTambahCustomer">
                <form action="../functions/tambahCustomer.php" method="POST">
                    <div class="form-group">
                        <label for="tambah_nama_customer">Nama</label>
                        <input type="text" class="form-control" name="nama_customer" id="tambah_nama_customer" required>
                    </div>
                    <div class="form-group">
                        <label for="tambah_telp_customer">No. Telepon</label>
                        <input type="number" class="form-control" name="no_telp_customer" id="tambah_telp_customer" required>
                    </div>
                    <div class="form-group">
                        <label for="tambah_alamat_customer">Alamat</label>
                        <input type="text" class="form-control" name="alamat_customer" id="tambah_alamat_customer" required>
                    </div>
                    <div class="form-group">
                        <label for="tambah_hut_customer">Tanggal Ulang Tahun</label>
                        <input type="date" class="form-control" name="hut_customer" id="tambah_hut_customer" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="tambahCustomer" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>