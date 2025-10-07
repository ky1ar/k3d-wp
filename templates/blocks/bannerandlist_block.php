<?php
$images = $block['images'];
$titlex = $block['titlex'];
$promo = $block['promo'];
$promo_mobile = $block['promo_mobile'];
$invert = !empty($block['invert']) && $block['invert'] ? ' inv' : '';
?>

<?php if (!empty($images)): ?>
<section class="productSlider top<?= $invert ?> v2">
	<?php if (!empty($titlex)): ?>
        <h1 class="ban-tit"><?= esc_html($titlex); ?></h1>
    <?php endif; ?>
    <div class="wrapper">
        <div class="new-ban">
            <picture>
                <source srcset="<?= esc_url($promo_mobile); ?>" media="(max-width: 576px)">
                <img src="<?= esc_url($promo); ?>" alt="Banner">
            </picture>
        </div>
        <div class="swiffy-slider slider-item-show5 slider-nav-visible slider-nav-autohide slider-item-snapstart">
            <ul class="slider-container">
                <?php foreach ($images as $image): ?>
					<li>
						<a <?= !empty($image['ruta']) ? 'href="' . esc_url($image['ruta']) . '"' : '' ?> onclick="<?= empty($image['ruta']) ? 'return false;' : '' ?>">
							<img src="<?= esc_url($image['imag']); ?>" alt="Imagen del slider">
						</a>
					</li>
				<?php endforeach; ?>

            </ul>

            <div class="navigation">
                <button type="button" class="slider-nav slider-nav-prev" aria-label="Anterior">
                    <svg width="12" height="12">
                        <use xlink:href="#icon-right"></use>
                    </svg>
                </button>
                <button type="button" class="slider-nav slider-nav-next" aria-label="Siguiente">
                    <svg width="12" height="12">
                        <use xlink:href="#icon-right"></use>
                    </svg>
                </button>
            </div>

            <?php
				$total_images = count($images);
				$total_indicators = ceil(($total_images - 1) / 3);
				?>

				<ul class="slider-indicators">
					<?php for ($i = 0; $i < $total_indicators; $i++): ?>
						<li class="<?= $i === 0 ? 'active' : '' ?>"></li>
					<?php endfor; ?>
				</ul>
        </div>
    </div>
</section>
<?php endif; ?>
