<?= $this->extend('layout/template') ?>

<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="5%" style="text-align: center;">No.</th>
                                    <th>Produk</th>
                                    <th>Nisbah Bank</th>
                                    <th>Nisbah Nasabah</th>
                                    <th>Equivalen Rate</th>
                                    <th>Periode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Update Data Baghas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open(base_url('baghas/update')) ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Ket Produk</label>
                    <div class="col-md-6">
                        <select name="produk" id="produk" class="form-control select2">
                            <option value="" selected='selected' disabled>Pilih</option>
                            <?php foreach ($produk as $pd) : ?>
                                <option value="<?= $pd['kdprd'] ?>" <?php echo set_select('produk', $pd['kdprd']) ?>><?= $pd['produk'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nisbah Bank</label>
                    <div class="col-md-6">
                        <input type="hidden" name="id">
                        <input type="text" class="form-control numeric" name="nisbah_bank" placeholder="0.00">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nisbah Nasabah</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control numeric" name="nisbah_nsb" placeholder="0.00">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Equivalen Rate</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control numeric" name="eq_rate" placeholder="0.00">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Periode</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="periode" placeholder="0.00">
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
<script type="text/javascript">
    var base_url = "<?= base_url('baghas/') ?>";
    $('.select2').select2({
        width: '100%'
    });
    $(document).ready(function() {
        $(".numeric").inputmask({
            autoUnmask: true,
            alias: "numeric"
        });
        var table = $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                text: '<span class="fa fa-plus-circle" aria-hidden="true"></span> Create',
                action: function(e, dt, node, config) {
                    window.location.href = base_url + 'create';
                }
            }],
            "processing": true,
            "serverSide": true,
            "responsive": true,
            columnDefs: [{
                orderable: false,
                targets: 4
            }, ],
            "order": [
                [5, 'asc']
            ],
            "ajax": {
                "url": base_url + "list",
                "type": "POST"
            },
        });

        $('#datatable').on('click', '.btn-hapus', function() {
            var id = $(this).attr('data');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proses ini akan menghapus Data!",
                icon: 'warning',
                showDenyButton: true,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                denyButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: base_url + "delete",
                        dataType: "JSON",
                        data: {
                            id: id,
                        },
                        success: function(data) {
                            console.log(data);
                            Swal.fire({
                                title: data.title,
                                html: data.desc,
                                icon: data.icon,
                                showCancelButton: false,
                            }).then((result) => {
                                $('#datatable').DataTable().ajax.reload();
                            });
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire('Warning', 'Proses hapus batal', 'warning')
                }
            })
        });
        $('#datatable').on('click', '.btn-edit', function() {
            var id = $(this).attr('data');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Perubahan data!",
                icon: 'warning',
                showDenyButton: true,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#d33',
                confirmButtonText: 'Ubah',
                denyButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: base_url + "detail",
                        dataType: "JSON",
                        data: {
                            id: id,
                        },
                        success: function(data) {
                            if (data.status) {
                                var res = data.data;
                                console.log(res);
                                $('input[name="id"]').val(res.id);
                                $('select option[value=' + res.produk + ']').attr('selected', 'selected');
                                $('#produk').val(res.produk).trigger('change');
                                $('input[name="nisbah_bank"]').val(res.nisbah_bank);
                                $('input[name="nisbah_nsb"]').val(res.nisbah_nsb);
                                $('input[name="eq_rate"]').val(res.eq_rate);
                                $('input[name="periode"]').val(res.periode);
                                $('#update').modal({
                                    backdrop: 'static',
                                    keyboard: false
                                });
                            } else {
                                Swal.fire({
                                    title: data.title,
                                    html: data.desc,
                                    icon: data.icon,
                                    showCancelButton: false,
                                }).then((result) => {
                                    $('#datatable').DataTable().ajax.reload();
                                });
                            }
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire('Warning', 'Proses edit data batal', 'warning')
                }
            })
        });
    });
</script>
<?= $this->endSection() ?>