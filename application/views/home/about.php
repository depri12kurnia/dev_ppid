<!-- Start About Greenforest Section -->
<section class="bg-about-greenforest">
    <div class="container">
        <div class="row">
            <div class="about-greenforest">
                <?php $noprof = 1;
                foreach ($profil as $profil) {
                    if ($noprof == 1) { ?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="about-greenforest-content">
                                    <h2><a href="<?php echo base_url('pages/tentang/' . $profil->slug_pages); ?>"><?php echo $profil->judul_pages ?></a></h2>
                                    <p><?php echo character_limiter(strip_tags($profil->isi), 500); ?></p>
                                </div>
                                <!-- .about-greenforest-content -->
                            </div>
                            <!-- .col-md-8 -->
                            <div class="col-md-4">
                                <div class="about-greenforest-img">
                                    <img src="<?php echo base_url('assets/upload/pages/' . $profil->gambar) ?>" alt="about-greenforet-img" class="img-responsive lazyload" style="border-top-right-radius: 50px;border-bottom-left-radius: 50px;" />
                                </div>
                                <!-- .about-greenforest-img -->
                            </div>
                            <!-- .col-md-4 -->
                        </div>
                <?php }
                    $noprof++;
                } ?>
            </div>
            <!-- .about-greenforest -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>