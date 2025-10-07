<?php
defined('ABSPATH') || exit;
get_header();

include get_theme_file_path('templates/slider.php');

$page = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
$args = array(
	'posts_per_page'  => 8,
	'paged'          => $page,
	'post_status'    => 'publish',
	'order' => 'DESC'
);

$query = new WP_Query( $args );
$posts = $query->posts;
$counter = 0;
?>

<div id="blogPage">
	<h1><?= single_post_title(); ?></h1>
	<p>Descubre las últimas tendencias, consejos y novedades del mundo 3D en nuestro blog. Inspírate y mejora tus proyectos con nuestras guías y artículos.</p>
	<div class="wrapper">
		<section class="content">
		<?php
		while ($query->have_posts()) :
            $query->the_post();
			$categories = get_the_category( $post_id ,array( 'fields' => 'names' ) );
			$category_class = "";
			foreach ($categories as $key => $category):
				$category_class .= " " . $category->slug;
			endforeach;
			?>
            <article class="post-<?= get_the_ID(); ?> <?= $category_class ?>">
                <a class="image" href="<?= the_permalink(); ?>">
                    <picture>
                        <source media="(max-width: 799px)" srcset="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), "medium ") ?>">
                        <source media="(min-width: 800px)" srcset="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), array(400,400)) ?>">
                        <img data-src="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), array(400,400)) ?>" data-id="<?= get_the_ID(); ?>" alt="<?= get_the_title(  ); ?>" class="swiper-lazy w-full lazyload" loading="lazy" width="auto" height="100%">
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
                    <p><?= wp_trim_words(wp_strip_all_tags( get_the_excerpt(), true ), 16, ""); ?>...</p>
                    <a href="<?= the_permalink(); ?>">Leer más</a>
                </div>
            </article>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>

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
						'prev_text' => '&larr;',
						'next_text' => '&rarr;',
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
include get_theme_file_path('templates/blocks.php');
get_footer();
