<?php
$images = $block['images'];
$custom_class = !empty($block['custom_class']) ? esc_attr($block['custom_class']) : '';
?>

<?php if (!empty($images)): ?>
<div class="catlink <?= $custom_class ?>">
  <div class="wrapper">
    <div class="con">
      <?php foreach ($images as $image): ?>
        <a href="<?= esc_url($image['ruta']); ?>">
          <picture>
            <source srcset="<?= esc_url($image['mobile']); ?>" media="(max-width: 992px)">
            <img src="<?= esc_url($image['pc']); ?>" alt="Banner">
          </picture>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>
