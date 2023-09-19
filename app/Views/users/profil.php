<?= $this->extend('layout\template') ?>

<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <?php if ($myProfil->image == '') : ?>
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('uploads/user/default.png') ?>" alt="User profile picture">
                            <?php else : ?>
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('uploads/user/' . $myProfil->image) ?>" alt="User profile picture">
                            <?php endif ?>
                        </div>

                        <h3 class="profile-username text-center"><?= $myProfil->name ?></h3>

                        <p class="text-muted text-center">
                            <?= $myProfil->role ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Username</b> <a class="float-right"><?= $myProfil->username ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Joined Date</b> <a class="float-right"><?= date("d F Y", strtotime($myProfil->created_at)) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>email</b> <a class="float-right"><?= $myProfil->email ?></a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-success btn-block"><b></b></a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                            <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <?= form_open_multipart('profil/update') ?>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="id" value="<?= $myProfil->id ?>">
                                        <input type="text" class="form-control" name="name" value="<?= $myProfil->name ?>" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">No Identitas</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="nik" value="<?= $myProfil->nik ?>" placeholder="NIK">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tp_lahir" value="<?= $myProfil->tp_lahir ?>" placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $myProfil->tgl_lahir ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" value="<?= $myProfil->email ?>" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" class="form-control" id="" cols="30" rows="2"><?= $myProfil->alamat ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">No HP</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="no_hp" value="<?= $myProfil->no_hp ?>" placeholder="No. HP">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customFile" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="customFile">
                                            <input type="hidden" name="old_image" value="<?= $myProfil->image ?>">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            </div>
                            <div class="tab-pane" id="password">
                                <?= form_open('profil/change_password') ?>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_baru" placeholder="Password Baru">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_conf" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url() ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
<?= $this->endSection() ?>