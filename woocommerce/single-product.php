<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

$blq = get_field( 'bloque_unico' ); ?>

<section id="productPage" >
	<div class="wrapper <?php echo ($blq [ 'visualizacion' ] ? 'ky1-ext' : '') ?>">
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