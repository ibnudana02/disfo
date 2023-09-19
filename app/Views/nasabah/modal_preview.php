<div class="modal fade" id="preview" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Preview Data Nasabah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="nasabah-tab" data-toggle="pill" href="#nasabah" role="tab" aria-controls="nasabah" aria-selected="true">Identitas Nasabah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pasangan-tab" data-toggle="pill" href="#pasangan" role="tab" aria-controls="pasangan" aria-selected="false">Pasangan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body pb-0">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <div class="tab-pane fade show active" id="nasabah" role="tabpanel" aria-labelledby="nasabah-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">CIF</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="golcust">
                                        <input type="text" class="form-control" name="nocif" id="nocif" placeholder="No. CIF" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nsb_noid" id="noid" placeholder="No ID" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nsb_nm" placeholder="Nama" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nsb_tplahir" placeholder="Tempat Lahir" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tgl Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="nsb_tgllahir" value="2000-01-05" required>
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
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Status Menikah</label>
                                    <div class="col-sm-9">
                                        <select name="nsb_menikah" id="nsb_menikah" class="form-control">
                                            <option value="">Pilih Status Pernikahan</option>
                                            <option value="L">Belum Menikah</option>
                                            <option value="K">Menikah</option>
                                            <option value="D">Duda/Janda</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat sesuai KTP</label>
                                    <div class="col-sm-9">
                                        <textarea name="nsb_alamat" id="nsb_alamat" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="nsb_dom">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat Domisili</label>
                                        <div class="col-sm-9">
                                            <textarea name="nsb_domisili" id="nsb_domisili" cols="30" rows="2" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <select name="nsb_agama" id="nsb_agama" class="form-control">
                                            <option value="">Pilih Agama</option>
                                            <?php foreach ($agama as $key => $ag) : ?>
                                                <option value="<?= $ag->id ?>"><?= $ag->agama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. HP</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="nsb_hp" placeholder="No. HP">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. Rekening</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="nsb_tab" placeholder="No. Rekening">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nsb_kerja" placeholder="Pekerjaan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat Kantor/Usaha</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamatktr_nsb" id="alamatktr_nsb" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pasangan" role="tabpanel" aria-labelledby="pasangan-tab">
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
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat Kantor/Usaha</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamatktr_pas" id="alamatktr_pas" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>