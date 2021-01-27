<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Info Servis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalServis">
                <form action="../functions/updateServis.php" method="POST">
                    <input type="hidden" name="nopol" id="nopol">
                    <div class="form-group">
                        <label for="holder">Holder</label>
                        <input type="text" class="form-control" name="holder" id="holder">
                    </div>
                    <div class="form-group">
                        <label for="km_terbaru">KM Terbaru</label>
                        <input type="text" class="form-control" name="km_terbaru" id="km_terbaru">
                    </div>
                    <div class="form-group">
                        <label for="km_servis">Servis pada KM</label>
                        <input type="text" class="form-control" name="servis_pada_km" id="km_servis">
                    </div>
                    <div class="form-group">
                        <label for="servis_berikutnya">Tanggal Servis Selanjutnya</label>
                        <input type="date" class="form-control" name="tgl_servis_berikutnya" id="servis_berikutnya">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updateServis" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>