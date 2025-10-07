<?php
/* Template Name: Slider */
$parentCategory = get_queried_object();
$tax = $parentCategory->taxonomy;
$nme = $parentCategory->name;
$id = $parentCategory->term_id;

if ( !$tax ) {
    if ( $parentCategory->post_name == 'blog' ) {
        $slider = get_field('page_slider', $parentCategory->ID);
    } elseif ( $nme != 'product' ) {
        $slider = get_field('page_slider');
    }
    $brandSelector = '';

} elseif ( $tax == 'category' ) {
    $slider = get_field( 'page_slider','category_'.$id );
} elseif ( $tax != 'pwb-brand' ) {

    $categoryId = $parentCategory->term_id;
    $category_slug = $parentCategory->slug;
    $category_partent = $parentCategory->parent;
    
    if ( $category_partent != 0 ) {
        
        $categoryId = $parentCategory->parent;
        $category = get_term_by( 'id', $categoryId, 'product_cat' );
        $category_slug = $category->slug;

        $term_slugs = [
            'caracteristicas' => 'impresoras3d',
            'aplicaciones' => 'resinas',
        ];

        if ( array_key_exists( $category_slug, $term_slugs ) ) {
            $category = get_term_by( 'slug', $term_slugs[ $category_slug ], 'product_cat' );
            $categoryId = $category->term_id;
            $category_slug = $category->slug;
        }
    }

    $slider = get_field( 'page_slider','product_cat_'.$categoryId );
    

} else {
    $slider = array(get_field('banners', 'pwb-brand_' . $id));
    $taxonomies = get_terms( array( 'taxonomy' => 'pwb-brand', 'hide_empty' => true ) );
    $let = '';
    $str = 0;
    
    if ( !empty( $taxonomies ) ) {
        $brandSelector = '
        <section id="brandSelector">
            <div class="wrapper">
                <div class="header">
                    <h3>Amplia variedad de <span>Marcas</span></h3>
                    <p>Estos son los principales fabricantes en la tecnología de impresión 3D</p>
                </div>

                <div class="content">';

        foreach( $taxonomies as $category ) {
            $cur_brd = $category->name;
            if ($category->slug != 'xyzprinting' || $category->slug != 'hp') {
                $cur_let = strtoupper(substr($cur_brd, 0, 1));

                if ( $let != $cur_let ) {
                    $let = $cur_let;
                    if ( ctype_digit ( $let ) ) {
                        $brandSelector .= '<a href="/marcas/#0">#</a> ';
                    } else {
                        $brandSelector .= '<a  href="/marcas/#' .$let. '"> ' .$let. '</a> ';
                    }
                }
                $str++;
            }
        }
        $brandSelector .= '</div> </div> </section>';
    }
}

if ( $slider ): ?>
<div id="slider">
    <div class="wrapper">
        <div class="swiffy-slider slider-nav-chevron slider-nav-autopause slider-nav-autoplay slider-indicators-round slider-indicators-highlight slider-indicators-sm" data-slider-nav-autoplay-interval="3500" id="swiffy-animation">
            <ul class="slider-container">
                <?php foreach ( $slider as $index => $slide ): ?>
                    <li>
                        <picture>
                            <source media="(max-width: 799px)" srcset="<?= esc_url($slide['mobile']) ?>">
                            <source media="(min-width: 800px)" srcset="<?= esc_url($slide['desktop']) ?>">
                            <img width="1920" height="630" src="<?= esc_url($slide['desktop']) ?>" alt="slider-<?= $index ?>">
                        </picture>
                    </li>
                <?php endforeach ?>
            </ul>

            <ul class="slider-indicators">
                <?php
                $initial = true;
                foreach ( $slider as $index => $slide ): ?>
                    <?php
                    if ($initial) {
                        echo '<li class="active"></li>';
                        $initial = false;
                    } else {
                        echo '<li></li>';
                    }
                    ?>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>
<?php endif;

if ($brandSelector) {
    echo $brandSelector;
}
