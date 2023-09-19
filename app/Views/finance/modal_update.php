<div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Perubahaan Pembiayaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Data Pembiayaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="biaya-notaris-tab" data-toggle="pill" href="#biaya-notaris" role="tab" aria-controls="biaya-notaris" aria-selected="false">Biaya Notaris</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="biaya-biaya-tab" data-toggle="pill" href="#biaya-biaya" role="tab" aria-controls="biaya-biaya" aria-selected="false">Biaya-Biaya</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="lain-lain-tab" data-toggle="pill" href="#lain-lain" role="tab" aria-controls="lain-lain" aria-selected="false">Lain-lain</a>
                            </li>
                        </ul>
                    </div>
                    <?= form_open(base_url('financing/update'), ['id' => 'tambah']) ?>
                    <div class="card-body pb-0">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="noid" id="noid" placeholder="No. ID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama" readonly placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Produk</label>
                                    <div class="col-sm-9">
                                        <select name="id_produk" id="id_produk" class="form-control">
                                            <option value="0">Pilih Produk</option>
                                            <?php foreach ($produk as $key => $pd) : ?>
                                                <option value="<?= $pd['kdprd'] ?>"><?= strtoupper($pd['ket']) ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. Kontrak</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="nokontrak" id="nokontrak" placeholder="No. Kontrak">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tujuan Pemb.</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="tujuan_pemb" id="tujuan_pemb" cols="30" rows="2"><?= set_value('tujuan_pemb') ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="biaya-biaya" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                <div id="dynamic_form_by_l">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Plafond</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control currency" name="plafond" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="biaya-notaris" role="tabpanel" aria-labelledby="biaya-notaris-tab">
                                <div id="dynamic_form_by_n">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Plafond</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control currency" name="plafond" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="lain-lain" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Plafond</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="plafond" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Margin Bank</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="mgn_bank" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Margin/Bulan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control numeric" name="margin" placeholder="0.0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jangka Waktu</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control numeric" name="jk_waktu" placeholder="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Angsuran/Bulan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="ags_bln" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Angsuran Terakhir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="ags_akhir" placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer footer-data">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>