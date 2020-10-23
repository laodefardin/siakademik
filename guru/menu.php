<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-50 img-radius" src="https://cekmutasi.co.id/assets/images/profile-picture/150x150/male.png" alt="Laode Muh ZulFardinsyah">
                <div class="user-details">
                    <span><?php
              echo $_SESSION['nama'];
               ?></span>
                    <span id="more-details">Member<i class="ti-angle-down"></i></span>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                <li class="more-details">
                         <a href="profil">
                            <i class="ti-user"></i> Profil
                        </a>
                    </li>  
                    <li class="more-details">
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
            <li class="">
                <a href="nilai">
                    <span class="pcoded-micon"><i class="ti-wallet"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Data Nilai</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="">
                <a href="input-nilai">
                    <span class="pcoded-micon"><i class="ti-pulse"></i><b>P</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.integration.main">Tambah Nilai</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="">
                <a href="data-siswa">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.integration.main">Data Siswa</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="">
                <a href="data-guru">
                    <span class="pcoded-micon"><i class="ti-star"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.integration.main">Data Guru</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="">
                <a href="profil">
                    <span class="pcoded-micon"><i class="ti-package"></i><b>P</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.integration.main">Profil</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            
        </ul>
</nav>