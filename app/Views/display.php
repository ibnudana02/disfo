<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container mx-1">
            <div class="navbar-bg" style="height: 75px;"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="<?= base_url() ?>display" class="navbar-brand sidebar-gone-hide"><?= $app->nama_pt ?></a>
                <a href="<?= base_url() ?>#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <div class="nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="<?= base_url() ?>#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <!-- <ul class="navbar-nav">
                        <li class="nav-item active"><a href="<?= base_url() ?>#" class="nav-link">Application</a></li>
                        <li class="nav-item"><a href="<?= base_url() ?>#" class="nav-link">Report Something</a></li>
                        <li class="nav-item"><a href="<?= base_url() ?>#" class="nav-link">Server Status</a></li>
                    </ul> -->
                </div>
                <form class="form-inline ml-auto">
                </form>
                <ul class="navbar-nav navbar-right">
                    <a href="<?= base_url() ?>#" class="nav-link nav-link-lg nav-link-user">
                        <div class="d-sm-none d-lg-inline-block">
                            <h4><?= date_indo(date('Y-m-d')) ?></h4>
                            <h5 id="jam" style="font-size: 16;"></h5>
                        </div>
                    </a>
                </ul>
            </nav>
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <video loop="true" width="850" height="440" controls loop>
                                <source src="video/hasanah.mp4" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-header text-center pb-1">
                            <h5 class="text-success">ESTIMASI BAGI HASIL</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-content container">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-body">
                                        <video loop="true" width="850" height="440" controls loop>
                                            <source src="video/hasanah.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="card">
                                    <div class="card-header text-center pb-1">
                                        <h5 class="text-success">ESTIMASI BAGI HASIL</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer">
                    Copyright &copy; 2023 <div class="bullet"></div> <a href="javascript:void(0)"><?= $app->nama_pt ?></a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
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