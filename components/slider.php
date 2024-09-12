<?php

use App\Slider;

$sliders = Slider::getSlider();
?>
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <?php
        foreach ($sliders as $key => $slider) {
            $active = $key == 0 ? 'active' : '';
        ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $key; ?>" class="<?php echo $active; ?>" aria-current="true" aria-label="Slide <?php echo $key; ?>"></button>
        <?php } ?>
    </div>
    <div class="carousel-inner">
        <?php
        foreach ($sliders as $key => $slider) {
            $active = $key == 0 ? 'active' : '';
        ?>
            <div class="carousel-item <?php echo $active; ?>">
                <img src="./assets/images/<?php echo $slider['image']; ?>" class="d-block w-100" alt="<?php echo $slider['title']; ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo $slider['title']; ?></h5>
                    <p><?php echo $slider['description']; ?></p>
                </div>
            </div>
            <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
    </div>