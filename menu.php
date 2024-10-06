<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
            <a class="navbar-brand" href="#page-top">SMP ISSUD 1 BANCAK </a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>">Beranda</a></li>
                        <?php if(@$_SESSION['role_id'] == 1){ ?>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=ppdb">Edit Data</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=Pengumuman">Pengumuman</a></li>
                        <?php } else if(@$_SESSION['role_id'] == 2) { ?>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=manajemensiswa">Daftar Calon Siswa</a></li>

                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=manajemenuser">Manajemen User</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=manajemenpengumuman">Pengumuman</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=manajemenperiode">Periode</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=manajemenkontak">kontak</a></li>

                            <?php } ?>

                            <?php if(@$_SESSION['role_id'] == 3){ ?>
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=manajemensiswa">Daftar Siswa</a></li>

                            
                            <?php } ?>



                        <?php if(@$_SESSION['username'] == null){ ?>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=ppdb">PPDB</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=Pengumuman">Pengumuman</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=kontak">Kontak</a></li>

                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=login">login</a></li>
                        <?php } else { ?>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/index.php?p=profil"><?php echo $_SESSION['username'] ?></a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo $url ?>/logout.php">Keluar</a></li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>