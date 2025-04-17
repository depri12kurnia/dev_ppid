<!-- Start Sponsors Section -->

<section class="bg-sponsors-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sponsors-option">
                    <div class="section-header">
                        <h4>Mitra Dalam & Luar Negeri</h4>
                    </div>
                    <!-- .section-header -->
                    <div class="sponsors-container">
                        <div class="swiper-wrapper">
                            <?php $i = 1;
                            foreach ($mitra as $mitra) : ?>
                                <div class="swiper-slide">
                                    <div class="sopnsors-items">
                                        <a target="_blank" href="<?php echo $mitra->link_mitra ?>"><img src="<?php echo base_url('assets/upload/mitra/' . $mitra->gambar); ?>" alt="sponsors-img-<?php echo $mitra->urutan ?>" class="img-responsive" /></a>
                                    </div>
                                    <!-- .sponsors-items -->
                                </div>
                            <?php $i++;
                            endforeach; ?>
                            <!-- .swiper-slide -->
                        </div>
                        <!-- .swiper-wrapper -->
                    </div>
                    <!-- .sponsors-container -->
                </div>
                <!-- .sponsors-option -->
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>


<!-- End Sponsors Section -->