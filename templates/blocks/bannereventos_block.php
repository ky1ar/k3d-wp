<?php
$images = $block['images'];
?>

<?php if (!empty($images)): ?>
<div class="banner-events">
    <div class="wrapper">
        <div id="ban-show">
            <div class="swiffy-slider slider-item-nosnap-touch slider-nav-autoplay slider-nav-autopause slider-item-nogap slider-indicators-round" data-slider-nav-autoplay-interval="5000">
                <ul class="slider-container">
                    <?php foreach ($images as $image): ?>
                        <li>
							<a <?= !empty($image['ruta']) ? 'href="' . esc_url($image['ruta']) . '"' : '' ?> onclick="<?= empty($image['ruta']) ? 'return false;' : '' ?>">
								<picture>
									<source srcset="<?= esc_url($image['mobile']); ?>" media="(max-width: 992px)">
									<img src="<?= esc_url($image['pc']); ?>" alt="Banner">
								</picture>
							</a>
						</li>
                    <?php endforeach; ?>
                </ul>
                <ul class="slider-indicators">
                    <?php foreach ($images as $index => $image): ?>
                        <li <?= $index === 0 ? 'class="active"' : ''; ?>></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
