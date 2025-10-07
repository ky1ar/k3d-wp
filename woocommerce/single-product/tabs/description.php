<?php

defined( 'ABSPATH' ) || exit;

global $post;

$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );

?>

<?php if ( $heading ) : 
	the_title( '<h1 class="product_title entry-title">', '</h1>' );
 endif; ?>

<?php the_content(); ?>
