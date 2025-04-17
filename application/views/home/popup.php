<div id="modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php $i = 1;
            foreach ($popup as $popup) : ?>
                <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><?php echo $popup->judul_galeri ?></h4>
                </div> -->
                <div class="modal-body">
                    <marquee class="py-3" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="12">
                        Selamat datang di Layanan PPID Politeknik Kesehatan Kementrian Kesehatan Jakarta III
                        Mohon Untuk Tidak Memberikan Imbalan, Hadiah/Pemberian Dalam Bentuk Apapun Atas Pelayanan Yang Kami Berikan
                    </marquee>
                    <img src="<?php echo base_url('assets/upload/image/' . $popup->gambar); ?>" alt="" class="img-responsive lazyload">
                </div>
            <?php $i++;
            endforeach; ?>
            <div class="modal-footer">
                <div class="col-md-12 text-center">

                    <!--<a class="btn btn-success btn-sm" target="_blank" href="https://jakarta3.pusilkom.com/admission/pmdp/agreementPmdp">Daftar PMDP</a>-->
                    <!--<a class="btn btn-primary btn-sm" target="_blank" href="https://simama-poltekkes.kemkes.go.id/">Daftar Simama</a>-->
                    <!--<a class="btn btn-warning btn-sm" target="_blank" href="https://jakarta3.pusilkom.com/admission/umum/agreementAlihJenjang">Daftar RPL/Alih Jenjang</a>-->

                    <!-- <div class="g-recaptcha" data-sitekey="6Lfh7xcqAAAAAMLHi3Dk-JzZqkDuYzSWc3Eoj3b2" data-callback="recaptchaCallback"></div> -->
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->