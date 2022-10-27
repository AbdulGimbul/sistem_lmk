<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <a href="<?= base_url('/') ?>" class="brand-link mt-2">

        <img src="<?= base_url('/assets/img/lmk.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">

        <span class="brand-text font-weight-light">LMK-App</span>

    </a>


    <!-- Sidebar -->

    <div class="sidebar hidden-phone hidden-tablet">

        <?php $session = session() ?>

        <!-- Sidebar Menu -->

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Add icons to the links using the .nav-icon class

                with font-awesome or any other icon font library -->


                <?php if ($session->get('role') == 2) : ?>
                    <li class="nav-item">

                        <a href="<?= base_url('/guru/jadwal') ?>" class="nav-link">

                            <i class="nav-icon fas fa-calendar-week"></i>

                            <p>

                                Jadwal Saya

                            </p>

                        </a>

                    </li>
                    <li class="nav-item">

                        <a href="<?= base_url('/guru/luang') ?>" class="nav-link">

                            <i class="nav-icon fas fa-calendar-alt"></i>

                            <p>

                                Ketersediaan Jadwal

                            </p>

                        </a>

                    </li>
                <?php else : ?>
                    <li class="nav-item">

                        <a href="<?= base_url('/') ?>" class="nav-link">

                            <i class="nav-icon fas fa-tachometer-alt"></i>

                            <p>

                                Dashboard

                            </p>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a href="<?= base_url('daftar/daftarbyadmin') ?>" class="nav-link">

                            <i class="nav-icon fas fa-user-plus"></i>

                            <p>

                                Pendaftaran

                            </p>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a href="#" class="nav-link">

                            <i class="nav-icon fas fa-copy"></i>

                            <p>

                                Kelola Data

                                <i class="fas fa-angle-left right"></i>

                            </p>

                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">

                                <a href="<?= base_url('/guru') ?>" class="nav-link">

                                    <i class="far fa-circle nav-icon"></i>

                                    <p>Data Guru</p>

                                </a>

                            </li>

                            <li class="nav-item">

                                <a href="<?= base_url('/murid') ?>" class="nav-link">

                                    <i class="far fa-circle nav-icon"></i>

                                    <p>Data Murid</p>

                                </a>

                            </li>

                        </ul>

                    </li>

                    <li class="nav-item">

                        <a href="<?= base_url('jadwal') ?>" class="nav-link">

                            <i class="nav-icon fas fa-calendar-week"></i>

                            <p>

                                Jadwal

                            </p>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a href="<?= base_url('/info') ?>" class="nav-link">

                            <i class="nav-icon fas fa-th"></i>

                            <p>

                                Program LMK

                            </p>

                        </a>

                    </li>

                <?php endif; ?>
            </ul>

        </nav>

        <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

</aside>