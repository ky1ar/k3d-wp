<?php
$productos = $block['productos'];
$custom_class = !empty($block['custom_class']) ? esc_attr($block['custom_class']) : '';
?>

<?php if (!empty($productos)): ?>
<section class="productSlider list <?= $custom_class; ?>">
    <div class="wrapper">
        <div class="swiffy-slider slider-item-show6 slider-nav-visible slider-nav-autohide slider-item-first-visible slider-item-snapstart">
            <ul class="slider-container">
				<?php foreach ($productos as $producto_id): 
					$producto = wc_get_product($producto_id);
					if (!$producto) continue;
				?>
					<li>
						<?php
							setup_postdata($GLOBALS['post'] =& get_post($producto->get_id()));
							include get_theme_file_path('templates/product.php');
						?>
					</li>
				<?php endforeach; ?>
			</ul>

            <div class="navigation">
                <button type="button" class="slider-nav slider-nav-prev" aria-label="Go to previous">
                    <svg width="12" height="12">
                        <use xlink:href="#icon-right"></use>
                    </svg>
                </button>
                <button type="button" class="slider-nav slider-nav-next" aria-label="Go to next">
                    <svg width="12" height="12">
                        <use xlink:href="#icon-right"></use>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
