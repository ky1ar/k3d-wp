<?php
$images_1 = $block['images_1'];
$lateral_1 = $block['lateral_1']; // Debe ser una URL

$images_2 = $block['images_2'];
$lateral_2 = $block['lateral_2']; // Debe ser una URL
?>

<?php if ($images_1 || $images_2): ?>
<section class="fusionImageSlider">
    <div class="wrapper fusion-two-columns">
        <!-- Columna 1 -->
        <?php if ($images_1): ?>
        <div class="fusion-column">
            <?php if ($lateral_1): ?>
                <img src="<?= esc_url($lateral_1) ?>" alt="Lateral 1" class="imagen-lateral">
            <?php endif; ?>
            <div class="swiffy-slider slider-item-show3 slider-item-snapstart slider-nav-autoplay" data-slider-nav-autoplay-interval="5000">
                <ul class="slider-container">
                    <?php foreach ($images_1 as $image): ?>
                        <li><img src="<?= esc_url($image['logo']) ?>" alt="Imagen 1" width="192" height="48"></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>

        <!-- Columna 2 -->
        <?php if ($images_2): ?>
        <div class="fusion-column">
            <?php if ($lateral_2): ?>
                <img src="<?= esc_url($lateral_2) ?>" alt="Lateral 2" class="imagen-lateral">
            <?php endif; ?>
            <div class="swiffy-slider slider-item-show3 slider-item-snapstart slider-nav-autoplay" data-slider-nav-autoplay-interval="5000">
                <ul class="slider-container">
                    <?php foreach ($images_2 as $image): ?>
                        <li><img src="<?= esc_url($image['logo']) ?>" alt="Imagen 2" width="192" height="48"></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
