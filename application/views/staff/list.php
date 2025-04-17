<section class="bg-page-header">
    <div class="page-header-overlay">
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Jajaran Manajemen</h3>
                    </div>
                    <!-- .page-title -->
                    <div class="page-header-content">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
                            <li>Manajemen</li>
                        </ol>
                    </div>
                    <!-- .page-header-content -->
                </div>
                <!-- .page-header -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .page-header-overlay -->
</section>
<!-- Start our volunteers Section -->

<section class="bg-team-section">
    <div class="container">
        <div class="row">
            <div class="volunteers-option">
                <div class="row">
                    <?php
                    // $jumlah = count($staff);
                    foreach ($staff as $staff) { ?>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="volunteers-items">
                                <div class="volunteers-img">
                                    <img src="<?php echo base_url('assets/upload/staff/' . $staff->gambar) ?>" alt="volunteers-img-1" class="img-responsive lazyload" />
                                </div>
                                <!-- .volunteers-img -->
                                <div class="volunteers-content">
                                    <p><a href="<?php echo base_url('staff/detail/' . $staff->id_staff) ?>"><?php echo $staff->nama ?></a></p>
                                </div>
                                <!-- .volunteers-content -->
                                <div class="volunteers-social-icon">
                                    <ul class="social-icon">
                                        <h5><?php echo $staff->jabatan; ?></h5>
                                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <!-- .volunteers-social-icon -->
                            </div>
                            <!-- .volunteers-items -->
                        </div>
                        <!-- .col-md-3 -->
                    <?php } ?>

                </div>
                <!-- .row -->
            </div>
            <!-- .volume-option -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>

<!-- End our volunteers Section -->