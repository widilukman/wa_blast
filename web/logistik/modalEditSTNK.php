<!-- Modal -->
<div class="modal fade" id="modal-edit-stnk" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalStnkLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalStnkLabel">Edit Info STNK</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body STNK" id="modalSTNK">
                <form action="../../functions/updateSTNK.php" method="POST">
                    <div class="form-group">
                            <label for="nopol-stnk">Nopol</label>
                        <input type="text" class="form-control" name="nopol" id="nopol-stnk" readonly>
                    </div>
                    <div class="form-group">
                        <label for="holder-stnk">Holder</label>
                        <input type="text" class="form-control" name="holder" id="holder-stnk" required>
                    </div>
                    <div class="form-group">
                        <label for="tenggat_1thn">Tenggat STNK 1 Tahun</label>
                        <input type="date" class="form-control" name="tgl_stnk_1_thn" id="tenggat_1thn" required>
                    </div>
                    <div class="form-group">
                        <label for="tenggat_5thn">Tenggat STNK 5 Tahun</label>
                        <input type="date" class="form-control" name="tgl_stnk_5_thn" id="tenggat_5thn" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="updateSTNK" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>