<!-- Modal -->
<div class="modal fade" id="modal-edit-customer" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalCustomerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalCustomerLabel">Edit Info Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body Customer" id="modalCustomer">
                <form action="../functions/updateCustomer.php" method="POST">
                    <input type="hidden" name="id_customer" id="id-customer">
                    <div class="form-group">
                            <label for="nama-customer">Nama</label>
                        <input type="text" class="form-control" name="nama_customer" id="nama-customer" required>
                    </div>
                    <div class="form-group">
                        <label for="telp-customer">No. Telepon</label>
                        <input type="number" class="form-control" name="telp_customer" id="telp-customer" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat-customer">Alamat</label>
                        <input type="text" class="form-control" name="alamat_customer" id="alamat-customer" required>
                    </div>
                    <div class="form-group">
                        <label for="hut-customer">Tanggal Ulang Tahun</label>
                        <input type="date" class="form-control" name="hut_customer" id="hut-customer" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="updateCustomer" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>