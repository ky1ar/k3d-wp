<?php
$lista_1 = $block['lista_1'];
$lista_2 = $block['lista_2'];
?>

<?php if (!empty($lista_1) || !empty($lista_2)): ?>
<section class="productSlidersGroup">
    <div class="wrapper">

        <?php if (!empty($lista_1)): ?>
        <div class="productSlider list">
            <div class="swiffy-slider slider-item-show3 slider-nav-visible slider-nav-autohide slider-item-first-visible slider-item-snapstart">
                <ul class="slider-container">
                    <?php foreach ($lista_1 as $producto_id): 
                        $producto = wc_get_product($producto_id);
                        if (!$producto) continue;
                    ?>
                        <li>
                            <?php
                                setup_postdata($GLOBALS['post'] = get_post($producto->get_id()));
                                include get_theme_file_path('templates/product.php');
                            ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="navigation">
                    <button type="button" class="slider-nav slider-nav-prev" aria-label="Anterior">
                        <svg width="12" height="12"><use xlink:href="#icon-right"></use></svg>
                    </button>
                    <button type="button" class="slider-nav slider-nav-next" aria-label="Siguiente">
                        <svg width="12" height="12"><use xlink:href="#icon-right"></use></svg>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
		<span class="line-sx"></span>
        <?php if (!empty($lista_2)): ?>
        <div class="productSlider list">
            <div class="swiffy-slider slider-item-show3 slider-nav-visible slider-nav-autohide slider-item-first-visible slider-item-snapstart">
                <ul class="slider-container">
                    <?php foreach ($lista_2 as $producto_id): 
                        $producto = wc_get_product($producto_id);
                        if (!$producto) continue;
                    ?>
                        <li>
                            <?php
                                setup_postdata($GLOBALS['post'] = get_post($producto->get_id()));
                                include get_theme_file_path('templates/product.php');
                            ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="navigation">
                    <button type="button" class="slider-nav slider-nav-prev" aria-label="Anterior">
                        <svg width="12" height="12"><use xlink:href="#icon-right"></use></svg>
                    </button>
                    <button type="button" class="slider-nav slider-nav-next" aria-label="Siguiente">
                        <svg width="12" height="12"><use xlink:href="#icon-right"></use></svg>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>
<?php endif; ?>
