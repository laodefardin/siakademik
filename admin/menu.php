<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-50 img-radius" src="https://cekmutasi.co.id/assets/images/profile-picture/150x150/male.png" alt="Laode Muh ZulFardinsyah">
                <div class="user-details">
                    <span><?php
              echo $_SESSION['fullname'];
               ?></span>
                    <span id="more-details">Member<i class="ti-angle-down"></i></span>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="admin"><i class="ti-settings"></i>Pengaturan</a>
                        <a href="../logout" onclick="return confirm('Apakah anda akan keluar?');"><i class="ti-power-off"></i>Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-search">
            <span class="searchbar-toggle"> </span>
            <div class="pcoded-search-box ">
                <input type="text" placeholder="Search">
                <span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>
            </div>
        </div>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="dashboard">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-package"></i><b>S</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.packages.main">Siswa</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="siswa">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.balance.history">Data Siswa</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="input-siswa">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.balance.add">Tambah Siswa</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-wallet"></i><b>S</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.balance.main">Kelas</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="kelas">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.balance.history">Data Kelas</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="input-kelas">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.balance.add">Tambah Kelas</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="kelas-siswa">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.balance.mutation">Kelas Siswa</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="pelajaran">
                    <span class="pcoded-micon"><i class="ti-pulse"></i><b>P</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.integration.main">Pelajaran</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>N</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.subscription.main">Nilai</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="nilai">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.subscription.bank">Nilai Siswa</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="input-nilai">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.subscription.paypal">Input Nilai Siswa</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-star"></i><b>G</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.subscription.main">Guru</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="guru">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.subscription.bank">Data Guru</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="input-guru">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.subscription.paypal">Tambah Guru</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-rss-alt"></i><b>L</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.subscription.main">Laporan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="laporan-siswa">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.subscription.bank">Laporan Siswa</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="laporan-kelas">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.subscription.bank">Laporan Kelas</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="laporan-pelajaran">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.subscription.bank">Laporan Pelajaran</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="laporan-nilai">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.subscription.bank">Laporan Nilai</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="laporan-guru">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.subscription.paypal">Laporan Guru</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-signal"></i><b>A</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.subscription.main">Admin</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="admin">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.subscription.bank">Data Admin</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="input-admin">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.subscription.paypal">Tambah Admin</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
</nav>