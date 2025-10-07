<?php
defined('ABSPATH') || exit;
get_header();

include get_theme_file_path('templates/slider.php');
include get_theme_file_path('templates/blocks.php');

while (have_posts()) : 
	the_post();
    the_content();
endwhile;

get_footer();
