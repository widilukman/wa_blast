<!-- Modal -->
<div class="modal fade" id="modal-hapus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalHapus">
                <form action="../functions/delete.php" method="POST">
                        <input type="hidden" name="nopol" id="nopolHapus">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="hapusData" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>