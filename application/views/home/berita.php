<!-- Start Upcoming Events Section -->
<section class="bg-upcoming-events">
    <div class="container">
        <div class="row">
            <div class="upcoming-events">
                <div class="section-header">
                    <h4 style="color: #686969;">Kabar Terbaru</h4>
                </div>
                <!-- .section-header -->
                <div class="row">
                    <?php foreach ($berita as $berita) { ?>
                        <div class="col-md-4">
                            <div class="event-items">
                                <div class="event-img">
                                    <a href="<?php echo base_url('berita/read/' . $berita->slug_berita); ?>"><img style="width:570px;height:230px;" src="<?php echo base_url('assets/upload/image/thumbs/' . $berita->gambar); ?>" alt="upcoming-events-img-1" class="img-responsive lazyload" /></a>
                                    <div class="date-box">
                                        <h3><?php echo date('d', strtotime($berita->tanggal_publish)); ?></h3>
                                        <h5><?php echo date('M', strtotime($berita->tanggal_publish)); ?></h5>
                                    </div>
                                    <!-- .date-box -->
                                </div>
                                <!-- .event-img -->
                                <div class="events-content">
                                    <div style="min-height: 120px !important;">
                                        <h3><a href="<?php echo base_url('berita/read/' . $berita->slug_berita); ?>"><?php echo character_limiter(strip_tags($berita->judul_berita), 35); ?></a>
                                        </h3>
                                        <ul class="meta-post">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo date('d M Y H:i', strtotime($berita->tanggal_publish)); ?></li>
                                            <li><i class="fa fa-user"></i> <?php echo $berita->nama; ?></li>
                                        </ul>
                                    </div>
                                    <p class="text-justify"><?php echo character_limiter(strip_tags($berita->isi), 130); ?>
                                    </p>
                                    <a href="<?php echo base_url('berita/read/' . $berita->slug_berita); ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i> Selengkapnya</a>
                                </div>
                                <!-- .events-content -->
                            </div>
                            <!-- .events-items -->
                        </div>
                    <?php } ?>
                    <!-- .col-md-6 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .upcoming-events -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>


<!-- End Upcoming Events Section -->