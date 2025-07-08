<?php
$site = $this->konfigurasi_model->listing();
?>
<!-- Start Footer Section -->
<footer>
    <div class="bg-footer-top">
        <div class="container">
            <div class="row">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="footer-widgets">
                                <div class="widgets-title">
                                    <h4>Sentra Informasi dan Pelayanan Publik (SIPP)</h4>
                                </div>
                                <div class="address-box">
                                    <ul class="address">
                                        <li>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <span><?php echo $site->alamat ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- .address -->
                            </div>
                            <!-- .footer-widgets -->
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="footer-widgets">
                                <div class="widgets-title">
                                    <h4>Waktu Pelayanan</h4>
                                </div>
                                <div class="address-box">
                                    <ul class="address">
                                        <li>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <span>Senin - Kamis Jam 08.00 WIB sd 16.00 WIB</span>
                                            <span>Istirahat Jam 12.00 WIB sd 13.00 WIB</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <span>Jum'at Jam 08.00 WIB sd 16.30 WIB</span>
                                            <span>Istirahat Jam 11.30 WIB sd 13.30 WIB</span>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <!-- .footer-widgets -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="footer-widgets">
                                <div class="widgets-title">
                                    <h4>Hubungi Kami</h4>
                                </div>
                                <!-- .widgets-title -->
                                <div class="address-box">
                                    <ul class="address">
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <span><?php echo $site->telepon ?></span>
                                        </li>
                                        <li>
                                            <i class="fa fa-fax" aria-hidden="true"></i>
                                            <span><?php echo $site->fax ?></span>
                                        </li>
                                        <li>
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                            <span><?php echo $site->hp ?></span>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <span><?php echo $site->email ?></span>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- .footer-widgets -->
                        </div>
                        <!-- .col-md-3 -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .footer-top -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .bg-footer-top -->

    <div class="bg-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="footer-bottom">
                    <div class="copyright-txt">
                        <p>&copy; <?php echo date('Y') ?>. Designer By <a href="https://poltekkesjakarta3.ac.id/" title="PolkesJati">PolkesJati</a> || Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
                    </div>
                    <!-- .copyright-txt -->
                    <div class="social-box">
                        <ul class="social-icon-rounded">
                            <li><a href="https://wa.me/<?php echo $site->whatsapp; ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $site->facebook ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $site->twitter; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $site->instagram; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo $site->youtube; ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo base_url('helpdesk') ?>" target="_blank"><i class="fa fa-question" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <!-- .social-box -->

                </div>
                <!-- .footer-bottom -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .bg-footer-bottom -->

</footer>

<!-- End Footer Section -->

<!-- Start Scrolling -->
<div class="scroll-img"><i class="fa fa-angle-up" aria-hidden="true"></i></div>
<!-- End Scrolling -->

</div>

<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
        </div>
    </div>
</div>

<!-- Flipbook main Js file -->
<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/dflip/js/libs/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/dflip/js/dflip.min.js"></script>

<!--Assets-->

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/jquery.easing.1.3.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/jquery.waypoints.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/jquery.counterup.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/swiper.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/lightcase.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/jquery.nstSlider.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/jquery.flexslider.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/custom.map.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/plugins.isotope.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/isotope.pkgd.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/custom.isotope.js"></script>

<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsppid@f64214910bde7f1d8c88c39228790b3ab6ae4c58/assets/js/custom.js"></script>

<!-- Lazy Load -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js"></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsadminlte3.2.0@c4cd9975aa7ae3113ef356aed8e37f56b126d3d6/plugins/select2/js/select2.full.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsadminlte3.2.0@c4cd9975aa7ae3113ef356aed8e37f56b126d3d6/plugins/datatables/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/gh/depri12kurnia/assetsadminlte3.2.0@c4cd9975aa7ae3113ef356aed8e37f56b126d3d6/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
    $(function() {
        $('.lazy').Lazy();
    });
</script>

<script>
    $(function() {
        $("#dokumen").DataTable();
    });

    $(function() {
        $("#informasi").DataTable();
    });
</script>
</body>

</html>