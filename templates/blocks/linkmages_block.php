<?php
$images = $block['images'];
$title = $block['title'];
$background = $block['background'];
?>

<?php if (!empty($images)): ?>
<div class="bannerlink-princ2" style="background-color: <?= esc_attr($background); ?>;">
  <div class="wrapper">
    <div class="con2">
      <h1><?= esc_html($title); ?></h1>
      <div class="marcas">
        <?php foreach ($images as $image): ?>
          <a href="<?= esc_url($image['ruta']); ?>">
            <picture>
              <source srcset="<?= esc_url($image['mobile']); ?>" media="(max-width: 576px)">
              <img src="<?= esc_url($image['imag']); ?>" alt="">
            </picture>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
