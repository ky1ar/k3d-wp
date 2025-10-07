<?php
$productos = $block['productos'];
?>

<?php if (!empty($productos)): ?>
<section class="productSlider top dron">
    <div class="wrapper">
        <div class="new-ban">
            <img src="/wp-content/uploads/2025/05/home-drones.webp">
        </div>
        <div class="swiffy-slider slider-item-show5 slider-nav-visible slider-nav-autohide slider-item-first-visible slider-item-snapstart slider-indicators-round slider-indicators-dark slider-indicators-outside">
            <ul class="slider-container">
                <?php
                foreach ($productos as $producto_id): 
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
            <ul class="slider-indicators">
                <li class="active"></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>
</section>
<?php endif; ?>
<script>
  window.addEventListener('load', () => {
    if (window.innerWidth <= 576) {
      const container = document.querySelector('.productSlider.top.inv.v2 .swiffy-slider.slider-item-show5 ul.slider-container');
      if (container) {
        const items = container.querySelectorAll('li');
        const lastItem = items[items.length - 1];
        if (lastItem) {
          // Calcula la posición horizontal del último elemento
          const scrollAmount = lastItem.offsetLeft;
          container.scrollLeft = scrollAmount;
        }
      }
    }
  });
</script>


