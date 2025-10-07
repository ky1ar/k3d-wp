<?php
/* Template Name: New Products */
$slugs = explode(",", $block['slugs']);
$titulo = $block['titulo'];
$small = $block['small'];
$cantidad = $block['cantidad'];
?>

<section class="productSlider <?= $small ? 'small': '' ?>">
    <div class="se wrapper">
        <?php
        $args = array(
            'posts_per_page' => $cantidad,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'post_type' => 'product',
            'meta_query' => WC()->query->get_meta_query(),
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_visibility',
                    'field' => 'name',
                    'terms' => array('exclude-from-catalog', 'exclude-from-search'),
                    'operator' => 'NOT IN',
                ),
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $slugs,
                )
            )
        );

        $products = new WP_Query($args);
        ?>

        <h3>
            <svg width="24" height="24">
                <use xlink:href="#icon-news"></use>
            </svg>
            <?= $titulo ?>
        </h3>

        <div class="swiffy-slider slider-item-show<?= $small ? '4 slider-item-show2-sm': '6' ?> slider-nav-visible slider-nav-autohide slider-item-first-visible slider-item-snapstart">
            <ul class="slider-container">
                <?php foreach ($products->posts as $product_id): ?>
                    <?php $product = wc_get_product($product_id); ?>
                    <li>
                        <?php include get_theme_file_path('templates/product.php'); ?>
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
