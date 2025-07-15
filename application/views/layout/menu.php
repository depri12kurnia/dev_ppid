<?php
$site = $this->konfigurasi_model->listing();
$site_nav = $this->konfigurasi_model->listing();
$nav_profil = $this->nav_model->nav_profil();
$nav_berita = $this->nav_model->nav_berita();
$nav_informasi = $this->nav_model->nav_informasi();
$nav_layanan = $this->nav_model->nav_layanan();
?>
<!-- Start Menu -->
<div class="bg-main-menu menu-scroll">
    <div class="container">
        <div class="row">
            <div class="main-menu">
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

                            <!-- PROFIL -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-left: 6px; padding-right: 6px;">Profil PPID<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <?php foreach ($nav_profil as $s) { ?>
                                        <li><a href="<?php echo base_url('pages/tentang/' . $s->slug_pages) ?>">
                                                <?php echo $s->judul_pages ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <!-- Informasi Publik -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-left: 6px; padding-right: 6px;">Informasi Publik<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a href="<?php echo base_url('informasi/berkala') ?>">Informasi Berkala</a></li>
                                    <li><a href="<?php echo base_url('informasi/serta_merta') ?>">Informasi Serta Merta</a></li>
                                    <li><a href="<?php echo base_url('informasi/tersedia') ?>">Informasi Tersedia Setiap Saat</a></li>
                                    <li><a href="<?php echo base_url('informasi/dikecualikan') ?>">Informasi Publik Yang Dikecualikan</a></li>
                                    <li><a href="<?php echo base_url('informasi/standard_pelayanan') ?>">Standard Pelayanan Informasi Publik</a></li>
                                </ul>
                            </li>

                            <!-- Formulir Permohonan -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-left: 6px; padding-right: 6px;">Formulir Permohonan<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <!--<li><a href="<?php echo base_url('request') ?>">Formulir Permohonan Informasi Publik</a></li>-->
                                    <!--<li><a href="<?php echo base_url('request') ?>">Formulir Keberatan atas Informasi Publik</a></li>-->
                                    <li><a href="https://docs.google.com/forms/d/e/1FAIpQLScmBb9N1Nzc2e2i4o7wP9-_ngFV8FZNO7h5b3iSxYubAlzr8Q/viewform?usp=sharing&ouid=104451866418619309385" target="_blank">Formulir Permohonan Informasi Publik</a></li>
                                    <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSfdaniH6Yk7tbOweo7MXygwx1PBZ25ONJiGCMeTv69t1z-hFQ/viewform?usp=sharing&ouid=104451866418619309385" target="_blank">Formulir Keberatan atas Informasi Publik</a></li>
                                </ul>
                            </li>

                            <!-- Laporan Permohonan -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-left: 6px; padding-right: 6px;">Laporan<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a href="<?php echo base_url('laporan/laporan_akses') ?>">Laporan Akses Informasi Publik</a></li>
                                    <li><a href="<?php echo base_url('laporan/laporan_layanan') ?>">Laporan Layanan Informasi Publik</a></li>
                                </ul>
                            </li>
                            <!-- SKM -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-left: 6px; padding-right: 6px;">SKM<span class="caret"></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a href="https://docs.google.com/forms/d/195Xb1I6B2BNnfIbSvjzc5DtCyZRebJDeC6R5Zd0Zi1I/edit?pli=1" target="_blank">Survey</a></li>
                                    <li><a href="<?php echo base_url('laporan/laporan_survey') ?>">Laporan Survey</a></li>
                                </ul>
                            </li>
                            <!-- Helpdesk -->
                            <li><a href="<?php echo base_url('helpdesk') ?>" style="padding-left: 6px; padding-right: 6px;">Faq & Helpdesk</a></li>

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