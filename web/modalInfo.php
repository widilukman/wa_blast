<!-- Modal -->
<div class="modal fade" id="modal-info-karyawan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalInfoKaryawanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalInfoKaryawanLabel">Info Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body infoKaryawan" id="modalInfoKaryawan">
                <form action="../functions/updateKaryawan.php" method="POST">
                    <div class="form-group">
                            <label for="nama-karyawan">Nama</label>
                        <input type="text" class="form-control" name="nama_karyawan" id="nama-karyawan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="telp-karyawan">No. Telepon</label>
                        <input type="text" class="form-control" name="telp_karyawan" id="telp-karyawan" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>