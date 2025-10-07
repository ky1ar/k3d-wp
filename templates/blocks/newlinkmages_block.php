<?php
$images = $block['images'];
$title = $block['title'];
$background = $block['background'];
?>

<?php if (!empty($images)): ?>
<section class="productSlider top links">
  <div class="wrapper">
    <div class="bannerlink-princ2" style="background-color: <?= esc_attr($background); ?>;">
      <div class="con2">
        <h1><?= esc_html($title); ?></h1>

        <div class="swiffy-slider slider-item-show4 slider-nav-visible slider-nav-autohide slider-item-snapstart">
          <ul class="slider-container marcas">
            <?php foreach ($images as $image): ?>
              <li>
                <a href="<?= esc_url($image['ruta']); ?>">
                  <picture>
                    <source srcset="<?= esc_url($image['mobile']); ?>" media="(max-width: 576px)">
                    <img src="<?= esc_url($image['imag']); ?>" alt="">
                  </picture>
                </a>
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
            $totalSlides = count($images);
            $totalIndicadores = ceil($totalSlides / 5); // Muestra 5 por slide
            for ($j = 0; $j < $totalIndicadores; $j++): ?>
              <li class="<?php echo ($j === 0) ? 'active' : ''; ?>"></li>
            <?php endfor; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
