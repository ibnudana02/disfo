<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <?php
        $uri = new \CodeIgniter\HTTP\URI(current_url());
        $page = $uri->getSegment(1);
        $item = $uri->getSegment(2);
        ?>
        <li class="nav-item <?= in_array($page, ['dashboard'])  ? "menu-open" : ""  ?>">
            <a href="<?= base_url('dashboard') ?>" class="nav-link <?= in_array($page, ['dashboard'])  ? "active" : ""  ?>">
                <i class="fab fa-dashcube nav-icon"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <?php $master = ['master', 'cost', 'produk', 'notary', 'insurance', 'jasuransi', 'produk', 'jaminan']; ?>
        <li class="nav-item <?= in_array($page, $master)  ? "menu-open" : ""  ?>">
            <a href="<?= base_url('master') ?>" class="nav-link <?= in_array($page, $master)  ? "active" : ""  ?>">
                <i class="fas fa-server nav-icon"></i>
                <p>Master Data<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= base_url('produk') ?>" class="nav-link <?= in_array($page, ['produk'])  ? "active" : ""  ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Master Produk</p>
                    </a>
                </li>
            </ul>
        </li>

        <?php if ($user->user_role == '1') : ?>
            <li class="nav-item <?= in_array($page, ['users'])  ? "menu-open" : ""  ?>">
                <a href="<?= base_url('users') ?>" class="nav-link <?= in_array($page, ['users'])  ? "active" : ""  ?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Users <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('users/create') ?>" class="nav-link <?= in_array($item, ['create']) && $page == 'users'  ? "active" : ""  ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Registrasi User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('users') ?>" class="nav-link <?= in_array($page, ['users']) && empty($item)  ? "active" : ""  ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List User</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?= in_array($page, ['baghas'])  ? "menu-open" : ""  ?>">
                <a href="<?= base_url('baghas') ?>" class="nav-link <?= in_array($page, ['baghas'])  ? "active" : ""  ?>">
                    <i class="fas fa-wallet nav-icon"></i>
                    <p>Bagi Hasil</p>
                </a>
            </li>
            <li class="nav-item <?= in_array($page, ['aplikasi'])  ? "menu-open" : ""  ?>">
                <a href="<?= base_url('aplikasi') ?>" class="nav-link <?= in_array($page, ['aplikasi'])  ? "active" : ""  ?>">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>Settings <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('aplikasi') ?>" class="nav-link <?= in_array($page, ['aplikasi'])  ? "active" : ""  ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Aplikasi</p>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif ?>
    </ul>
</nav>