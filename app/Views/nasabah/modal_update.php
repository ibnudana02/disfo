<div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Update Data Nasabah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Identitas Nasabah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Pasangan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Jaminan</a>
                            </li>
                        </ul>
                    </div>
                    <?php echo form_open(base_url('nasabah/save'), ['id' => 'tambah_nasabah']) ?>
                    <div class="card-body pb-0">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. ID</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="id" id="id">
                                        <input type="text" class="form-control" name="nsb_noid" id="noid" placeholder="No ID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nsb_nm" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nsb_tplahir" placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tgl Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="nsb_tgllahir" value="2000-01-05">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="row pl-2 pt-2">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label"><input class="form-check-input" type="radio" value="L" name="nsb_sex"> Laki-laki</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label"><input class="form-check-input" type="radio" value="P" name="nsb_sex"> Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="nsb_alamat" id="nsb_alamat" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. HP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nsb_hp" placeholder="No. HP">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nm_pas" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tp_lahir_pas" placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tgl Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tgl_lahir_pas" placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. Identitas</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="noid_pas" placeholder="No. Identitas">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="row pl-2 pt-2">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label"><input class="form-check-input" type="radio" value="L" name="sex_pas"> Laki-laki</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label"><input class="form-check-input" type="radio" value="P" name="sex_pas"> Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat_pas" id="alamat_pas" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kerja_pas" placeholder="Pekerjaan">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nm_penjamin" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tp_lahir_penjamin" placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tgl Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tgl_lahir_penjamin" placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. Identitas</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="noid_penjamin" placeholder="No. Identitas">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="row pl-2 pt-2">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label"><input class="form-check-input" type="radio" value="L" name="sex_penjamin"> Laki-laki</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label"><input class="form-check-input" type="radio" value="P" name="sex_penjamin"> Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat_add" id="alamat_penjamin" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. HP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="no_hp_penjamin" placeholder="No. HP">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>