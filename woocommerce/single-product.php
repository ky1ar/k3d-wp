<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

$blq = get_field( 'bloque_unico' );

global $post;
$product_terms = wp_get_post_terms( $post->ID, 'product_cat' );
$category_slug = '';
if ( !empty($product_terms) && !is_wp_error($product_terms) ) {
	$category_slug = $product_terms[0]->slug; // Toma el slug de la primera categoría
}
?>

<section id="productPage" class="<?php echo esc_attr($category_slug); ?>">
	<div class="wrapper <?php echo ($blq['visualizacion'] ? 'ky1-ext' : '') ?>">
		<?php 
		do_action( 'woocommerce_before_main_content' ); 
		
		while (have_posts()) : 
			the_post();
			wc_get_template_part( 'content', 'single-product' );
		endwhile;
		
		do_action( 'woocommerce_after_main_content' ); 
		?>
	</div>
</section>
<?php
include get_theme_file_path('/templates/related.php');
get_footer();