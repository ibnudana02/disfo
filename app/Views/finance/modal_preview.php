<div class="modal fade" id="preview" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="headerModal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(base_url('financing/update'), ['id' => 'update_finance']) ?>
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
                                <a class="nav-link" id="lain-lain-tab" data-toggle="pill" href="#lain-lain" role="tab" aria-controls="lain-lain" aria-selected="false">Nominal</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body pb-0">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. Surat</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="no_surat" id="no_surat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. Akad</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="no_akad" id="no_akad">
                                    </div>
                                </div>
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
                                <div id="akadwakalah">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Akad Wakalah</label>
                                        <div class="row pl-2 pt-2">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <label class="form-check-label"><input class="form-check-input" type="radio" value="Y" name="wakalah" <?= set_radio('wakalah', 'Y') ?>> YA</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <label class="form-check-label"><input class="form-check-input" type="radio" value="N" name="wakalah" <?= set_radio('wakalah', 'N') ?>> TIDAK</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tgl Akad</label>
                                    <div class="col-sm-9">
                                        <input type="date" data-date="" data-date-format="DD/MM/YYYY" class="form-control" name="tgl_akad" id="tgl_akad" value="<?= old('tgl_akad') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Waktu Akad</label>
                                    <div class="col-sm-9">
                                        <input type="time" class="form-control" name="jam_akad" id="jam_akad" value="<?= old('jam_akad') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Notaris</label>
                                    <div class="col-sm-9">
                                        <select name="notaris" id="notaris" class="form-control">
                                            <option value="">Pilih Notaris</option>
                                            <?php foreach ($notaris as $key => $nt) : ?>
                                                <option value="<?= $nt['id'] ?>" <?php echo set_select('notaris', $nt['id']) ?>><?= strtoupper($nt['nm_notaris']) ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Account Officer</label>
                                    <div class="col-sm-9">
                                        <select name="kodeao" id="kodeao" class="form-control">
                                            <option value="0">Pilih AO</option>
                                            <?php foreach ($ao as $key => $pd) : ?>
                                                <option value="<?= $pd['id'] ?>" <?php echo set_select('kodeao', $pd['id']) ?>><?= strtoupper($pd['nm_ao']) ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Saksi</label>
                                    <div class="col-sm-9">
                                        <select name="saksi" id="saksi" class="form-control">
                                            <option value="0">Pilih Saksi</option>
                                            <?php foreach ($users as $key => $pd) : ?>
                                                <option value="<?= $pd['id'] ?>" <?php echo set_select('saksi', $pd['id']) ?>><?= strtoupper($pd['name']) ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tujuan Pembiayaan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="tujuan_pemb" id="tujuan_pemb" cols="30" rows="2"><?= set_value('tujuan_pemb') ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Objek Pembiayaan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="objek_pemb" id="objek_pemb" cols="30" rows="2"><?= set_value('objek_pemb') ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Catatan Komite</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="catatan" id="catatan" cols="30" rows="2"><?= set_value('catatan') ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="biaya-biaya" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                <div id="dynamic_form_by_l">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="biaya-notaris" role="tabpanel" aria-labelledby="biaya-notaris-tab">
                                <div id="dynamic_form_by_n">
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
            <div class="modal-footer" id="btn-cetak">
                <!-- <a href="javascript:void(0)" id="sp3" data-sp3="0" class="btn btn-info sp3">SP3</a> -->
                <a href="javascript:void(0)" id="sp3_nasabah" data-sp3="0" class="btn btn-primary sp3">SP3</a>
                <a href="javascript:void(0)" id="esensilia" data-esensilia="" class="btn btn-info esensilia">Esensilia</a>
                <a href="javascript:void(0)" id="up3" data-up3="" class="btn btn-info up3">UP3</a>
                <a href="javascript:void(0)" id="memo" data-memo="" class="btn btn-info memo">Internal Memo</a>
                <a href="javascript:void(0)" id="blokir" data-blokir="" class="btn btn-info blokir">Blokir Dana</a>
                <a href="javascript:void(0)" id="surat_kuasa" data-surat_kuasa="" class="btn btn-info surat_kuasa">Surat Kuasa</a>
                <a href="javascript:void(0)" id="asuransi_jiwa" data-asuransi_jiwa="" class="btn btn-info asuransi_jiwa">As Jiwa</a>
                <a href="javascript:void(0)" id="asuransi_jaminan" data-asuransi_jaminan="" class="btn btn-info asuransi_jaminan">As Jaminan</a>
                <a href="javascript:void(0)" id="bukti_terima" data-bukti_terima="" class="btn btn-info bukti_terima">Bukti Terima</a>
                <a href="javascript:void(0)" id="serah_terima" data-serah_terima="" class="btn btn-info serah_terima">Serah Terima</a>
                <a href="javascript:void(0)" id="sanggup_bayar" data-sanggup_bayar="" class="btn btn-info sanggup_bayar">Sanggup Bayar</a>
                <a href="javascript:void(0)" id="tanda_terima" data-tanda_terima="" class="btn btn-info tanda_terima">Tanda Terima</a>
                <a href="javascript:void(0)" id="absensi" data-absensi="" class="btn btn-info absensi">Absensi</a>
                <a href="javascript:void(0)" id="akad" data-akad="" class="btn btn-info akad">Akad</a>
            </div>
        </div>
    </div>
</div>

<script>
    $("#date").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format(this.getAttribute("data-date-format"))
        )
    }).trigger("change")
</script>