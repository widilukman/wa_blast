<!-- Modal -->
<div class="modal fade" id="modal-hapus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalHapus">
                <form action="../../functions/delete.php" method="POST">
                    <input type="hidden" name="nopol" id="nopolHapus">
                    <div class="d-flex justify-content-center">
                        <p style="font-size: medium;">Apakah anda yakin ingin menghapus data ini?</p>
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
                            <button type="submit" name="hapusData" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>