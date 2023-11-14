<template>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="../../index3.html" class="navbar-brand">
                    <span class="brand-text font-weight-light">E-Library</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <Link href="/dashboard" class="nav-link">
                                <span class="fa fa-home"></span>
                                Home
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" href="/books" ><span class="fa fa-book"></span>
                                Daftar Buku
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" href="/anggotas" ><span class="fa fa-users"></span>
                                Daftar Anggota
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" href="/peminjaman" ><span class="fa fa-folder-open"></span>
                                Peminjaman Buku
                            </Link>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle">
                                <span class="fa fa-folder-open"></span>
                                Transaksi
                            </a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><Link href="/peminjaman" class="dropdown-item">Peminjaman Buku </Link></li>
                                <li><a href="#" class="dropdown-item">Pengembalian Buku</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- <span class="dropdown-header">Settings</span> -->
                            <div class="dropdown-divider"></div>
                            <Link href="/logout"  method="POST" class="dropdown-item">
                                <i class="fas fa-share mr-2"></i> Logout
                                <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                            </Link>
                            <div class="dropdown-divider"></div>
                            <!-- <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a> -->
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <slot/>
    </div>
    <!-- /.content-wrapper -->
</template>

<script>

    //import Link dari inertia
    import { Link } from '@inertiajs/inertia-vue3';

    export default {

        //register Link di component
        components: {
            Link
        },

        props: {
            auth: Object
        }

    }
</script>
