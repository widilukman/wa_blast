<!-- Modal -->
<div class="modal fade" id="modal-hapus-karyawan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body hapusKaryawan" id="modalHapusKaryawan">
                <form action="../functions/hapusKaryawan.php" method="POST">
                    <input type="hidden" name="nopol_karyawan" id="nopol_karyawan">
                    <input type="hidden" name="id_karyawan" id="id_karyawan">
                    <div class="d-flex justify-content-center">
                        <p style="font-size: medium; text-align:center;">
                        <br><b style="color: red; font-size:large;">Peringatan!</b>
                        <br> Anda juga akan menghapus data dalam inventaris kendaraan.
                        <br>Apakah anda yakin ingin menghapus data ini?</p>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="d-flex justify-content-center">
                        <div class="col d-flex justify-content-end mr-4">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                        <div class="col">
                            <button type="submit" name="hapusKaryawan" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>