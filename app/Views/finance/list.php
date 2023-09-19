<?= $this->extend('layout\template') ?>

<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%" style="text-align: center;">No.</th>
                                        <th>No. ID</th>
                                        <th>Nama</th>
                                        <th>Plafond</th>
                                        <th>Jangka Waktu</th>
                                        <th>Tujuan Penggunaan</th>
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
    </div>
</section>
<?= $this->include('finance/modal_preview') ?>
<?= $this->include('finance/modal_penjamin') ?>
<?= $this->include('finance/modal_jaminan') ?>
<script type="text/javascript">
    var base_url = "<?= base_url('financing/') ?>";
    var cetak_url = "<?= base_url('cetak/') ?>";
    var biaya = '<?= json_encode($biaya) ?>';
    $(document).ready(function() {
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
            "autoWidth": true,
            columnDefs: [{
                orderable: false,
                targets: 2
            }, {
                orderable: false,
                targets: 3
            }, {
                orderable: false,
                targets: 4
            }, {
                orderable: false,
                targets: 5
            }, {
                orderable: false,
                targets: 6
            }],
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": base_url + "list",
                "type": "POST"
            },
        });

        $('#datatable').on('click', '.btn-hapus', function() {
            var id = $(this).attr('data');
            console.log(id);
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proses ini akan menghapus Data Pembiayaan!",
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
    });
</script>
<script src="<?= base_url('js/financingPage.js') ?>"></script>
<?= $this->endSection() ?>