<?php
$site = $this->konfigurasi_model->listing();
?>
<div class="box-layout">
    <!-- End Pre-Loader -->
    <header class="header-style-2">
        <div class="bg-header-top">
            <div class="container">
                <div class="row">
                    <div class="header-top">
                        <ul class="h-contact">
                            <li><i class="fa fa-university"></i> PPID Poltekkes Jakarta III</li>
                        </ul>
                        <div class="donate-option">
                            <a href="https://wa.me/<?php echo str_replace('+', '', $site->whatsapp) ?>?text=Saya%20perlu%20informasi%20tentang%20Poltekkes%20Jakarta%20III.%20Apakah%20bisa%20dibantu?" target="_blank" style="padding-left: 10px; padding-right: 10px;"><i class="fa fa-whatsapp" aria-hidden="true"></i><?php echo $site->whatsapp ?></a>
                            <a href="" style="padding-left: 10px; padding-right: 10px;"><i class="fa fa-mobile" aria-hidden="true"></i><?php echo $site->hp ?></a>
                            <a href="tel:<?php echo $site->telepon ?>" style="padding-left: 10px; padding-right: 10px;"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $site->telepon ?></a>
                            <a href="<?php echo base_url('kontak') ?>" style="padding-left: 10px; padding-right: 10px;"><i class="fa fa-envelope" aria-hidden="true"></i>Kontak</a>
                            <a href="<?php echo base_url('helpdesk') ?>" style="padding-left: 10px; padding-right: 10px;"><i class="fa fa-question-circle" aria-hidden="true"></i>Faq & Helpdesk</a>
                        </div>
                        <!-- .donate-option -->
                    </div>
                    <!-- .header-top -->
                </div>
                <!-- .header-top -->
            </div>
            <!-- .container -->
        </div>
        <!-- .bg-header-top -->