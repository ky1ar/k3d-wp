<?php
get_header();
?>
<div id="singlePage">
    <div class="wrapper">
        <section class="content">
            <div class="header">
                <?php if (has_post_thumbnail()): ?>
                    <a class="sgl-hdr-img" href="<?= get_permalink( $post, false ); ?>">
                        <picture>
                            <source media="(max-width: 799px)" srcset="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), "medium ") ?>">
                            <source media="(min-width: 800px)" srcset="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), array(400,400)) ?>">
                            <img  data-src="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), array(400,400)) ?>" data-id="<?= get_the_ID(); ?>" alt="<?= get_the_title(  ); ?>" class="swiper-lazy w-full lazyload" loading="lazy" width="auto" height="100%" style="object-fit: cover;">
                        </picture>
                    </a>
                <?php endif ?>

                <h1><?= the_title(); ?></h1>

                <div class="links">
                    <span>
                        <svg width="16" height="16">
                            <use xlink:href="#icon-date"></use>
                        </svg>
                        <?= get_the_date("d F, Y"); ?>
                    </span>
                    <?php $categories = get_the_category( $post->ID ,array( 'fields' => 'names' ) ); ?>
                    <?php $categories_array = array(); ?>
                    <?php if (count($categories) > 0): ?>
                        <span class="tag">
                            <svg width="16" height="16">
                                <use xlink:href="#icon-tag"></use>
                            </svg>
                            <?php foreach ($categories as $key => $category): ?>
                                <a title="" href="<?= get_term_link( $category ); ?>"><?= $category->name ?></a>
                                <?php array_push($categories_array, $category->term_id) ?>
                            <?php endforeach ?>
                        </span>
                    <?php endif ?>
                </div>

                <?= do_shortcode( "[ez-toc]" ); ?>
            </div>
            
            <div class="page">
                <?php the_content(); ?>
            </div>

            <a class="back" href="/blog" title="Regresar al blog" >Volver al Blog</a>
        </section>

        <aside>
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
                <?php endif; ?> 
            </div>
            <?php wp_reset_query(); ?>

            <div class="related">
                <?php
                    $page = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                    $args = array(
                        'posts_per_page'  => 3,
                        'post_status'    => 'publish',
                        'order' => 'DESC',
                        'tax_query'      => array(
                            array(
                                'taxonomy'      => 'category',
                                'field'         => 'id',
                                'terms'         => $categories_array,
                                'operator'      => 'IN'
                            )
                        ),
                    );
                    $query = new WP_Query( $args ); 
                    $posts = $query->posts;
                ?>

                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php //$categories = get_the_category( $post_id ,array( 'fields' => 'names' ) ); ?>
                    <?php 
                        /*$category_class = "";
                        foreach ($categories as $key => $category): 
                            $category_class .= " " . $category->slug;
                        endforeach */
                    ?>
                    <article>
                        <?php if (has_post_thumbnail()): ?>
                            <a class="image" href="<?= get_permalink( $post, false ); ?>">
                                <picture>
                                    <source media="(max-width: 799px)" srcset="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), "medium ") ?>">
                                    <source media="(min-width: 800px)" srcset="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), array(400,400)) ?>">
                                    <img  data-src="<?= wp_get_attachment_image_url(get_post_thumbnail_id(), array(400,400)) ?>" data-id="<?= get_the_ID(); ?>" alt="<?= get_the_title(  ); ?>" class="swiper-lazy w-full lazyload" loading="lazy" width="auto" height="100%" >
                                </picture>
                            </a>
                        <?php endif ?>
                        <span>
                            <svg width="16" height="16">
                                <use xlink:href="#icon-date"></use>
                            </svg>
                            <?= get_the_date("d F, Y"); ?>
                        </span>

                        <a class="title" href="<?= get_permalink( $post, false ); ?>"><?= get_the_title(); ?></a>
                        <a class="more" href="<?= get_permalink(); ?>">Leer más</a>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_query() ?>
            </div>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
