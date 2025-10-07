<?php
defined('ABSPATH') || exit;
get_header();

include get_theme_file_path('templates/slider.php');
global $post;

$page = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
$args = array(
	'posts_per_page'  => 8,
	'paged'          => $page,
	'post_status'    => 'publish',  
	'tax_query'      => array(
		array(
			'taxonomy'     => 'category',
			'field'        => 'id',
			'terms'        => array(get_queried_object_id()),
			'operator'     => 'IN'
		)
	),
	'order' => 'DESC'  
);
$query = new WP_Query( $args ); 
$posts = $query->posts;
$counter = 0;
?>

<div id="blogPage">
	<h1><?= single_cat_title(); ?></h1>
	<div class="wrapper">
		<section class="content">
		<?php 
		while ($query->have_posts()) :
			$query->the_post();
			if (is_category('sala-de-prensa')): ?>
				<article>
					<div class="fuentes">
						<img class="etiqueta-fuente-k3d" src="/wp-content/uploads/2024/08/krear3dlogo.webp">
						<?php
							$tags = get_the_tags();
							if ($tags) {
								$tag_images = array(
									'CCL'           => '/wp-content/uploads/2024/12/ccl-logo-v1.webp',
									'CCS'           => '/wp-content/uploads/2024/12/Logo-CCSP_Mesa-de-trabajo-1-scaled.webp',
									'Mercado Libre' => '/wp-content/uploads/2024/12/Logo-de-mercado-libre-.webp',
									'EPA'           => '/wp-content/uploads/2024/12/Logo-EPA-azul-scaled.webp',
									'elcomercio'    => '/wp-content/uploads/2024/12/el-comercio.webp',
									'polymaker'		=> '/wp-content/uploads/2023/03/polymaker.webp',
									'geek'		    => '/wp-content/uploads/2025/01/geek-logo.webp',
									'acaminar'		    => '/wp-content/uploads/2025/02/acaminar-blogs.webp',
									'vidayempresa'		    => '/wp-content/uploads/2025/02/vida_y_empresa.webp',
								);
								$default_width = '6.5rem';
								$tag_widths = array(
									'CCL'           => '5.5rem',
									'EPA'           => '4.5rem',
									'geek'		    => '4.5rem',
									'vidayempresa'  => '4rem'
								);
								foreach ($tags as $tag) {
									$tag_name = $tag->name;
									if (array_key_exists($tag_name, $tag_images)) {
										$image_src = esc_url(home_url($tag_images[$tag_name]));
										$image_alt = esc_attr($tag_name);
										$width = isset($tag_widths[$tag_name]) ? $tag_widths[$tag_name] : $default_width;
										echo '<img class="etiqueta-fuente" src="' . $image_src . '" alt="' . $image_alt . '" style="width:' . $width . ';" />';
										break; 
									}
								}
							}
							?>
					</div>
					<a class="image" href="<?= the_permalink(); ?>">
						<picture>
							<source media="(max-width: 768px)" srcset="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), "medium ") ?>">
							<source media="(min-width: 769px)" srcset="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), array(400,400)) ?>">
							<img data-src="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), array(400,400)) ?>" data-id="<?= get_the_ID(); ?>" alt="<?= get_the_title(); ?>">
						</picture>

						<div class="header">
							<h4><?= get_the_title(); ?></h4>
							<span>
								<svg width="16" height="16">
									<use xlink:href="#icon-date"></use>
								</svg>
								<?= get_the_date("d F, Y"); ?>
							</span>
						</div>
					</a>

					<div class="body">
						<p><?= wp_trim_words(wp_strip_all_tags(get_the_excerpt(), true), 16, ""); ?>...</p>
					</div>
				</article>
			<?php else: ?>
				<article>
					<a class="image" href="<?= the_permalink(); ?>">
						<picture>
							<source media="(max-width: 768px)" srcset="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), "medium ") ?>">
							<source media="(min-width: 769px)" srcset="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), array(400,400)) ?>">
							<img data-src="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), array(400,400)) ?>" data-id="<?= get_the_ID(); ?>" alt="<?= get_the_title(); ?>">
						</picture>

						<div class="header">
							<h4><?= get_the_title(); ?></h4>
							<span>
								<svg width="16" height="16">
									<use xlink:href="#icon-date"></use>
								</svg>
								<?= get_the_date("d F, Y"); ?>
							</span>
						</div>
					</a>

					<div class="body">
						<p><?= wp_trim_words(wp_strip_all_tags(get_the_excerpt(), true), 16, ""); ?>...</p>
						<a href="<?= the_permalink(); ?>">Leer más</a>
					</div>
				</article>
			<?php endif; 
		endwhile; ?>

		<div class="pagination">
			<?php
			$total_pages = $query->max_num_pages;
			if ($total_pages > 1){
				$current_page = max(1, get_query_var('paged'));
				echo paginate_links(array(
					'base' 			=> preg_replace('/\?.*/', '/', get_pagenum_link(1)) . '%_%',
					'format' 		=> '?paged=%#%',
					'current' 		=> $current_page,
					'total' 		=> $total_pages,
					'prev_text'    	=> '&larr;',
					'next_text'    	=> '&rarr;',
				));
			}
			?>
			</div>
		</section>

		<aside class="related">
			<div class="categories">
				<h4>Categorías</h4>
				<?php
				$categories = get_categories( array(
					'taxonomy' 			=> 'category',
					'orderby' 			=> 'name',
					'parent'  			=> 0,
					'hide_empty'      	=> true,
					'exclude' 			=> [93]
				) );

				if (count($categories) > 0): ?>
				<ul>
					<?php foreach ($categories as $key => $category): ?>
					<li>
                        <a title="<?= $category->name ?>" href="<?= get_term_link( $category ); ?>">
                            <svg width="16" height="16">
                                <use xlink:href="#icon-tag"></use>
                            </svg>
                            <?= $category->name ?>
                        </a>
					</li>
					<?php endforeach ?>
				</ul>
				<?php endif ?>
			</div>
		</aside>
	</div>
</div>

<?php 
wp_reset_query(); 
get_footer();
?>