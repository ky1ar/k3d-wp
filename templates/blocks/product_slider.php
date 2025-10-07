<?php
/* Template Name: Product Slider */
$negro = $block[ 'negro' ];
$naranja = $block[ 'naranja' ];
$clase = $block[ 'clase' ];
$productos = $block[ 'product' ];
?>
<section class="productSlider <?= esc_attr($clase) ?>">
    <div class="wrapper">
        <?php if ( $negro ) : ?>
        <h3><?= esc_html($negro) ?></h3>
        <?php endif; ?>
        <?php if ( $naranja ) : ?>
        <p><?= esc_html($naranja); ?></p>
        <?php endif; ?>
        <?php if ( $productos ): ?>
            <div class="swiffy-slider slider-item-show6 slider-nav-square slider-nav-dark slider-nav-visible slider-nav-autohide slider-item-snapstart">
                <ul class="slider-container">
                    <?php foreach ( $productos as $producto ): ?>
                        <li>
                            <?php
                                $product = wc_get_product( $producto->ID );
                                include get_theme_file_path('templates/product.php');
                            ?>
                        </li>
                    <?php endforeach ?>
                </ul>
                
                <button type="button" class="slider-nav" aria-label="Go to previous"></button>
                <button type="button" class="slider-nav slider-nav-next" aria-label="Go to next"></button>
            </div>
        <?php endif ?>
    </div>
</section>
