<div class="modal fade" id="penjamin" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pemilik Jaminan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="in_jaminan">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">No. ID</label>
                        <div class="col-sm-9">
                            <input type="hidden" name="no_akad">
                            <input type="hidden" id="nsb_id">
                            <input type="number" class="form-control" name="nik_pem" id="nik_pem" placeholder="No. ID">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nm_pem" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tplahir_pem" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="tgllahir_pem" placeholder="Tangga Lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">No. Handphone</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="hp_pem" placeholder="No Handphone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Hubungan Kepemilikan</label>
                        <div class="col-sm-9">
                            <input type="text" name="hub_pem" id="hub_pem" class="form-control" placeholder="Hubungan Kepemilikan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="alamat_pem" id="alamat_pem" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                </form>
                <div>
                    <button class="btn btn-primary" id="simpan_penjamin">Simpan</button>
                    <div class="float-right">
                        <span id="objaminan"></span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="pemtable" class="table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>No. ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>