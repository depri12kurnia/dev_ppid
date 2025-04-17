<section class="bg-slider-option">
    <div class="slider-option slider-two">
        <div id="slider" class="carousel slide wow fadeInDown" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php $i = 1;
                foreach ($slider as $s) { ?>
                    <li data-target="#slider" data-slide-to="<?php echo $s->urutan ?>" class="active"></li>
                <?php } ?>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php $i = 1;
                foreach ($slider as $slider) : ?>
                    <div class="item <?php if ($i == 1) {
                                            echo 'active';
                                        } ?>">
                        <div class="slider-item">
                            <img src="<?php echo base_url('assets/upload/image/' . $slider->gambar); ?>" alt="bg-slider-2" class="lazy">
                        </div>
                    </div>
                    <!-- .items -->
                <?php $i++;
                endforeach; ?>

            </div>
            <!-- .carosoul-inner -->
            <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
            </a>
        </div>
    </div>
    <!-- .slider-option -->
</section>

<!-- End Slider Section -->