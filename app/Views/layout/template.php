<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= "$app->nm_aplikasi - " . strtoupper($title) ?></title>
    <!-- <title></?= "SIAP" ?></title> -->
    <link rel="shortcut icon" type="image/jpg" href="<?= base_url('uploads/aplikasi/' . $app->logo) ?>" />
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- JQuery -->
    <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>plugins/popper/umd/popper.js"></script>
    <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins datatables -->
    <script src="<?= base_url() ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <!-- Sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/sweetalert2/sweetalert2.min.css">
    <script src="<?= base_url() ?>plugins/sweetalert2/sweetalert2.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed ">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <?php if ($user->image == '') : ?>
                            <img src="<?= base_url('uploads/user/default.png') ?>" alt="User Avatar" class="img-size-32 mr-1 img-circle">
                        <?php else : ?>
                            <img src="<?= base_url('uploads/user/' . $user->image) ?>" class="img-circle img-size-32 mr-1" alt="User Avatar">
                        <?php endif ?>
                        <?= $user->username ?>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="<?= base_url('profil') ?>" class="dropdown-item">
                            <i class="nav-icon fas fa-user mr-3"></i> Profil
                        </a>
                        <a href="#logout" id="btn-logout" class="dropdown-item">
                            <i class="nav-icon fas fa-sign-out-alt mr-3"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <?php if ($app->logo != '') : ?>
                    <img src="<?= base_url('uploads/aplikasi/' . $app->logo) ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <?php else : ?>
                    <img src="<?= base_url() ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <?php endif ?>
                <span class="brand-text font-weight-light"><?= $app->fnama_aplikasi ?></span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php if ($user->image == '') : ?>
                            <img src="<?= base_url('uploads/user/default.png') ?>" class="img-circle elevation-2" alt="User Image">
                        <?php else : ?>
                            <img src="<?= base_url('uploads/user/' . $user->image) ?>" class="img-circle elevation-2" alt="User Image">
                        <?php endif ?>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $user->username ?></a>
                    </div>
                </div>

                <?= $this->include('layout/sidebar') ?>

            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $app->nm_aplikasi ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <?php $uri = new \CodeIgniter\HTTP\URI(current_url());
                                $page = $uri->getSegment(3);
                                ?>
                                <!-- <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li> -->
                                <li class="breadcrumb-item"><a href="<?= base_url($page) ?>"><?= ucwords($page) ?></a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <?= $this->renderSection('content') ?>
        </div>
        <footer class="main-footer text-sm">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2023 <a href="#">BPRS Hasanah</a>. Dev by Muhammad Ibnu Wardana</strong> All rights reserved.
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script src="<?= base_url() ?>js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>plugins/inputmask/jquery.inputmask.min.js"></script>

    <?php $session = session();
    if ($session->getFlashdata('success')) : ?>
        <script>
            Swal.fire({
                title: 'Success',
                html: '<?= $session->getFlashdata('success') ?>',
                icon: 'success',
            });
        </script>
    <?php elseif ($session->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                title: 'Error',
                html: '<?= $session->getFlashdata('error') ?>',
                icon: 'error',
            });
        </script>
    <?php endif ?>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $("#btn-logout").on("click", function() {
            var logout = "<?php echo base_url('logout') ?>";
            Swal.fire({
                title: 'Logout?',
                text: "Anda yakin untuk logout?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = logout;
                }
            })
        });
    </script>
</body>

</html>