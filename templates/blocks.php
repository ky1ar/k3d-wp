<?php
if (is_page()) {
    $blocks = get_field('blocks');
} elseif (is_tax('product_cat')) {
    $category = get_queried_object();
    if ($category) {
        $blocks = get_field('blocks', 'product_cat_' . $category->term_id);
    }
}
if( $blocks ) {
	foreach ( $blocks as $block ) {
		$type = $block[ 'acf_fc_layout' ];
		$template_path = 'templates/blocks/' . $type . '.php';
		
		if (locate_template($template_path)) {
			include locate_template($template_path);
		}
	} 
}
