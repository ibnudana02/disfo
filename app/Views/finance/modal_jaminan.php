<div class="modal fade" id="jaminan" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jaminan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="save_jaminan">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Jaminan</label>
                        <div class="col-sm-9">
                            <input type="hidden" name="no_akad" id="no_akad">
                            <select name="jnsjamin" id="jnsjamin" class="form-control">
                                <option value="">Pilih</option>
                                <?php foreach ($jenisjamin as $by) : ?>
                                    <option value="<?= $by->id ?>" <?php echo set_select('jnsjamin', $by->id) ?>><?= $by->jenis ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Masa Berlaku</label>
                        <div class="col-sm-9">
                            <input type="date" name="expjaminan" id="expjaminan" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Pengikatan</label>
                        <div class="col-sm-9">
                            <select name="jenisikat" id="jenisikat" class="form-control">
                                <option value="">Pilih</option>
                                <?php foreach ($jenisikat as $by) : ?>
                                    <option value="<?= $by->id ?>" <?php echo set_select('jenisikat', $by->id) ?>><?= $by->jenis_ikat ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jaminan</label>
                        <div class="col-sm-9">
                            <textarea name="jaminan" id="jaminan" class="form-control" cols="30" rows="2"><?= old('jaminan') ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nilai Penjaminan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control currency" name="nilaipenjaminan" placeholder="0.00" value="<?= old('nilaipenjaminan') ?>">
                        </div>
                    </div>
                </form>
                <div>
                    <button class="btn btn-primary" id="simpan_jaminan">Simpan</button>
                    <div class="float-right">
                        <span id="objaminan"></span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="jaminanTable" class="table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>Jenis Jaminan</th>
                                <th>Pengikatan</th>
                                <th>Jaminan</th>
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