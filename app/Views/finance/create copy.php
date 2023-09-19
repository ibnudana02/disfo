<?= $this->extend('layout\template') ?>
<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Pencarian Nasabah</h3>
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
                                        <th>No ID</th>
                                        <th>Nama</th>
                                        <th>Tgl Lahir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
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
                                <a class="nav-link" id="funding-tab" data-toggle="pill" href="#funding" role="tab" aria-controls="funding" aria-selected="false">Blokir & Fund</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="lain-lain-tab" data-toggle="pill" href="#lain-lain" role="tab" aria-controls="lain-lain" aria-selected="false">Nominal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="jaminan-tab" data-toggle="pill" href="#jaminan" role="tab" aria-controls="jaminan" aria-selected="false">Jaminan</a>
                            </li>
                        </ul>
                    </div>
                    <?= form_open(base_url('financing/save'), ['id' => 'tambah']) ?>
                    <div class="card-body pb-0">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. Surat</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="no_surat" id="no_surat" value="<?= sprintf("%03s", $no_surat + 1) ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. Akad</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="no_akad" id="no_akad" value="<?= sprintf("%03s", $no_akad + 1) ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">No. ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="noid" id="noid" placeholder="No. ID" value="<?= old('noid') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama" readonly placeholder="Nama" value="<?= old('nama') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Fasilitas</label>
                                    <div class="col-sm-9">
                                        <select name="id_produk" id="id_produk" class="form-control" value="<?= old('id_produk') ?>">
                                            <option value="0">Pilih Fasilitas</option>
                                            <?php foreach ($produk as $key => $pd) : ?>
                                                <option value="<?= $pd['kdprd'] ?>" <?php echo set_select('id_produk', $pd['kdprd']) ?>><?= strtoupper($pd['ket']) ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
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
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tgl Akad</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tgl_akad" value="<?= old('tgl_akad') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Waktu Akad</label>
                                    <div class="col-sm-9">
                                        <input type="time" class="form-control" name="jam_akad" value="<?= old('jam_akad') ?>">
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
                                    <div class="row baru-data my-2">
                                        <div class="col-md-6">
                                            <select name="id_biaya_adm[]" id="biaya_adm" class="form-control">
                                                <option value="">Pilih</option>
                                                <?php foreach ($biaya_lain as $by) : ?>
                                                    <option value="<?= $by->id ?>" <?php echo set_select('id_biaya_adm[]', $by->id) ?>><?= $by->nm_biaya ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control currency" name="biaya_adm[]" placeholder="0.00" value="<?= old('biaya_adm[]') ?>">
                                        </div>
                                        <div class="button-group">
                                            <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>
                                            <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="biaya-notaris" role="tabpanel" aria-labelledby="biaya-notaris-tab">
                                <div id="dynamic_form_by_n">
                                    <div class="row baru-data my-2">
                                        <div class="col-md-6">
                                            <select name="id_biaya_notaris[]" id="biaya_notaris" class="form-control">
                                                <option value="">Pilih</option>
                                                <?php foreach ($biaya_notaris as $by) : ?>
                                                    <option value="<?= $by->id ?>" <?php echo set_select('id_biaya_notaris[]', $by->id) ?>><?= $by->nm_biaya ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control currency" name="biaya_notaris[]" placeholder="0.00" value="<?= old('biaya_notaris[]') ?>">
                                        </div>
                                        <div class="button-group">
                                            <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>
                                            <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="jaminan" role="tabpanel" aria-labelledby="jaminan-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Jaminan</label>
                                    <div class="col-sm-9">
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
                            </div>
                            <div class="tab-pane fade" id="funding" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tab Umroh</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="tabumroh" placeholder="0.00" value="<?= old('tabumroh') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Blokir Angsuran</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="blokirags" placeholder="0.00" value="<?= old('blokirangsuran') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Blokir Komite</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="blokirkomite" placeholder="0.00" value="<?= old('blokirkomite') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Cek Apsah Blokir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="cekapsah" placeholder="0.00" value="<?= old('cekapsah') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="lain-lain" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Besar Pengajuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="plafond" placeholder="0.00" value="<?= old('plafond') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Harga Pasar Jam.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="hargapasar" placeholder="0.00" value="<?= old('hargapasar') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Uang Muka (DP)</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="uangmuka" placeholder="0.00" value="<?= old('uangmuka') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Porsi Bank</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control currency" name="porsibank" placeholder="0.00" value="<?= old('porsibank') ?>">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control numeric" name="persenbank" placeholder="0.00" value="<?= old('persenbank') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Porsi Nasabah</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control currency" name="porsinsb" placeholder="0.00" value="<?= old('porsinsb') ?>">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control numeric" name="persennsb" placeholder="0.00" value="<?= old('persennsb') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Margin Bank</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="mgn_bank" placeholder="0.00" value="<?= old('mgn_bank') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Persentase Margin</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control numeric" name="margin" placeholder="0.0" value="<?= old('margin') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Pembayaran</label>
                                    <div class="col-sm-9">
                                        <select name="jenisbayar" id="jenisbayar" class="form-control">
                                            <option value="">Pilih</option>
                                            <?php foreach ($jenisbayar as $by) : ?>
                                                <option value="<?= $by['kdbayar'] ?>" <?php echo set_select('jenisbayar', $by['kdbayar']) ?>><?= $by['jnsbayar'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jangka Waktu</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control numeric" name="jk_waktu" placeholder="0" value="<?= old('jk_waktu') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Angsuran/Bulan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="ags_bln" placeholder="0.00" value="<?= old('ags_bln') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Angsuran Terakhir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" name="ags_akhir" placeholder="0.00" value="<?= old('ags_akhir') ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url('plugins/inputmask/inputmask.binding.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var base_url = '<?= base_url('financing/') ?>';
        const delay = (function() {
            var timer = 0;
            return function(callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();


        $("body .currency").inputmask({
            alias: "numeric",
            groupSeparator: ".",
            removeMaskOnSubmit: true
        });

        $(".currency").inputmask({
            alias: "numeric",
            groupSeparator: ".",
            removeMaskOnSubmit: true
        });

        $(".numeric").inputmask({
            alias: "numeric"
        });


        function reset_form() {
            $('#tambah').trigger("reset");
        }

        $("#noid").bind("paste", function(e) {
            var noid = e.originalEvent.clipboardData.getData('text');
            delay(function() {
                $.ajax({
                    url: base_url + "registered",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        noid: noid
                    },
                    success: function(data) {
                        $("#noid").blur();
                        if (data.status) {
                            console.log(data.data);
                            var res = data.data;
                            $('[name="nama"]').val(res.nsb_nm);
                        } else {
                            Swal.fire({
                                title: 'Warning',
                                text: "Data Nasabah tidak ditemukan. Periksa kembali No. ID!",
                                icon: 'warning',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            })
                        }
                    }
                });
            }, 100)
        });

        $('#noid').focus(function() {
            reset_form();
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
                                    data: 'nsb_noid',
                                },
                                {
                                    data: 'nsb_nm',
                                    className: 'text-center'
                                }, {
                                    data: 'nsb_tgllahir',
                                    className: 'text-center'
                                }
                            ],
                            order: [
                                [0, 'asc']
                            ],
                            paging: false,
                            info: false,
                            scrollY: "200px",
                            scrollCollapse: true,
                            searching: false,
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
        $('[name="noid"]').focus(function() {
            reset_form();
        });

        function addFormByNotaris() {
            var addrow = '<div class="row baru-data my-2">\
                    <div class="col-md-6">\
                        <select name="id_biaya_notaris[]" id="biaya_notaris" class="form-control">\
                            <option value="">Pilih</option>\
                            <?php foreach ($biaya_notaris as $by) : ?>\
                                <option value="<?= $by->id ?>"><?= $by->nm_biaya ?></option>\
                            <?php endforeach ?>\
                        </select>\
                    </div>\
                    <div class="col-md-4">\
                        <input type="text" class="form-control currency" name="biaya_notaris[]" placeholder="0.00">\
                    </div>\
                    <div class="button-group">\
                        <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>\
                        <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>\
                    </div>\
                </div>';
            $("#dynamic_form_by_n").append(addrow);
            $(".currency").inputmask({
                alias: "numeric",
                groupSeparator: ".",
                removeMaskOnSubmit: true
            });
        }

        $("#dynamic_form_by_n").on("click", ".btn-tambah", function() {
            addFormByNotaris()
            $(this).css("display", "none");
            var valtes = $(this).parent().find(".btn-hapus").css("display", "");
            var bykrow = $(".baru-data").length;
        });

        $("#dynamic_form_by_n").on("click", ".btn-hapus", function() {
            $(this).parent().parent('.baru-data').remove();
            var bykrow = $(".baru-data").length;
            if (bykrow == 1) {
                $(".btn-hapus").css("display", "none")
                $(".btn-tambah").css("display", "");
            } else {
                $('.baru-data').last().find('.btn-tambah').css("display", "");
            }
        });

        function addFormByLain() {
            var addrow = '<div class="row baru-data my-2">\
                    <div class="col-md-6">\
                        <select name="id_biaya_adm[]" id="biaya_adm" class="form-control">\
                            <option value="">Pilih</option>\
                            <?php foreach ($biaya_lain as $by) : ?>\
                                <option value="<?= $by->id ?>"><?= $by->nm_biaya ?></option>\
                            <?php endforeach ?>\
                        </select>\
                    </div>\
                    <div class="col-md-4">\
                        <input type="text" class="form-control currency" name="biaya_adm[]" placeholder="0.00">\
                    </div>\
                    <div class="button-group">\
                        <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i></button>\
                        <button type="button" class="btn btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>\
                    </div>\
                </div>';
            $("#dynamic_form_by_l").append(addrow);
            $(".currency").inputmask({
                alias: "numeric",
                groupSeparator: ".",
                removeMaskOnSubmit: true
            });
        }

        $("#dynamic_form_by_l").on("click", ".btn-tambah", function() {
            addFormByLain()
            $(this).css("display", "none");
            var valtes = $(this).parent().find(".btn-hapus").css("display", "");
            var bykrow = $(".baru-data").length;
        });

        $("#dynamic_form_by_l").on("click", ".btn-hapus", function() {
            $(this).parent().parent('.baru-data').remove();
            var bykrow = $(".baru-data").length;
            if (bykrow == 1) {
                $(".btn-hapus").css("display", "none")
                $(".btn-tambah").css("display", "");
            } else {
                $('.baru-data').last().find('.btn-tambah').css("display", "");
            }
        });
    });
</script>
<?= $this->endSection() ?>