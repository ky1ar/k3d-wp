<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$prd_dat = get_field( 'principal' );

if ( $prd_dat [ 'stock' ] ): ?> 
	<div class="badge">En Stock</div>
<?php endif; 
