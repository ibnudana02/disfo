<?= $this->extend('layout/template') ?>
<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?> </h3>
                    </div>
                    <?= form_open(base_url('baghas/save')) ?>
                    <div class="card-body">
                        <div id="dynamic_form">
                            <div class="row baru-data my-2">
                                <div class="col-md-3">
                                    <select name="produk[]" class="form-control select2">
                                        <option value="" selected='selected' disabled>Pilih</option>
                                        <?php foreach ($produk as $pd) : ?>
                                            <option value="<?= $pd['kdprd'] ?>" <?php echo set_select('produk[]', $pd['kdprd']) ?>><?= $pd['produk'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control numeric" name="nisbah_bank[]" placeholder="0.00">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control numeric" name="nisbah_nsb[]" placeholder="0.00">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control numeric" name="eq_rate[]" placeholder="0.00">
                                </div>
                                <div class="col-md-2">
                                    <input type="date" class="form-control" name="periode[]" placeholder="0.00">
                                </div>
                                <div class="button-group">
                                    <button type="button" class="btn btn-sm btn-success btn-tambah"><i class="fa fa-plus"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger btn-hapus" style="display:none;"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                            <a href="<?= base_url('users') ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url() ?>public/plugins/inputmask/jquery.inputmask.min.js"></script>
<script>
    var produk = '<?= json_encode($produk) ?>';
    $('.select2').select2({
        width: '100%'
    });
    $("#dynamic_form").on("click", ".btn-tambah", function() {
        addForm();
        $('#dynamic_form .select2').select2({
            width: '100%'
        });
        $(this).css("display", "none");
        var valtes = $(this).parent().find(".btn-hapus").css("display", "");
    });

    $("#dynamic_form").on("click", ".btn-hapus", function() {
        $(this).parent().parent('.baru-data').remove();
        var bykrow = $("#dynamic_form .baru-data").length;
        if (bykrow == 1) {
            $(".btn-hapus").css("display", "none")
            $(".btn-tambah").css("display", "");
        } else {
            $('#dynamic_form .baru-data').last().find('.btn-tambah').css("display", "");
        }
    });

    var opt_produk = '<option>Pilih</option>';
    const listProduk = JSON.parse(produk);
    for (let i = 0; i < listProduk.length; i++) {
        opt_produk += "<option value='" + listProduk[i].kdprd + "'>" + listProduk[i].produk + "</option><br>";
    }

    function addForm() {
        var byLain = '<div class="row baru-data my-2">\
                    <div class="col-md-3"><select name="produk[]" class="form-control select2">' + opt_produk + '</select></div>\
                    <div class="col-md-2"><input type="text" class="form-control numeric" name="nisbah_bank[]" placeholder="0.00"></div>\
                    <div class="col-md-2"><input type="text" class="form-control numeric" name="nisbah_nsb[]" placeholder="0.00"></div>\
                    <div class="col-md-2"><input type="text" class="form-control numeric" name="eq_rate[]" placeholder="0.00"></div>\
                    <div class="col-md-2"><input type="date" class="form-control" name="periode[]" placeholder="0.00"></div>\
                    <div class="button-group"><button type="button" class="btn btn-sm btn-success btn-tambah"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-sm btn-danger btn-hapus" ><i class="fa fa-times"></i></button></div>\
                </div>';
        $("#dynamic_form").append(byLain);
        $(".numeric").inputmask({
            autoUnmask: true,
            alias: "numeric"
        });
    }

    $(".numeric").inputmask({
        autoUnmask: true,
        alias: "numeric"
    });
</script>
<?= $this->endSection() ?>