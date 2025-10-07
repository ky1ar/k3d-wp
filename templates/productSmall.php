<?php
$currentProductID = $product->get_id();
$productImage = wp_get_attachment_image_src( get_post_thumbnail_id( $currentProductID ), array('300','300'), true );
$brand = wp_get_post_terms( $currentProductID, 'pwb-brand' );
$brand = $brand[0];
$brandName = $brand->name;
$title = get_the_title( $currentProductID );
$productName = removeStringAndSpace($brandName, $title);

$brandID = get_term_meta( $brand->term_id, 'pwb_brand_image',1 );
$brandImage = wp_get_attachment_image_src( $brandID, 'wc_pwb_admin_tab_brand_logo_size', true );
$CF_principal = get_field( 'principal', $currentProductID );

$categories = get_queried_object();
$productCategory = $categories->slug;
if( $productCategory == "resinas") {
    $productName = removeStringAndSpace('Resina', $productName);
}

$terms = get_the_terms( $currentProductID, 'product_cat' );
$subCategories = '';
if ( $terms && ! is_wp_error( $terms ) ) {
    foreach ( $terms as $term ) {
        if ( $term->parent != 0 ) {
            $subCategories .= $term->term_id.',';
        }
    }
}

?>
<div
    class="productItem"
    data-product="<?= $currentProductID; ?>"
    data-image="<?= $productImage[0]; ?>"
    data-title="<?= $productName; ?>"
    data-categories="<?= $subCategories; ?>"
>
    <?= ( $CF_principal[ 'stock' ] ? '<div class="badge">En Stock</div>' : '<div class="badge pre">Preventa</div>' ) ?>

    <a class="link" href="<?= get_permalink( $currentProductID ); ?>">
        <img class="thumbnail" alt="" width="192" height="192" src="<?= $productImage[0]; ?>">
        <img class="brand" alt="" height="32" src="<?= $brandImage[0]; ?>">
        <h4 class="title"><?= $productName ?></h4>
    </a>

    <?php
    $price = number_format($product->get_price());
    echo "<b>S/ {$price}</b>";
    ?>
</div>
