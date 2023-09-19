<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="shortcut icon" type="image/jpg" href="<?= base_url('uploads/aplikasi/' . $app->logo) ?>" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav layout-footer-fixed" style="height: auto;">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light bg-olive">
            <div class="container-fluid" style="height: 85px;">
                <a href="<?= base_url() ?>index3.html" class="navbar-brand">
                    <!-- <img src="<?= base_url('uploads/aplikasi/' . $app->logo) ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"> -->
                    <h3 class="brand-text text-white"><?= "$app->nama_pt" ?></h3>
                </a>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                        <h3><?= strtoupper(date_indo(date('Y-m-d'))) ?></h3>
                        <h4 id="jam" style="font-size: 16;"></h4>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container-fluid px-2 pt-2">
                <div class="row mb-0 px-1">
                    <div class="col-md-7">
                        <div class="card pt-0">
                            <div class="card-body px-1 py-1 mx-auto">
                                <video loop="true" width="850" height="500" controls loop>
                                    <source src="video/hasanah.mp4" type="video/mp4" />
                                </video>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header text-center pb-1 text-bold" style="font-weight: 1000;">
                                <h1>ESTIMASI BAGI HASIL</h1>
                            </div>
                            <div class="card-body px-1 py-1">
                                <table class="table table-bordered table-hover table-striped" style="width:100%;font-size: 20px;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle; text-align:center;">Produk Dana</th>
                                            <th colspan="2" style="text-align: center;">Nisbah</th>
                                            <th rowspan="2" style="vertical-align: middle;text-align:center;">Equivalent <br> Rate</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Bank</th>
                                            <th class="text-center">Nasabah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($baghas) > 0) : ?>
                                            <?php foreach ($baghas as $key => $bs) : ?>
                                                <tr>
                                                    <td><?= $bs->produk ?></td>
                                                    <td class="text-center"><?= round($bs->nisbah_bank, 0) ?> %</td>
                                                    <td class="text-center"><?= round($bs->nisbah_nsb, 0) ?> %</td>
                                                    <td class="text-center"><?= $bs->eq_rate ?> %</td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer pb-1">
                                <h5 class="text-info text-bold">Update terakhir pada : <?= date_indo($baghas[0]->periode) ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row px-1">
                    <?php if ($jadwalSholat) : ?>
                        <?php foreach ($waktu as $key => $wk) : ?>
                            <div class="col-md-2 my-0">
                                <div class="card <?= $wk['warna'] ?> color-palette  text-center">
                                    <div class="card-header py-1.5">
                                        <h3><?= strtoupper($wk['sholat']) ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <h3>
                                            <?= date("H:i", strtotime($wk['waktu'])) ?> WIB</h3>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <footer class="main-footer text-center bg-olive">
            <strong><?= $app->nama_pt ?></strong> - All Right Reserved.
        </footer>
    </div>
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>js/adminlte.min.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            jam();
        }

        function jam() {
            var e = document.getElementById('jam'),
                d = new Date(),
                h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ':' + m + ':' + s + ' WIB';

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
    </script>
</body>

</html>