<?php
$productos = $block['productos']; // Relación manual desde ACF
?>

<?php if (!empty($productos)): ?>
<section class="productSlider top">
    <div class="wrapper">
        <div class="new-ban">
            <img src="/wp-content/uploads/2025/05/topten_s22.webp">
        </div>
        <div class="swiffy-slider slider-item-show5 slider-nav-visible slider-nav-autohide slider-item-snapstart">
            <ul class="slider-container">
                <?php
                $i = 1;
                $totalProductos = 0;
                foreach ($productos as $producto_id): 
                    $producto = wc_get_product($producto_id);
                    if (!$producto) continue;
                    $totalProductos++;
                ?>
                    <li>
                        <p class="numi"><?php echo $i; ?></p>
                        <?php
                            setup_postdata($GLOBALS['post'] =& get_post($producto->get_id()));
                            include get_theme_file_path('templates/product.php');
                            $i++;
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="navigation">
                <button type="button" class="slider-nav slider-nav-prev" aria-label="Go to previous">
                    <svg width="12" height="12"><use xlink:href="#icon-right"></use></svg>
                </button>
                <button type="button" class="slider-nav slider-nav-next" aria-label="Go to next">
                    <svg width="12" height="12"><use xlink:href="#icon-right"></use></svg>
                </button>
            </div>

            <ul class="slider-indicators">
                <?php
                $totalIndicadores = ceil($totalProductos / 2); // La mitad de los elementos
                for ($j = 0; $j < $totalIndicadores; $j++): ?>
                    <li class="<?php echo ($j === 0) ? 'active' : ''; ?>"></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</section>
<?php endif; ?>
