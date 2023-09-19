<?= $this->extend('layout\template') ?>
<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Pencarian Nasabah Existing</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_nasabah" placeholder="Nama Nasabah">
                            </div>
                            <div class="col-sm">
                                <button type="submit" class="btn btn-info" id="cari">Cari</button>
                            </div>
                        </div>
                        <div id="hasil" class="pt-3">
                            <table id="nasabah" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>CIF</th>
                                        <th>Nama</th>
                                        <th>No. ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7">
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
                                <a class="nav-link" id="pengurus-tab" data-toggle="pill" href="#pengurus" role="tab" aria-controls="pengurus" aria-selected="false">Pengurus</a>
                            </li>
                        </ul>
                    </div>
                    <?php echo form_open(base_url('nasabah/save'), ['id' => 'tambah_nasabah']) ?>
                    <div class="card-body pb-0">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">CIF</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="golcust">
                                        <input type="text" class="form-control" value="<?= set_value('nocif') ?>" name="nocif" id="nocif" placeholder="No. CIF" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?= set_value('nsb_noid') ?>" name="nsb_noid" id="noid" placeholder="No ID" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?= set_value('nsb_nm') ?>" name="nsb_nm" placeholder="Nama" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?= set_value('nsb_tplahir') ?>" name="nsb_tplahir" placeholder="Tempat Lahir" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tgl Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" value="<?= set_value('nsb_tgllahir') ?>" name="nsb_tgllahir" value="2000-01-05" required>
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
                                        <textarea name="nsb_alamat" id="nsb_alamat" cols="30" rows="2" class="form-control"><?= set_value('nsb_alamat') ?></textarea>
                                    </div>
                                </div>
                                <div class="nsb_dom">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat Domisili</label>
                                        <div class="col-sm-9">
                                            <textarea name="nsb_domisili" id="nsb_domisili" cols="30" rows="2" class="form-control"><?= set_value('nsb_domisili') ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <select name="nsb_agama" id="nsb_agama" class="form-control">
                                            <option value="">Pilih Agama</option>
                                            <?php foreach ($agama as $key => $ag) : ?>
                                                <option value="<?= $ag->id ?>" <?= set_select('nsb_agama', $ag->id) ?>><?= $ag->agama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. HP</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="nsb_hp" value="<?= set_value('nsb_hp') ?>" placeholder="No. HP">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. Rekening</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="nsb_tab" value="<?= set_value('nsb_tab') ?>" placeholder="No. Rekening">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nsb_kerja" value="<?= set_value('nsb_kerja') ?>" placeholder="Pekerjaan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat Kantor/Usaha</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamatktr_nsb" id="alamatktr_nsb" cols="30" rows="2" class="form-control"></textarea>
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
                                <div class="pas_dom">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat Domisili</label>
                                        <div class="col-sm-9">
                                            <textarea name="domisili_pas" id="domisili_pas" cols="30" rows="2" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. HP</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="hp_pas" value="<?= set_value('hp_pas') ?>" placeholder="No. HP">
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
                            <div class="tab-pane fade" id="pengurus" role="tabpanel" aria-labelledby="pengurus-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">NIB</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="nib" placeholder="NIB">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Bidang Usaha</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="bidang_usaha" placeholder="Bidang Usaha">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. Akta Pendirian</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="no_akta" placeholder="No. Akta Pendirian">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tgl Pengesahan</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tgl_sah" placeholder="Tanggal Pengesahan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nm_pj" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tp_lahir_pj" placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tgl Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tgl_lahir_pj" placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. Identitas</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="noid_pj" placeholder="No. Identitas">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat_pj" id="alamat_pj" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat Domisili</label>
                                    <div class="col-sm-9">
                                        <textarea name="domisili_pj" id="domisili_pj" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jabatan_pj" placeholder="Jabatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. HP Pengurus</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="hp_pj" placeholder="HP Pengurus">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                            <button type="button" id="clear" class="btn btn-danger"> Reset</button>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url('plugins/moment/moment-with-locales.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var base_url = "<?= base_url('nasabah/') ?>";
        const delay = (function() {
            var timer = 0;
            return function(callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();

        function reset_form() {
            $('#tambah_nasabah').trigger("reset");
            $('#tambah_nasabah')[0].reset();
        }

        $("#clear").on("click", function() {
            $('#tambah_nasabah').trigger("reset");
        })

        var m = moment();

        $("#nocif").bind("paste", function(e) {
            var nocif = e.originalEvent.clipboardData.getData('text');
            delay(function() {
                $.ajax({
                    url: base_url + "detailCore",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        nocif: nocif
                    },
                    success: function(data) {
                        console.log(data.data);
                        if (data.status) {
                            $("#nocif").blur();
                            var obj = data.data;
                            var no_id = (obj.golcust == 'B') ? obj.npwp : obj.noid;
                            // console.log(no_id);
                            $('[name="nsb_noid"]').val(no_id);
                            $('[name="golcust"]').val(obj.golcust);
                            $('[name="nsb_nm"]').val(obj.nama);
                            $('[name="nsb_tplahir"]').val(obj.tmplhr);
                            $('[name="nsb_tgllahir"]').val(moment(data.data.tgllhr).format("YYYY-MM-DD"));
                            $('[name="nsb_alamat"]').val(obj.alamat);
                            $('[name="nsb_hp"]').val("0" + parseInt(data.data.hp));
                            $('[name="nsb_tab"]').val(parseInt(data.data.notab));
                            $('#nsb_sex').prop('checked', 'true');
                            $('input[name="nsb_sex"][value="' + obj.sex + '"]').prop('checked', true);
                            $('select[name="nsb_menikah"] option[value="' + data.data.stskawin + '"]').attr('selected', 'selected');
                        } else {
                            Swal.fire({
                                title: 'Warning',
                                text: "Data Nasabah tidak ditemukan. Pastikan nasabah sudah membuka rekening tabungan terlebih dahulu!",
                                icon: 'warning',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            })
                        }
                    }
                });
            }, 100)
        });

        table = $('#nasabah');
        reset();

        function reset() {
            $("#hasil").hide();
            table.DataTable().destroy();
        }

        $("#cari").on("click", function() {
            var nama = $('[name="nama_nasabah"]').val();
            if (nama != '') {
                $.ajax({
                    url: base_url + "find",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        nama: nama
                    },
                    success: function(res) {
                        $("#hasil").show();
                        table.DataTable({
                            data: res.data,
                            columns: [{
                                data: 'cif'
                            }, {
                                data: 'nama',
                                className: 'text-center'
                            }, {
                                data: 'noid',
                                className: 'text-center'
                            }],
                            order: [
                                [1, 'asc']
                            ],
                            paging: false,
                            info: false,
                            scrollY: "200px",
                            scrollCollapse: true,
                            searching: false,
                            // autoWidth: true
                        }).columns.adjust();
                    }
                });
            } else {
                Swal.fire({
                    title: 'Warning',
                    text: "Nama Nasabah harus diisi!",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                })
            }
        });
        $('[name="nama_nasabah"]').focus(function() {
            reset();
        });
        $('[name="nocif"]').focus(function() {
            reset_form();
        });
    });
</script>
<?= $this->endSection() ?>