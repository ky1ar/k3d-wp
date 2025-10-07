<?php $id_p = $product->get_id();?>
<?php
$product       = wc_get_product($id_p);
$title         = $product->get_name();
$terms = $product->get_category_ids();
$related_posts = new WP_Query(array(
    'posts_per_page' => 12,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status'    => 'publish',
    'post_type'      => 'product',
    'fields'         => 'ids',
    'exclude'        => array($id_p),
    'tax_query'             => array(
        array(
            'taxonomy'      => 'product_cat',
            'field' 		=> 'term_id',
            'terms'         => $terms,
            'operator'      => 'IN'
        ),
    )
));
?>

<section class="productSlider">
    <div class="wrapper">
        <div class="rld-ttl">
            <h3>También te recomendamos</h3>
        </div>

        <div class="swiffy-slider slider-item-show6 slider-nav-visible slider-nav-autohide slider-item-first-visible">
            <ul class="slider-container">
            <?php if ($related_posts->have_posts()): while ($related_posts->have_posts()): $related_posts->the_post();?>
                <li>
                <?php include get_theme_file_path('/templates/product.php'); ?>
                </li>
            <?php endwhile; endif;?>
            <?php wp_reset_query(); ?>
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

