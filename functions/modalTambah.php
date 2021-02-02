<!-- Modal -->
<div class="modal fade" id="modal-tambah-data" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body tambah" id="modalTambah">
                <form action="../functions/tambahData.php" method="POST">
                    <div class="form-group">
                        <label for="nopol-tambah">Nopol</label>
                        <input type="text" class="form-control" name="nopol" id="nopol-tambah">
                    </div>
                    <div class="form-group">
                        <label for="jenis-kendaraan">Jenis Kendaraan</label>
                        <input type="text" class="form-control" name="jenis_kendaraan" id="jenis-kendaraan">
                    </div>
                    <div class="form-group">
                        <label for="tahun-kendaraan">Tahun Kendaraan</label>
                        <input type="text" class="form-control" name="thn_kendaraan" id="tahun-kendaraan">
                    </div>
                    <div class="form-group">
                        <label for="holder-tambah">Holder</label>
                        <input type="text" class="form-control" name="holder-tambah" id="holder-tambah" required>
                    </div>
                    <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <input type="text" class="form-control" name="wilayah" id="wilayah">
                    </div>
                    <div class="form-group">
                        <label for="stnk-1thn">Tenggat STNK 1 Tahun</label>
                        <input type="date" class="form-control" name="tgl_stnk_1_thn" id="stnk-1thn" required>
                    </div>
                    <div class="form-group">
                        <label for="stnk-5thn">Tenggat STNK 5 Tahun</label>
                        <input type="date" class="form-control" name="tgl_stnk_5_thn" id="stnk-5thn" required>
                    </div>
                    <div class="form-group">
                        <label for="servis-terakhir-tambah">Tanggal Servis Terakhir</label>
                        <input type="date" class="form-control" name="tgl_servis_terakhir" id="servis-terakhir-tambah" required>
                    </div>
                    <div class="form-group">
                        <label for="servis-ke">Servis Ke-</label>
                        <input type="number" class="form-control" name="servis_ke" id="servis-ke" required>
                    </div>
                    <div class="form-group">
                        <label for="km_terbaru_tambah">KM Terbaru</label>
                        <input type="number" class="form-control" name="km_terbaru" id="km_terbaru_tambah" required>
                    </div>
                    <div class="form-group">
                        <label for="km_servis_tambah">Servis pada KM</label>
                        <input type="number" class="form-control" name="servis_pada_km" id="km_servis_tambah" required>
                    </div>
                    <div class="form-group">
                        <label for="servis_berikutnya_tambah">Tanggal Servis Selanjutnya</label>
                        <input type="date" class="form-control" name="tgl_servis_berikutnya" id="servis_berikutnya_tambah" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="tambahData" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>