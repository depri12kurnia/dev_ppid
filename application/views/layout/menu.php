<?php
$site = $this->konfigurasi_model->listing();
$site_nav = $this->konfigurasi_model->listing();
$nav_profil = $this->nav_model->nav_profil();
// $nav_download               = $this->nav_model->nav_download();
$nav_berita = $this->nav_model->nav_berita();
$nav_agenda = $this->nav_model->nav_agenda();
$nav_informasi = $this->nav_model->nav_informasi();
$nav_jurusan = $this->nav_model->nav_jurusan();
$nav_fasilitas = $this->nav_model->nav_fasilitas();
$nav_pelatihan = $this->nav_model->nav_pelatihan();
$nav_pui = $this->nav_model->nav_pui();

?>
<!-- Start Menu -->
<div class="bg-main-menu menu-scroll">
    <div class="container">
        <div class="row">
            <div class="main-menu">
                <a class="show-res-logo" href="<?php echo base_url() ?>"><img src="<?php echo $this->website->logo() ?>" alt="logo" class="img-responsive" style="max-height: 85px; width: auto;" /></a>
                <nav class="navbar">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo $this->website->logo() ?>" alt="logo" class="img-responsive" style="max-height: 56px; width: auto;" /></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <!-- home -->
                            <li><a href="<?php echo base_url('/') ?>" style="padding-left: 6px; padding-right: 6px;">Home</a></li>
                            <!-- <li><a href="<?php echo base_url('berita') ?>" style="padding-left: 6px; padding-right: 6px;">Berita</a></li> -->

                            <!-- PROFIL -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-left: 6px; padding-right: 6px;">Profil<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <?php foreach ($nav_profil as $nav_profil) { ?>
                                        <li><a href="<?php echo base_url('pages/tentang/' . $nav_profil->slug_pages) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                <?php echo $nav_profil->judul_pages ?></a></li>
                                    <?php } ?>
                                    <li><a href="<?php echo base_url('jajaran-manajemen'); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Jajaran Manajemen</a>
                                </ul>
                            </li>

                            <!-- Progream Kerja -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-left: 6px; padding-right: 6px;">Program Kerja<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <?php foreach ($nav_informasi as $nav_informasi) { ?>
                                        <li><a href="<?php echo base_url('pages/program/' . $nav_informasi->slug_pages) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                <?php echo $nav_informasi->judul_pages ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <!-- Pelatihan -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-left: 6px; padding-right: 6px;">pelatihan<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <?php foreach ($nav_pelatihan as $nav_pelatihan) { ?>
                                        <li><a href="<?php echo base_url('pages/pelatihan/' . $nav_pelatihan->slug_pages) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                <?php echo $nav_pelatihan->judul_pages ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <!-- Fasilitas -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-left: 6px; padding-right: 6px;">Fasilitas<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <?php foreach ($nav_fasilitas as $nav_fasilitas) { ?>
                                        <li><a href="<?php echo base_url('pages/fasilitas/' . $nav_fasilitas->slug_pages) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                <?php echo $nav_fasilitas->judul_pages ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <!-- Galeri -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-left: 6px; padding-right: 6px;">Galeri <span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">

                                    <li><a href="<?php echo base_url('galeri'); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Galeri Foto</a>
                                    </li>
                                    <li><a href="<?php echo base_url('video'); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Galeri
                                            Video</a></li>
                                </ul>
                            </li>
                            <!-- UNDUHAN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-left: 6px; padding-right: 6px;">Download<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a href="<?php echo base_url('unduhan/sertifikat') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sertifikat</a>
                                    <li><a href="<?php echo base_url('unduhan/pedoman') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Pedoman</a>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-left: 6px; padding-right: 6px;">Kuisoner<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Survey 1</a>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Survey 2</a>
                                </ul>
                            </li>

                        </ul>
                        <div class="menu-right-option pull-right">

                            <div class="search-box">
                                <i class="fa fa-search first_click" aria-hidden="true" style="display: block;"></i>
                                <i class="fa fa-times second_click" aria-hidden="true" style="display: none;"></i>
                            </div>
                            <div class="search-box-text">
                                <form action="<?php echo base_url('berita/search') ?>" method="GET">
                                    <input type="text" name="search" id="all-search" placeholder="Search Here">
                                </form>
                            </div>
                        </div>
                        <!-- .header-search-box -->
                    </div>
                    <!-- .navbar-collapse -->
                </nav>
            </div>
            <!-- .main-menu -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</div>
<!-- .bg-main-menu -->
</header>