<?= $this->extend('layout\template') ?>

<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-68">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Konfigurasi</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('aplikasi/update')) ?>
                    <div class="card-body pb-0">
                        <div class="form-group">
                            <label for="customFile">Logo</label>
                            &nbsp;&nbsp;&nbsp;<small class="text-danger">Ukuran Logo Terbaik : 50 x 50 px</small>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="customFile">
                                <input type="hidden" name="old_image" value="<?= $app->logo ?>">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="nama_pt" value="<?= $app->nama_pt ?>" placeholder="Nama Perusahaan">
                            <input type="hidden" name="id_app" value="<?= $app->id ?>">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail3">Nama Aplikasi <small class="text-danger">(Singkat)</small></label>
                                    <input type="text" class="form-control" name="nm_aplikasi" value="<?= $app->nm_aplikasi ?>" placeholder="Nama Singkat">
                                    <input type="hidden" name="old_image" value="<?= $app->logo ?>">
                                </div>
                                <div class="col-md-8">
                                    <label for="inputEmail3">Nama Aplikasi <small class="text-danger">(Panjang)</small></label>
                                    <input type="text" class="form-control" name="fnama_aplikasi" value="<?= $app->fnama_aplikasi ?>" placeholder="Nama Panjang Aplikasi">
                                    <input type="hidden" name="old_image" value="<?= $app->logo ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3">Alamat Perusahaan </label>
                            <textarea name="alamat_pt" id="alamat_pt" cols="30" rows="2" class="form-control"><?= $app->alamat_pt ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputPassword3">Email Perusahaan</label>
                                    <input type="text" class="form-control" name="email" value="<?= $app->email_pt ?>" placeholder="Email Perusahaan">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword3">Telp Perusahaan</label>
                                    <input type="text" class="form-control" name="telp" value="<?= $app->telp_pt ?>" placeholder="Telp Perusahaan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3">API Jadwal Sholat </label>
                            <textarea name="api_jadwal_sholat" id="api_jadwal_sholat" cols="30" rows="2" class="form-control"><?= $app->api_jadwal_sholat ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url() ?>public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
<?= $this->endSection() ?>