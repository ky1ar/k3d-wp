<?php
/* Template Name: Image Slider */
$negro = $block[ 'negro' ];
$naranja = $block[ 'naranja' ];
$clase = $block[ 'clase' ];
$images = $block[ 'images' ];
?>
<section class="imageSlider <?= esc_attr($clase) ?>">
    <div class="wrapper">
        <?php if ( $negro ) : ?>
            <h3><?= esc_html($negro) ?></h3>
        <?php endif; ?>
        <?php if ( $naranja ) : ?>
            <p><?= esc_html($naranja) ?></p>
        <?php endif; ?>
        <?php if ( $images ): ?>
            <div class="swiffy-slider slider-item-show6 slider-nav-autoplay slider-item-snapstart" data-slider-nav-autoplay-interval="2000">
                <ul class="slider-container">
                    <?php foreach ( $images as $image ): ?>
                        <li><img src="<?= esc_url($image[ 'logo' ]) ?>" alt="Logo" width="192" height="48"/></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
    </div>
</section>
